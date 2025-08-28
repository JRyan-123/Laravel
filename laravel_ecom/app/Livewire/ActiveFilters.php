<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class ActiveFilters extends Component
{
    protected $listeners = [
    'filterUpdated' => '$refresh', 
    ];

   public function removeFilter($key)
    {
        session()->forget($key);
        $this->dispatch('filterUpdated');
    }

    public function clearAll()
    {
        session()->forget(['categoryId', 'subcategoryId', 'minPrice', 'maxPrice']);
        $this->dispatch('filterUpdated');
    }

    public function render()
    {   
        $filters = [];

            
            if ($categoryId = session('categoryId')) {
                    $category = Category::find($categoryId);
                    $filters['categoryId'] = [
                    'name' => $category ? $category->category_name : 'Unknown',
                    ];
                    
                }

             if ($subcategoryId = session('subcategoryId')) {
                    $subcategory = Subcategory::find($subcategoryId);
                    $filters['subcategoryId'] = [
                        'name' => $subcategory?->subcategory_name ?? 'Unknown',
                    ];
                }

                if ($minPrice = session('minPrice')) {
                    $filters['minPrice'] = [
                        'name' => "Min Price: $minPrice",
                    ];
                }

                if ($maxPrice = session('maxPrice')) {
                    $filters['maxPrice'] = [
                        'name' => "Max Price: $maxPrice",
                    ];
                }
        return view('livewire.active-filters', compact('filters'));
    }
}
