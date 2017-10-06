<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
   	public function index(Request $request)
	{
		$search							=	$request->search;
		$grade							=	$request->grade;

		$student1 						= 	\App\Student::where('grade_id',$grade)->where('name','like','%'.$search.'%')->orderBy('name')->get();
		$student2 						= 	\App\Student::join('transactions','students.id','=','transactions.student_id')->select('students.*',\DB::raw('sum(transactions.pay) as total'))->groupBy('students.id')->get();
		
		$student3						=	$student2->where('total','>=',Callprice());
		$student4						=	$student3->forget('total');

		$student						=	$student1->diff($student4);

		if (\Auth::user()->role_id != 3) {
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id order by steps.step");
		}else{
			$course 						=	\Auth::user()->course_id;
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and divisions.course_id=$course group by grades.id order by steps.step");
		}

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'		=>		$grade,
    		'student'	=>		$student,

    	]);
	}
	public function create()
	{
		return view('pages.courses.create');
	}
	public function store(Request $request,$id)
	{

		$category 									= new \App\Transaction;
		$category->pay 								= $request->price;
		$category->student_id 						= $id;
		$category->user_id 							= \Auth::user()->id;
		$category->save();

		$search							=	$request->search;
		$grade							=	$request->grade;

		$student1 						= 	\App\Student::where('grade_id',$grade)->where('name','LIKE',"%$search%")->orderBy('name')->get();
		$student2 						= 	\App\Student::join('transactions','students.id','=','transactions.student_id')->groupBy('students.id')->select('students.*')->get();
		$student						=	$student1->diff($student2);

		$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id order by steps.step");

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'		=>		$grade,
    		'student'	=>		$student,

    	]);
		

	}
	public function detail(Request $request,$id)
	{
		$transaction 									= \App\Transaction::where('student_id',$id)->get();
		$total 											= $transaction->sum('pay');
		$student 										= \App\Student::where('id',$id)->get();
		return view('pages.pays.detail', compact('transaction','student','total'));
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
