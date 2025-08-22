<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function create_store()
    {
        return view('vendor.store.create');
    }
    // end methid


    public function manage_store()
    {
        return view('vendor.store.manage');
    }
    // end methid
}
