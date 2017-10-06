<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
	{
		$data[ 'courses' ] 							= \App\Course::orderBy('course_name')->get();

		return view( 'pages.courses.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.courses.create');
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'course_name' 						=> 'required|string|max:50|min:2|unique:courses',
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$category 									= new \App\Course;
		$category->course_name 						= $request->course_name;
		$category->save();
		return \Redirect::back()->with('sc_msg', 'Course successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$course 									= \App\Course::where('id',$id)->get();
		return view('pages.courses.edit', compact('course'));
	}
	public function update(Request $request,$id)
	{

		$category 									= \App\Course::find($id);

		$category->course_name					= $request->course_name;

		$category->save();
		
		return \Redirect::to('admin/manage/course')
					->with('sc_msg', 'Course successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Course::find($id);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
