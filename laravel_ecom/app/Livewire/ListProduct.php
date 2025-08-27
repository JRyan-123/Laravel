<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ListProduct extends Component
{
    use WithPagination;

    public $categoryId = null;
    public $subcategoryId = null;

    protected $listeners = ['categoryUpdated' => 'updateCategory', 'subcategoryUpdated' => 'updateSubcategory'];

    public function updateCategory($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->subcategoryId = null;
        $this->resetPage();
    }

    public function updateSubcategory($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::with(['category', 'images']);

        if ($this->subcategoryId) {
            $query->where('subcategory_id', $this->subcategoryId);
        } elseif ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        return view('livewire.list-product', [
            'products' => $query->paginate(12),
        ]);
    }
}
