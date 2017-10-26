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

		$student1 						= 	\DB::select("select students.*,sum(transactions.pay) as total from students left join transactions on students.id=transactions.student_id where students.grade_id = 11 and students.name like '%$search%' group by students.id,students.name,students.gender,students.nis,students.grade_id,students.created_at,students.updated_at order by students.name");
		$student2						=	collect($student1);
		$student3						=	$student2->where('total','<',Callprice());

		$student4						=	$student3->forget('total');

		$student						=	$student4;

		if (\Auth::user()->role_id != 3) {
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id,steps.step,divisions.division_name order by steps.step");
		}else{
			$course 						=	\Auth::user()->course_id;
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and divisions.course_id=$course group by grades.id,steps.step,divisions.division_name order by steps.step");
		}

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'		=>		$grade,
    		'student'	=>		$student,
    		'callprice'	=>		Callprice(),

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
		$category->created_at						= date('Y-m-d H:i:s');
		$category->save();

		$search							=	$request->search;
		$grade							=	$request->grade;

		$student1 						= 	\DB::select("select students.*,sum(transactions.pay) as total from students left join transactions on students.id=transactions.student_id where students.grade_id = $grade and students.name like '%$search%' group by students.id,students.name,students.gender,students.nis,students.grade_id,students.created_at,students.updated_at order by students.name");
		$student2						=	collect($student1);
		$student3						=	$student2->where('total','<',Callprice());
		$student4						=	$student3->forget('total');

		$student						=	$student4;
		$price							=	Callprice();

		if (\Auth::user()->role_id != 3) {
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id,steps.step,divisions.division_name order by steps.step");
		}else{
			$course 						=	\Auth::user()->course_id;
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and divisions.course_id=$course group by grades.id,steps.step,divisions.division_name order by steps.step");
		}

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'		=>		$grade,
    		'student'	=>		$student,
    		'callprice'	=>		$price,

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
