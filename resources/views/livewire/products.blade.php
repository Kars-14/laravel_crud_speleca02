<div class="container mt-5">
    <h2 class="mb-4">Product List</h2>
    <form wire:submit.prevent="save" class="mb-4" enctype="multipart/form-data">
        <div class="row g-2">
            <div class="col-md-2">
                <input type="text" wire:model.defer="code" class="form-control" placeholder="Code" required>
            </div>
            <div class="col-md-2">
                <input type="text" wire:model.defer="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-2">
                <input type="number" wire:model.defer="quantity" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="col-md-2">
                <input type="number" wire:model.defer="price" class="form-control" placeholder="Price" step="0.01" required>
            </div>
            <div class="col-md-2">
                <input type="text" wire:model.defer="description" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-2">
                <input type="file" wire:model="image" class="form-control" accept="image/*">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    {{ $isEditing ? 'Update' : 'Add' }}
                </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50">
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                </td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <button wire:click="view({{ $product->id }})" class="btn btn-info btn-sm">View</button>
                    <button wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($viewingProduct)
        <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $viewingProduct->name }}</h5>
                        <button type="button" class="btn-close" wire:click="closeView"></button>
                    </div>
                    <div class="modal-body">
                        @if($viewingProduct->image)
                            <img src="{{ asset('storage/' . $viewingProduct->image) }}" alt="Product Image" width="100" class="mb-3">
                        @endif
                        <p><strong>Code:</strong> {{ $viewingProduct->code }}</p>
                        <p><strong>Name:</strong> {{ $viewingProduct->name }}</p>
                        <p><strong>Quantity:</strong> {{ $viewingProduct->quantity }}</p>
                        <p><strong>Price:</strong> {{ $viewingProduct->price }}</p>
                        <p><strong>Description:</strong> {{ $viewingProduct->description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeView">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
