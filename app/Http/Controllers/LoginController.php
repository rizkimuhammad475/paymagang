<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
 	public function showLogin()
 	{
 		return view('pages.logins.login');
 	}

 	public function doLogin(Request $request)
 	{
 		$dataLogin 										= $request->only('email', 'password');

 		if(\Auth::attempt($dataLogin)){
 			return \Redirect::to('admin/manage/dashboard')->with('sc_msg', 'Login Successfuly');
 		}

 		return \Redirect::to('/')
 				->with('err_msg', 'Login failed, username or password wrong')
 				->withInput($dataLogin);
 	}

 	public function doLogout()
 	{
 		\Auth::logout();
 		\Session::flush();
 		
 		return \Redirect::to('/')
 				->with('sc_msg', 'Logout Successfuly');
 	}

 	public function dummy()
 	{
 		$data 				=	new \App\User;
 		$data->username 	=	'MUHAMMAD RIZKI';
 		$data->email 		=	'rizkimuhammad475@gmail.com';
 		$data->password 	=	bcrypt('mimingunawan123');
 		$data->role_id 		=	1;
 		$data->course_id 	=	1;

 		$data->save();
 	}
}
