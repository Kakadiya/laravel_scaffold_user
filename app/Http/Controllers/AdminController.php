<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        return view('admin/dashboard');
    }

    public function getUsers(){

    	$users = User::all();
    	return view('admin/users',compact('users'));
    }

    public function getCreateUser(){
    	return view('admin/create_user');
    }

    public function postCreateUser(Request $request){

    	$validator = $this->validate($request, [
            'name' => 'required',
        	'email' => 'required|unique:users|email',
        	'password' => 'required'
        ]);

    	$name = $request->input('name');
    	$email = $request->input('email');
    	$password = bcrypt($request->input('password'));

    	$user = new User;
    	$user->name = $name;
    	$user->email = $email;
    	$user->password = $password;
    	$user->save();

    	\Session::flash('success', 'User Created successfully');

    	return redirect()->route('get:admin:users');
    }

    public function getEditUser($id){
    	$user = User::where('id',$id)->get()->first();
    	return view('admin/edit_user',compact('user'));
    }

    public function postEditUser(Request $request,$id){
    	$validator = $this->validate($request, [
            'name' => 'required',
        	'email' => 'required|email|unique:users,email,'.$id,
        ]);
    	$name = $request->input('name');
    	$password = $request->input('password');
    	$email = $request->input('email');

    	$user = User::where('id',$id)->first();
    	$user->name = $name;
    	$user->email = $email;
    	if(!empty($password)){
    		$user->password = $password;
    	}
    	$user->save();

    	\Session::flash('success', 'User Edited successfully');

    	return redirect()->route('get:admin:users');
    }

    public function getDeleteUser($id){
    	$user = User::where('id',$id)->first();
    	$user->is_disabled = 1;
    	$user->save();

    	\Session::flash('success', 'User Removed successfully');

    	return redirect()->route('get:admin:users');
    }
}
