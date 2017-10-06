<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StepController extends Controller
{
 	public function index()
	{
		$data[ 'steps' ] 							= \App\Step::all();

		return view( 'pages.steps.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.courses.create');
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'step' 						=> 'required|string|max:50|min:1|unique:steps',
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$category 									= new \App\Step;
		$category->step 							= $request->step;
		$category->save();
		return \Redirect::back()->with('sc_msg', 'Step successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$step 									= \App\Step::where('id',$id)->get();
		return view('pages.steps.edit', compact('step'));
	}
	public function update(Request $request,$id)
	{

		$category 									= \App\Step::find($id);

		$category->step					= $request->step;

		$category->save();
		
		return \Redirect::to('admin/manage/step')
					->with('sc_msg', 'Step successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Step::find($id);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
