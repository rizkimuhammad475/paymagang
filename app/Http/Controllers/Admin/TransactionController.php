<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
	{
		return view( 'pages.transactions.list' );
	}

	public function getdata(Request $request)
	{
		$search							=	$request->search;
		$grade							=	$request->grade;
		$transaction 					= 	
		\DB::select("select students.id as sid,students.nis,transactions.pay,transactions.created_at,transactions.id as tid,students.name,transactions.id,users.username,steps.step,divisions.division_name from transactions,students,users,grades,steps,divisions where transactions.student_id=students.id and transactions.user_id=users.id and students.grade_id=grades.id and grades.step_id=steps.id and grades.division_id=divisions.id and grades.id='$grade' and students.name like '%$search%' group by students.id,transactions.pay,transactions.created_at,transactions.id order by transactions.id desc limit 20");
		// \App\Student::where('grade_id',$grade)->where('name','LIKE',"%$search%")->orderBy('grade_id')->get();
		$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id order by steps.step");

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'			=>		$grade,
    		'transaction'	=>		$transaction

    	]);
	}
	public function edit(Request $request,$id,$gid)
	{
		$new				=	\App\Transaction::where('id',$id);
		$new->update(['pay'=>$request->price]);

		$search							=	$request->search;
		$grade							=	$gid;
		$transaction 					= 	
		\DB::select("select students.id as sid,students.nis,transactions.pay,transactions.created_at,transactions.id as tid,students.name,transactions.id,users.username,steps.step,divisions.division_name from transactions,students,users,grades,steps,divisions where transactions.student_id=students.id and transactions.user_id=users.id and students.grade_id=grades.id and grades.step_id=steps.id and grades.division_id=divisions.id and grades.id='$grade' and students.name like '%$search%' group by students.id,transactions.pay,transactions.created_at,transactions.id order by transactions.id desc limit 20");
		// \App\Student::where('grade_id',$grade)->where('name','LIKE',"%$search%")->orderBy('grade_id')->get();
		$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id order by steps.step");

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'			=>		$grade,
    		'transaction'	=>		$transaction

    	]);

	}
	public function delete(Request $request,$id,$gid)
	{
		$delete				=	\App\Transaction::where('id',$id);
		$delete->delete();

		$search							=	$request->search;
		$grade							=	$gid;
		$transaction 					= 	
		\DB::select("select students.id as sid,students.nis,transactions.pay,transactions.created_at,transactions.id as tid,students.name,transactions.id,users.username,steps.step,divisions.division_name from transactions,students,users,grades,steps,divisions where transactions.student_id=students.id and transactions.user_id=users.id and students.grade_id=grades.id and grades.step_id=steps.id and grades.division_id=divisions.id and grades.id='$grade' and students.name like '%$search%' group by students.id,transactions.pay,transactions.created_at,transactions.id order by transactions.id desc limit 20");
		// \App\Student::where('grade_id',$grade)->where('name','LIKE',"%$search%")->orderBy('grade_id')->get();
		$grade							=	\DB::select("select grades.id,steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id group by grades.id order by steps.step");

		// return view( 'pages.pays.list', compact( 'data' ) );
		return response()->json([

    		'grade'			=>		$grade,
    		'transaction'	=>		$transaction

    	]);

	}

	public function export(Request $request,$type)
	{
			$result 			= \DB::select("select students.nis,transactions.pay,transactions.created_at,students.name,users.username,steps.step,divisions.division_name from transactions,students,users,grades,steps,divisions where transactions.student_id=students.id and transactions.user_id=users.id and students.grade_id=grades.id and grades.step_id=steps.id and grades.division_id=divisions.id order by transactions.id desc");
			$data = json_decode(json_encode($result), true);

			return \Excel::create('all_transactions_'.date('Y_m_d'), function($excel) use ($data) {
			$excel->sheet(date('Y_m_d'), function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
			})->download($type);
	}

	public function pdfall()
	{
		$data['transactions'] 			= \DB::select("select students.id as sid,students.nis,transactions.pay,transactions.created_at,transactions.id as tid,students.name,transactions.id,users.username,steps.step,divisions.division_name from transactions,students,users,grades,steps,divisions where transactions.student_id=students.id and transactions.user_id=users.id and students.grade_id=grades.id and grades.step_id=steps.id and grades.division_id=divisions.id order by transactions.id desc");
		$data['tittle']					=	'DAFTAR SELURUH TRANSAKSI';
		$pdf           				=       \PDF::loadView('pages.transactions.tpdfall',compact('data'));
        return $pdf->setPaper('a4', 'portrait')->download(date('Y_m_d').'_alltransactions.pdf');
		// return view('pages.transactions.tpdfall',compact('data'));

	}
}
