<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getUsers(){
        $users=User::all();
        return response()->json($users);
    }

    public function getUser(Request $request,$id){
        $users=User::findOrFail($id);
        return response()->json($users);
    }

    public function createUser(Request $request){
        $request->validate([
            'role'=> 'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6'

        ]);

        $user=User::create($request->all());
        return response()->json(['message'=>'success', 'data'=>$user]);
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            'role'=> 'required',
            'name'=>'required',
            'email'=>'required|email|unique:users.email,'.$id,

        ]);

        $user=User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message'=>'update success', 'data'=>$user]);
    }

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['message'=>'delete success', 'data'=>'']);
    }
}
