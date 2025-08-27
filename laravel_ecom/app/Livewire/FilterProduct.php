<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class FilterProduct extends Component
{
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function selectCategory($categoryId)
    {
            $this->selectedCategory = $categoryId;
            $this->selectedSubcategory = null;

        $this->dispatch('categoryUpdated', $this->selectedCategory);
    }

    public function selectSubcategory($subcategoryId)
    {
       
            $this->selectedSubcategory = $subcategoryId;
       
        $this->dispatch('subcategoryUpdated', $this->selectedSubcategory);
    }

    public function render()
    {
        return view('livewire.filter-product', [
            'categories' => Category::with('subcategories')->get(),
        ]);
    }
}
