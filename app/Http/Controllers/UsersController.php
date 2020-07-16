<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUser(Request $request){

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->img=$request->img;
        $user->activated_id=$request->activated_id;
        $user->created_by=$request->created_by;
        $user->save();

        return redirect()->back()->with(['msg', 'The Message']);

    }

    public function updateUser(Request $request,User $user){
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->img=$request->img;
        $user->activated_id=$request->activated_id;
        $user->updated_by=$request->updated_by;
        $user->update();

        return redirect()->back()->with(['msg', 'The Message']);

    }

    public function deleteUser(User $user){

        $user->is_delete=1;
        $user->deleted_by;
        $user->update();

        return redirect()->back()->with(['msg', 'The Message']);

    }
}
