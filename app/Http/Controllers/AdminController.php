<?php

namespace App\Http\Controllers;

// Removed duplicate 'use Hash;' statement
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        $notification =[
            'message'=> 'Updated Successfully',
            'alert-type'=> 'success'
        ];

        return redirect()->back()->with($notification);
    } //end method

    public function profile(){
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'User not authenticated.');
        }
        $id = $user->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }//end method

    public function editProfile(){
        $id =Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));

        
    }//end method

    public function storeProfile(Request $request){
        // Add validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_image = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'Success'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }//end method

    public function changePassword(){

        return view('admin.admin_change_password');
    }//end method

    public function updatePassword(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $users =User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            session()->flash('message', 'password updated successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old Password does not match');
            return redirect()->back();
        }

    }//end method

}
