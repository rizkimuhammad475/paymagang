<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
	{
		$data[ 'admins' ] 						= \App\User::where('role_id',2)->paginate(20);

		return view( 'pages.admins.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.admins.create');
	}
	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email|unique:users',
            'password' 								=> 'required|string|max:50|min:8'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$user 										= new \App\User;
		$user->username 							= $request->username;
		$user->email 								= $request->email;
		$user->password 							= bcrypt($request->password);
		$user->role_id 								= 2;
		$user->course_id 							= 1;
		$user->save();
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$admin 									= \App\User::where('id',$id)->get();
		return view('pages.admins.edit', compact('admin'));
	}

	public function useredit(Request $request)
	{
		$admin 									= \App\User::where('id',\Auth::user()->id)->get();
		return view('pages.admins.edituser', compact('admin'));
	}
	public function update(Request $request,$id)
	{
		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3',
            'email' 								=> 'required|string|email',
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$admin 										= \App\User::find($request->id);

		$admin->username							= $request->username;
		$admin->email								= $request->email;

		$admin->save();
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly edited');
		
	}

	public function userupdate(Request $request)
	{
		$data										= $request->all();

		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3',
            'email' 								=> 'required|string|email',
            'old_password'							=> 'required_unless:new_password,'.null.'',
            'new_password'							=> 'required_unless:con_new_password,'.null.'|same:con_new_password',
            'con_new_password'						=> 'required_unless:old_password,'.null.'|same:new_password'
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}else{
			if ($request->old_password == null || $request->new_password == null || $request->con_new_password == null) {
				$admin 										= \App\User::find(\Auth::user()->id);

				$admin->username							= $request->username;
				$admin->email								= $request->email;

				$admin->save();
				return \Redirect::to('admin/manage/dashboard')
							->with('sc_msg', 'Admin profile successfuly edited');
			}else{
				$author 							=	\Hash::check($request->old_password,\Auth::user()->password);
				if ($author == true) {
					# code...
				}
			}
		}
		
	}
	public function destroy($id)
	{
		$model 										= \App\User::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/admin' )
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}

	public function dummy()
   	{
        $data['email']    							= 'rizkimuhammad475@gmail.com';
        $data['username'] 							= 'Muhammad Rizki';
        $data['password'] 							= bcrypt('mimingunawan');
        $data['role_id']  							= 1;
        $data['course_id']  						= 1;
    
     	\App\User::create($data);
   }
}
