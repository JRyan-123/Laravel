<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
    // end methid


    public function product_view()
    {
        return view('customer.product_view');
    }
    // end methid

    
}
