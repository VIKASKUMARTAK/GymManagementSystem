<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $user= User::get();
        //return $user;
        
        return view('customer.index',compact('user'));   
    }

    public function destroy($id)
    {
       User::where('id',$id)->delete();
       return redirect('admin/customer')->with('success','Data has been deleted.');
    }
}
