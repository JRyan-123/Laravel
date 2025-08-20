<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{

    public $name;
    public $email;
    public $password;

    public function createNewUser()
    {
        $this->validate([
            'name' => 'required|min:2|max:12',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',

        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name', 'email', 'password']);

        session()->flash('success','success add!');
        
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.clicker', compact('users'));
    }
}
