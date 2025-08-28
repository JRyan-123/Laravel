<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class FilterProduct extends Component
{
    public $categoryId      = null;
    public $subcategoryId   = null;
    
    protected $listeners = ['filterUpdated' => '$refresh'];


    public function selectCategory($id)
    {
        $this->categoryId = $id;
        $this->subcategoryId = null; 
        session(['categoryId' => $id, 'subcategoryId' => null]);
        $this->dispatch('categoryUpdated');
        $this->dispatch('filterUpdated');
    }

    public function selectSubcategory($id)
    {
        $this->subcategoryId = $id;
        session(['subcategoryId' => $id]);
        $this->dispatch('subcategoryUpdated');
        $this->dispatch('filterUpdated');
    }

    public function render()
    {
        return view('livewire.filter-product', [
            'categories' => Category::with('subcategories')->get(),
        ]);
    }
}
