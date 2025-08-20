<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    // End method


    public function setting()
    {
        return view('admin.settings');
    }
    // end method


    public function manage_user()
    {
        return view('admin.manage.users');
    }
    // end mehtod


    public function manage_store()
    {
        return view('admin.manage.stores');
    }
    // end method


    public function cart_history()
    {
        return view('admin.cart.history');
    }
    // End method


    public function order_history()
    {
        return view('admin.order.history');
    }
    // End mrtyhod
}
