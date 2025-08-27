<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreForm extends Component
{
    public function render()
    {
        return view('livewire.store-form', [
            'stores' => Store::where('user_id', Auth::id())->get(),
        ]);
    }
}



