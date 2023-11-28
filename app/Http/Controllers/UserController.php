<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allUsers(){
        $users=User::all();
        return view('users.allUsers', compact('users'));
    }

    public function viewUser($id){
        $user=User::where('id',$id)->first();
        return view('users.viewUser',compact('user'));
    }

    public function addUser(){
        return view('users.addUser');
    }

    public function createUser(Request $request){
        $request -> validate([
            'name'=> 'required|string|max:50',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8',
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'user_type'=>2,
        ]);
        return redirect()->route('allUsers')->with('message','Utilizador adicionado com successo!');
    }

    public function updateUser(Request $request){
        $request -> validate([
            'name'=> 'required|string|max:50',
            'password'=> 'required|min:8',
            'photo' => 'image',
        ]);

        $userData=[
            'name'=>$request->input('name'),
            'password'=>Hash::make($request->input('password')),
            'phone'=>$request->input('phone'),
        ];

        if ($request->hasFile('photo')) {
            $userData['photo'] = Storage::putFile('userPhotos', $request->photo);
        }

        User::where('id',$request->id)
        ->update($userData);

        return redirect()->route('allUsers')->with('message','Contacto atualizado com successo!');
    }


    public function deleteUser($id){
        $user=User::findOrFail($id);
        $photoPath=$user->photo;
        $user->delete();
        if($photoPath!==null){
            Storage::delete($photoPath);
        }
        // User::where('id',$id)->delete();

        return redirect()->route('allUsers')->with('alert','Contacto apagado com successo!');
    }
}
