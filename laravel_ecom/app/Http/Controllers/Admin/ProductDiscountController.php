<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
    public function create_discount()
    {
        return view('admin.discount.create');
    }
    // End method


    public function manage_discount()
    {
        return view('admin.discount.manage');
    }
    // End method
}
