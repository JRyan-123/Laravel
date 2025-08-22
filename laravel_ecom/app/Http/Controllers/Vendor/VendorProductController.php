<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{
    public function create_product()
    {
        return view('vendor.product.create');
    }
    // end methid


    public function manage_product()
    {
        return view('vendor.product.manage');
    }
    // end methid
}
