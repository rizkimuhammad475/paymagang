<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index()
	{
		$data[ 'grades' ] 							= \App\Grade::orderBy('division_id')->get();
		$data[ 'divisions' ] 						= \App\Division::all();
		$data[ 'steps' ] 							= \App\Step::all();

		return view( 'pages.grades.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.courses.create');
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'step_id' 								=> 'required|integer',
            'division_id' 							=> 'required|integer'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$category 									= new \App\Grade;
		$category->step_id 							= $request->step_id;
		$category->division_id 						= $request->division_id;
		$category->save();
		return \Redirect::back()->with('sc_msg', 'Division successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$grade 										= \App\Grade::where('id',$id)->get();
		$division 									= \App\Division::all();
		$step 										= \App\Step::all();
		return view('pages.grades.edit', compact('grade','division','step'));
	}
	public function update(Request $request,$id)
	{

		$category 									= \App\Grade::find($id);

		$category->step_id							= $request->step_id;
		$category->division_id						= $request->division_id;

		$category->save();
		
		return \Redirect::to('admin/manage/grade')
					->with('sc_msg', 'Grade successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Grade::find($id);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
