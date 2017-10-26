<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatstudentController extends Controller
{
    public function index(Request $request)
    {
    	$part							=	$request->part;
    	$search							=	$request->search;
		$grade							=	$request->grade;
		if ($part == 1) {
			$student1						=	\App\Student::where('grade_id',$grade)->where('name','like','%'.$search.'%')->get();
			$student2 						= 	\App\Student::join('transactions','students.id','=','transactions.student_id')->groupBy('students.id','students.name','students.gender','students.nis','students.grade_id','students.created_at','students.updated_at')->select('students.*')->get();
			$data							=	$student1->diff($student2);
		}elseif ($part == 2) {
			$student 						= 	\DB::select("select students.*,sum(transactions.pay) as total from students,transactions where students.id=transactions.student_id and students.grade_id=$grade and students.name like '%$search%' group by students.id,students.name,students.gender,students.nis,students.grade_id,students.created_at,students.updated_at  order by students.name");
			$result	=	collect($student);
			$data	=	$result->where('total','<',Callprice());
		}else{
			$student 						= 	\DB::select("select students.*,sum(transactions.pay) as total from students,transactions where students.id=transactions.student_id and students.grade_id=$grade and students.name like '%$search%' group by students.id,students.name,students.gender,students.nis,students.grade_id,students.created_at,students.updated_at  order by students.name");
			$result	=	collect($student);
			$data	=	$result->where('total','>=',Callprice());
		}
		if (\Auth::user()->role_id != 3) {
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id,steps.step,divisions.division_name order by steps.step");
		}else{
			$course 						=	\Auth::user()->course_id;
			$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and divisions.course_id=$course group by grades.id,steps.step,divisions.division_name order by steps.step");
		}

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'		=>		$grade,
    		'student'	=>		$data->all()

    	]);
    }

    public function pdf(Request $request,$gid,$pid)
    {
    	$part							=	$pid;
		$grade							=	$gid;
		if ($part == 1) {
			$student1					=	\App\Student::where('grade_id',$grade)->get();
			$student2 					= 	\App\Student::join('transactions','students.id','=','transactions.student_id')->groupBy('students.id')->select('students.*')->get();
			$data['students']			=	$student1->diff($student2);
			$data['tittle'] 			=	'BELUM MEMBAYAR';
			$data['grades']				=	\App\Grade::where('id',$grade)->get();
			$data['step']				=	\DB::select("select steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and grades.id=$grade");

			$pdf           				=       \PDF::loadView('pages.statstudents.cnpdf',compact('data'));
        	foreach ($data['step'] as $g) {
        		return $pdf->setPaper('a4', 'portrait')->download($g->step.'_'.$g->division_name.'_np_'.date('Y_m_d').'_statpay.pdf');
        	}
	        // return View('pages.statstudents.cnpdf',compact('data'));
		}elseif ($part == 2) {
			$student 					= 	\DB::select("select students.*,sum(transactions.pay) as total from students,transactions where students.id=transactions.student_id and students.grade_id=$grade group by students.id order by students.name");
			$result						=	collect($student);
			$data['students']			=	$result->where('total','<',Callprice());
			$data['tittle'] 			=	'BELUM MELUNASI';
			$data['grades']				=	\App\Grade::where('id',$grade)->get();
			$data['step']				=	\DB::select("select steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and grades.id=$grade");

			$pdf           				=       \PDF::loadView('pages.statstudents.nppdf',compact('data'));
        	foreach ($data['step'] as $g) {
        		return $pdf->setPaper('a4', 'portrait')->download($g->step.'_'.$g->division_name.'_nc_'.date('Y_m_d').'_statpay.pdf');
        	}
	        // return View('pages.statstudents.cnpdf',compact('data'));
		}else{
			$student 					= 	\DB::select("select students.*,sum(transactions.pay) as total from students,transactions where students.id=transactions.student_id and students.grade_id=$grade group by students.id order by students.name");
			$result	=	collect($student);
			$data['students']			=	$result->where('total','>=',Callprice());
			$data['tittle'] 			=	'SUDAH MELUNASI';
			$data['grades']				=	\App\Grade::where('id',$grade)->get();
			$data['step']				=	\DB::select("select steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and grades.id=$grade");

			$pdf           				=       \PDF::loadView('pages.statstudents.cnpdf',compact('data'));
        	foreach ($data['step'] as $g) {
        		return $pdf->setPaper('a4', 'portrait')->download($g->step.'_'.$g->division_name.'_cp_'.date('Y_m_d').'_statpay.pdf');
        	}
	        // return View('pages.statstudents.cnpdf',compact('data'));
		}
    }
}
