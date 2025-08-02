<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.index', compact('profileData'));
    }
    // End Method


     public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
    // End Method


    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
    // End Method



    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }
    // End Method


    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username =  $request->username;
        $data->name =  $request->name;
        $data->email =  $request->email;
        $data->address =  $request->address;
        $data->phone =  $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = time(). "." .$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }
        
        $data->save();
        $notification = array(
            'message' => 'Successfully updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method


    public function AdminChangePassword()
    {   
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }
    // End Method


    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
             $notification = array(
            'message' => 'password incorrect',
            'alert-type' => 'error'
                );

             return back()->with($notification);
        }
        // shortcut
        // User::whereId(auth()->user()->id)->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        
        $user->password = Hash::make($request->new_password);
        $user->save();

         $notification = array(
            'message' => 'Password updated',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
