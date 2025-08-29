<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.main');
    }
    // end methid


    public function category()
    {
        return view('customer.category');
    }
    // end methid


    public function product_view()
    {
        return view('customer.product.product_view');
    }
    // end methid

    
    public function contact()
    {
        return view('customer.contact');
    }
    // end methid
}
