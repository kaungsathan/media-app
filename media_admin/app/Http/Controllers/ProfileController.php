<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //direct page to dashboard
    public function index() {
        $id = Auth::user()->id;
        $user = User::select('name','email','phone','address','gender')->where('id',$id)->first();
        return view('admin.profile.index',compact('user'));
    }

    // direct page to password change page
    public function chgPasswordPage() {
        return view('admin.profile.changePassword');
    }

    // update admin acc
    public function updateAdminAcc(Request $request) {

        $this->updateValidation($request);
        $userData = $this->getUserInfo($request);
        User::where('id',Auth::user()->id)->update($userData);
        return back()->with(['process' => 'Account updated.']);
    }

    // change password
    public function changePassword(Request $request) {
        $this->chgPasswordValidation($request);

        $oldPassword = Auth::user()->password;
        if(Hash::check($request->password, $oldPassword)) {
            User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
        }
        return back()->with(['passwordCheck' => 'Password incorrect!']);
    }

    // private function
    // userdata format array to change data in database
    private function getUserInfo($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender

        ];
    }

    // validate admin user acc update
    private function updateValidation($request) {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required'
        ])->validate();
    }

    private function chgPasswordValidation($request) {
        Validator::make($request->all(),[
            'password' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ])->validate();
    }
}
