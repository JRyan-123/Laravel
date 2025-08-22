<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }
    // end methid


    public function order_history()
    {
        return view('customer.order_history');
    }
    // end methid

    public function payment()
    {
        return view('customer.payment');
    }
    // end methid


    public function affiliate()
    {
        return view('customer.affiliate');
    }
    // end methid


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // end mrthod
}
