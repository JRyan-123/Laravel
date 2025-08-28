  <!-- Product Categories Widget -->
    <div class="product-categories-widget widget-item">

        <h3 class="widget-title" wire:click="selectCategory(null)" style="cursor:pointer; ">
        {{ session('categoryId') ? 'All Products': 'Categories'}}</h3>
      
          <div class="tab-pane">
            <div class="category-grid">
                <ul class="my-3 list-unstyled">  
                @foreach($categories as $category)
                  <li style="cursor:pointer;opacity:.7;" 
                        wire:click='selectCategory({{$category->id}})'
                        class="text-decoration-none category-column p-2 mb-2 rounded cursor-pointer 
                               {{ $categoryId == $category->id ? 'bg-dark text-white' : '' }}">
                        {{ $category->category_name }}
                    </li>
                
               @if($categoryId === $category->id)
                    <ul class="ms-3">
                        @foreach($category->subcategories as $subcategory)
                            <li class="p-2 rounded {{ $subcategoryId == $subcategory->id ? 'bg-dark text-white' : 'hover:bg-light' }}" 
                                wire:click="selectSubcategory({{ $subcategory->id }})" 
                                style="cursor:pointer;">
                                {{ $subcategory->subcategory_name }}
                            </li>   
                        @endforeach
                    </ul>
                @endif
                
        @endforeach
           
    </ul>
          

              </div>
          </div>

 </div><!--/Product Categories Widget -->
  