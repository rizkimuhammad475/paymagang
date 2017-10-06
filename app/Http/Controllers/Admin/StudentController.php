<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
	{
		$data[ 'courses' ] 							= 	\App\Course::paginate(9);

		return view( 'pages.students.list', compact( 'data' ) );
	}

	public function division($courseId)
	{
		$data[ 'divisions' ] 						= 	\DB::select("select grades.*,divisions.division_name,divisions.course_id,steps.step from grades,divisions,steps where grades.division_id=divisions.id and grades.step_id=steps.id and divisions.course_id='$courseId' group by grades.id order by divisions.division_name");

		return view( 'pages.students.divisionlist', compact( 'data' ) );
	}

	public function grade($courseId,$gradeId)
	{
		$data[ 'students' ] 						= 	\App\Student::where('grade_id',$gradeId)->orderBy('name')->get();
		$data[ 'grades' ] 							= 	\App\Grade::find($gradeId);
		$data['courseId']							=	$courseId;
		$data['gradeId']							=	$gradeId;

		return view( 'pages.students.studentlist', compact( 'data' ) );
	}

	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'name' 									=> 'required|string|max:50|min:1',
            'gender' 								=> 'required|string|min:4',
            'nis'		 							=> 'required|integer|min:8',
            'grade_id'		 						=> 'required|integer'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$student 									=	new \App\Student;
		$student->name 								=	$request->name;
		$student->gender 							=	$request->gender;
		$student->nis 								=	$request->nis;
		$student->grade_id 							=	$request->grade_id;
		$student->save();


		
		return \Redirect::back()
					->with('sc_msg', 'Student successfuly added');
	}

	public function export(Request $request,$gid,$type)
	{
		$data = \App\Student::where('grade_id',$gid)->select('nis','name','gender')->get()->toArray();
		$grade				=	\DB::select("select steps.step,divisions.division_name from grades,steps,divisions where grades.step_id=steps.id and grades.division_id=divisions.id and grades.id=$gid");
		foreach ($grade as $exp) {

			return \Excel::create('data_student_'.$exp->step.'_'.$exp->division_name, function($excel) use ($data) {
			$excel->sheet(date('Y_m_d'), function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
			})->download($type);
		}
	}

	public function import(Request $request)
	{
		if(\Input::hasFile('import_file')){
			$path = \Input::file('import_file')->getRealPath();

			$data = \Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && count($data)){
				foreach ($data as $key => $value) {
					$insert[] = ['name' => $value->name, 'gender' => $value->gender, 'nis' => $value->nis, 'grade_id' => $request->grade_id];
				}
				if(!empty($insert)){
					\DB::table('students')->insert($insert);
					return \Redirect::back()->with('sc_msg', 'Student successfuly added');
				}
				return \Redirect::back()->with('err_msg', 'Error data not inserted');
			}
			return \Redirect::back()->with('err_msg', 'Error data is empty');
		}
		return \Redirect::back()->with('err_msg', 'Error while import data');
	}
	public function edit(Request $request,$courseId,$gradeId,$id)
	{
		$edit['data']								= 	\App\Student::where('id',$id)->get();
		$edit['courseId']							=	$courseId;
		$edit['gradeId']							=	$gradeId;

		return view('pages.students.edit', compact('edit'));
	}
	public function update(Request $request,$courseId,$gradeId,$id)
	{
		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'name' 									=> 'required|string|max:50|min:1',
            'gender' 								=> 'required|string|min:4',
            'nis'		 							=> 'required|integer|min:8'
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$update 									= \App\Student::where('id',$id);
		$update->update([
						'name'		=>$request->name,
						'gender'	=>$request->gender,
						'nis'		=>$request->nis
						]);

		return \Redirect::to('admin/manage/student/'.$courseId.'/'.$gradeId)
					->with('sc_msg', 'Student successfuly edited');
		
	}

	public function destroy(Request $request,$courseId,$gradeId,$id)
	{
		$model 										= \App\Student::where('id',$id);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}

	public function detail(Request $request)
	{
		$data['detail']								= \App\Ticket::where([

															'film_id'	=>$request->film_id,
															'play_at'	=>$request->play_at,
															'end_at'	=>$request->end_at,
															'start_at'	=>$request->start_at,
															'expired_at'=>$request->expired_at

														])->limit(1)->get();

		return view('pages.events.detail', compact('data'));
	}
}
