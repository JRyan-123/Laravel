<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_cat()
    {
        return view('admin.category.create');
    }
    // End method


    public function manage_cat()
    {
        return view('admin.category.manage');
    }
    // End method
}
