<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppPage extends Component
{
    public $view = 'login'; // 'login', 'register', 'products'
    public $email = '';
    public $password = '';
    public $name = '';
    public $password_confirmation = '';
    public $error = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $this->view = 'products';
            $this->error = '';
        } else {
            $this->error = 'Invalid credentials.';
        }
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $this->view = 'login';
        $this->error = '';
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->view = 'login';
        $this->reset(['email', 'password', 'name', 'password_confirmation']);
    }

    public function showRegister()
    {
        $this->view = 'register';
        $this->error = '';
    }

    public function showLogin()
    {
        $this->view = 'login';
        $this->error = '';
    }

    public function render()
    {
        return view('livewire.app-page');
    }
}