<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //direct page to admin list
    public function index() {

        $userData = User::select('id','name','email','phone','address','gender')
        ->when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');
        })
        ->get();
        return view('admin.list.index',compact('userData'));
    }

    // delete admin account
    public function deleteAcc(Request $request) {
        $id = $request->all();
        User::where('id',$id['userId'])->delete();
    }
}
