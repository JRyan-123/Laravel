<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function create_product_attr()
    {
        return view('admin.product_attribute.create');
    }
    // End method


    public function manage_product_attr()
    {
        return view('admin.product_attribute.manage');
    }
    // End method
}
