<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard()
    {   

        return view('admin.admin_dashboard');
    }
    // end method


    public function AdminProfileUpdate(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'newName' => 'required|string|max:255',
            'newEmail' => 'required|email|unique:users,email,'. $admin->id,
            'newPhone' => 'nullable'

        ]);

        $admin->name = $request->newName;
        $admin->email = $request->newEmail;
        $admin->phone = $request->newPhone;

        if ($request->file('newPhoto')) {
            $file = $request->file('newPhoto');
            @unlink(public_path('imgs'.$data->photo));
            $filename = time() . "." .$file->getClientOriginalName();
            $file->move(public_path('imgs'), $filename);
            $admin->photo = $filename;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully'); 
    }
    // End method


    public function AdminEditPassword()
    {
        
        return view('admin.admin_password');

    }
    // End method



    public function AdminUpdatePassword(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->with('success' ,'failed to chnage password');
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return back()->with('success', 'successfully change password');
    }
     //End method


     public function AdminAccounts()
      {
       

          $otherUsers = User::where('id','!=', Auth::id())->get();

          return view('admin.admin_table', compact('otherUsers'));
      } 
      // End method


      public function AdminViewUser(User $viewUser)
      {
           
            return response()->json($viewUser);
          // return view('admin.admin_view_user', compact('viewUser'));
      }
}
