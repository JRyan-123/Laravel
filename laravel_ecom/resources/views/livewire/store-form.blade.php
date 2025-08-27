<div>
    <label for="" class="fw-bold mb-2">Store</label>
   <select name="store_id" id="" class="form-control">
       <option value="">Select store</option>
       @foreach($stores as $store)
            <option value="{{ $store->id }}">{{ $store->store_name }}</option>
       @endforeach
   </select>
</div>