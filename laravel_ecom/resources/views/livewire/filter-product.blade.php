  <!-- Product Categories Widget -->
    <div class="product-categories-widget widget-item">

        <h3 class="widget-title" wire:click="selectCategory(null)" style="cursor:pointer; ">Categories</h3>
      
          <div class="tab-pane">
            <div class="category-grid">

                @foreach($categories as $category)
                   <div   style="cursor:pointer;opacity:.7;" 
                          wire:click='{{ $selectedCategory ? "selectCategory(null)" : "selectCategory($category->id)" }}'
                           >
                        
                        <h6 class="category-column p-2 rounded cursor-pointer {{ $selectedCategory == $category->id ? 'bg-dark text-white' : '' }}" >
                            {{ $category->category_name. $selectedCategory. $category->id }}</h6>
                       
                      </div>

                
                @if($selectedCategory === $category->id && $category->subcategories->count())
                    <ul class="ms-3">
                        @foreach($category->subcategories as $subcategory)
                            <div 
                                
                                class="p-2   rounded hover:bg-gray-100 {{ $selectedSubcategory == $subcategory->id ? 'bg-dark text-white' : '' }}" style="cursor:pointer;"
                                 wire:click="selectSubcategory({{ $subcategory->id }})"
                                 >
                                {{ $subcategory->subcategory_name }}
                            </div>
                           
                          
                        @endforeach
                    </ul>
                @endif
            
        @endforeach
           

          

              </div>
          </div>

 </div><!--/Product Categories Widget -->
  