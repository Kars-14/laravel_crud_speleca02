<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class Products extends Component
{
    use WithFileUploads;

    public $products;
    public $code, $name, $quantity, $price, $description, $image;
    public $productId;
    public $isEditing = false;
    public $viewingProduct = null;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::all();
    }

    public function resetForm()
    {
        $this->code = '';
        $this->name = '';
        $this->quantity = '';
        $this->price = '';
        $this->description = '';
        $this->image = null;
        $this->productId = null;
        $this->isEditing = false;
    }

    public function save()
    {
        $rules = [
            'code' => 'required|unique:products,code,' . $this->productId,
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ];
        $this->validate($rules);

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        if ($this->isEditing) {
            $product = Product::find($this->productId);
            $product->update([
                'code' => $this->code,
                'name' => $this->name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
                'image' => $imagePath ?? $product->image,
            ]);
        } else {
            Product::create([
                'code' => $this->code,
                'name' => $this->name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
                'image' => $imagePath,
            ]);
        }

        $this->resetForm();
        $this->loadProducts();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->productId = $product->id;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->image = null; // Don't prefill file input
        $this->isEditing = true;
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        $this->resetForm();
        $this->loadProducts();
    }

    public function view($id)
    {
        $this->viewingProduct = \App\Models\Product::find($id);
    }

    public function closeView()
    {
        $this->viewingProduct = null;
    }

    public function render()
    {
        return view('livewire.products');
    }
}
