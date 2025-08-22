<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard');
    }
    // end methid


    public function order_history()
    {
        return view('vendor.order.history');
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
