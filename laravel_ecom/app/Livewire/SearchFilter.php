<?php

namespace App\Livewire;

use Livewire\Component;

class SearchFilter extends Component
{
    public $inputKeyword = null;

    protected $listeners = ['filterUpdated' => '$refresh'];

    public function search()
    {
        session(['keyword' => $this->inputKeyword]);
        if ($this->inputKeyword) {
                 session()->forget(['categoryId', 'subcategoryId', 'minPrice', 'maxPrice']);
        }
        $this->dispatch('searchUpdated');
        $this->dispatch('filterUpdated');
    }

    public function render()
    {
        return view('livewire.search-filter');
    }
}
