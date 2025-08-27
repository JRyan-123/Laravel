<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Store;
use App\Models\User;
use App\Models\ProductImage;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function vendor()
    {
        return $this->belongsTo(User::class);
    }
     public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
