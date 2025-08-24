<div>
    <label for="" class="fw-bold mb-2">Category</label>
   <select name="" id="" class="form-control" wire:model.live="selectedCategory">
       <option value="">Select category</option>
       @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
       @endforeach
   </select>

    <label for="" class="fw-bold mb-2">SubCategory</label>
   <select name="" id="" class="form-control">
       <option value="">Select category</option>
       @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
       @endforeach
   </select>

</div>
