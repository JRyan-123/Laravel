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
        session()->forget(['categoryId', 'subcategoryId', 'minPrice', 'maxPrice', 'keyword']);
        $this->dispatch('filterUpdated');
    }

    public function render()
    {   
        $filters = [];
            if (session('keyword')) {
                    $filters['keyword'] = [
                        'name' =>"Searching for '". session('keyword'). "'",
                    ];
                }
            
            if (session('categoryId')) {
                    $category = Category::find(session('categoryId'));
                    $filters['categoryId'] = [
                    'name' =>  $category->category_name 
                    ];
                    
                }

             if (session('subcategoryId')) {
                    $subcategory = Subcategory::find(session('subcategoryId'));
                    $filters['subcategoryId'] = [
                        'name' => $subcategory->subcategory_name,
                    ];
                }

                if (session('minPrice')) {
                    $filters['minPrice'] = [
                        'name' => "Min Price: ". session('minPrice'),
                    ];
                }

                if (session('maxPrice')) {
                    $filters['maxPrice'] = [
                        'name' => "Min Price: ". session('maxPrice'),
                    ];
                }


                
        return view('livewire.active-filters', compact('filters'));
    }
}
