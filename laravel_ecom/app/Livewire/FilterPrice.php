<?php

namespace App\Livewire;

use Livewire\Component;

class FilterPrice extends Component
{   
    public $minPrice = 0;
    public $maxPrice = 500;

    public function mount()
    {
        $this->minPrice = session('minPrice', null);
        $this->maxPrice = session('maxPrice', null);
    }

    public function applyPrice()
    {
        session(['minPrice' => $this->minPrice, 'maxPrice' => $this->maxPrice]);
        $this->dispatch('priceUpdated');
        $this->dispatch('filterUpdated');
    }

    public function render()
    {
        return view('livewire.filter-price');
    }
}