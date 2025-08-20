<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manage_product()
    {
        return view('admin.product.manage_product');
    }
    // End method


    public function manage_product_review()
    {
        return view('admin.product.manage_product_review');
    }
    // End method
}
