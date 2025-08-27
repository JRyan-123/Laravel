<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function create_store()
    {   
        return view('vendor.store.create');
    }
    // end methid


    public function dbstore_store(Request $request)
    {   

        $validate_store = $request->validate([
            'store_name' => 'required|unique:stores,store_name',
            'slug' => 'required|unique:stores,slug',
            'details' => 'required|max:100',
            
        ]);

        Store::create([
            'store_name' => $request->store_name,
            'slug' => $request->slug,
            'details' => $request->details,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('vendor.store.manage')->with('success', 'Store name Created');
    }
    // end methid


    public function manage_store()
    {

        $user_id = Auth::id();

        $stores = Store::where('user_id', $user_id)->get();

        return view('vendor.store.manage', compact('stores'));
    }
    // end methid
}
