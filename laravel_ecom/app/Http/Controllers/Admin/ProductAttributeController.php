<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DefaultAttribute;

class ProductAttributeController extends Controller
{
    public function create_product_attr()
    {   
        return view('admin.product_attribute.create');
    }
    // End method


    public function manage_product_attr()
    {   
        $attributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage', compact('attributes'));
    }
    // End method


    public function store_product_attr(Request $request)
    {   
        $validate_attr = $request->validate([
            'attribute_value' => 'required|unique:default_attributes',
        ]);

        DefaultAttribute::create($validate_attr);
        return redirect()->route('admin.product_attribute.manage')->with('success', 'Attribute added');
    }
    // End method


    public function show_product_attr($id)
    {
        $attribute = DefaultAttribute::find($id);

        return view('admin.product_attribute.edit', compact('attribute'));

    }
    // End method

    public function update_product_attr(Request $request, $id)
    {
        $attributes = DefaultAttribute::findOrFail($id);

        $validate_attr = $request->validate([
            'attribute_value' => 'required|unique:default_attributes',
        ]);

        $attributes->update($validate_attr);

        return redirect()->route('admin.product_attribute.manage')->with('success','Successfully updated');
    }
    // End method


    public function delete_product_attr($id)
    {
        DefaultAttribute::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Successfully deleted');
    }

}
