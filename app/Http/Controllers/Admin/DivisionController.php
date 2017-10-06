<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    public function index()
	{
		$data[ 'divisions' ] 						= \App\Division::orderBy('division_name','asc')->get();
		$data[ 'courses' ] 							= \App\Course::all();

		return view( 'pages.divisions.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.courses.create');
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'course_id' 							=> 'required|integer',
            'division_name' 						=> 'required|string|max:50|min:2|unique:divisions'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$category 									= new \App\Division;
		$category->course_id 						= $request->course_id;
		$category->division_name 					= $request->division_name;
		$category->save();
		return \Redirect::back()->with('sc_msg', 'Division successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$division 									= \App\Division::where('id',$id)->get();
		$course 									= \App\Course::all();
		return view('pages.divisions.edit', compact('course','division'));
	}
	public function update(Request $request,$id)
	{

		$category 									= \App\Division::find($id);

		$category->course_id						= $request->course_id;
		$category->division_name					= $request->division_name;

		$category->save();
		
		return \Redirect::to('admin/manage/division')
					->with('sc_msg', 'Division successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Division::find($id);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
