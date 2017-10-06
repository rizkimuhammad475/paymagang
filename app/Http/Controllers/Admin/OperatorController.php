<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    public function index()
	{
		$data[ 'operators' ] 						= \App\User::where('role_id',3)->paginate(20);

		return view( 'pages.operators.list', compact( 'data' ) );
	}
	public function create()
	{
		$data['course']								= \App\Course::orderBy('id')->get();
		return view('pages.operators.create',compact('data'));
	}
	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email|unique:users',
            'password' 								=> 'required|string|max:50|min:8',
            'course_id' 							=> 'required|integer'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$user 										= new \App\User;
		$user->username 							= $request->username;
		$user->email 								= $request->email;
		$user->password 							= bcrypt($request->password);
		$user->role_id 								= 3;
		$user->course_id 							= $request->course_id;
		$user->save();
		return \Redirect::to('admin/manage/operator')
					->with('sc_msg', 'Operator successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$admin 									= \App\User::where('id',$id)->get();
		$datacourse 									= \App\Course::orderBy('id')->get();
		return view('pages.operators.edit', compact('admin','datacourse'));
	}
	public function update(Request $request,$id)
	{
		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3',
            'email' 								=> 'required|string|email',
            'course_id' 							=> 'required|integer'
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$admin 										= \App\User::find($request->id);

		$admin->username							= $request->username;
		$admin->email								= $request->email;
		$admin->course_id 							= $request->course_id;

		$admin->save();
		return \Redirect::to('admin/manage/operator')
					->with('sc_msg', 'Operator successfuly edited');;
		
	}
	public function destroy($id)
	{
		$model 										= \App\User::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/operator' )
						  ->with( 'sc_msg', 'Operator successfuly Deleted');
	}
}
