<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ListProduct extends Component
{
    use WithPagination;

    public $categoryId;
    public $subcategoryId;
    public $minPrice;
    public $maxPrice;
   
    protected $listeners = [
        'filterUpdated' => 'refreshFilters',
        'priceUpdated' => 'refreshFilters',
        'categoryUpdated' => 'refreshFilters',
        'clearFilters' => 'refreshFilters'
    ];

    public function mount()
    {
        $this->refreshFilters();
    }

    public function refreshFilters()
    {
        $this->categoryId = session('categoryId', null);
        $this->subcategoryId = session('subcategoryId', null);
        $this->minPrice = session('minPrice', null);
        $this->maxPrice = session('maxPrice', null);
        $this->resetPage(); // reset pagination when filters change
    }


    public function render()
    {
        $query = Product::with(['category', 'images']);

        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        if ($this->subcategoryId) {
            $query->where('subcategory_id', $this->subcategoryId);
        }
        if ($this->minPrice) {
            $query->where('regular_price', '>=', $this->minPrice);
        }

        if ($this->maxPrice) {
            $query->where('regular_price', '<=', $this->maxPrice);
        }

        return view('livewire.list-product', [
            'products' => $query->paginate(12),
        ]);
    }
}
