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
    public $keyword;
   
    protected $listeners = [
        'filterUpdated' => 'refreshFilters',
        'priceUpdated' => 'refreshFilters',
        'categoryUpdated' => 'refreshFilters',
        'clearFilters' => 'refreshFilters',
        'searchUpdated'      => 'refreshFilters',
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
        $this->keyword = session('keyword', null);

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

        if (!empty($this->keyword)) {
              $query->where(function ($q) {
                    $q->where('product_name', 'like', '%' . $this->keyword . '%')
                      ->orWhere('description', 'like', '%' . $this->keyword . '%');
                });
        }
        return view('livewire.list-product', [
            'products' => $query->paginate(12),
        ]);
    }
}
