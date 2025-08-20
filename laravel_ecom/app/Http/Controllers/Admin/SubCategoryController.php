<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function create_subcat()
    {
        return view('admin.sub_category.create');
    }
    // End method


    public function manage_subcat()
    {
        return view('admin.sub_category.manage');
    }
    // End method
}
