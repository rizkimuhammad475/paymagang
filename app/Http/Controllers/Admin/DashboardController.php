<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$data['feedbacks']							=	\App\Feedback::all()->count();
		$data['transactions']						=	\App\Transaction::all()->count();
		$data['students']							=	\App\Student::all()->count();
		$data['users']								=	\App\User::all()->count();

		$data['superadmins']						=	\App\User::where('role_id',1)->get();

		$data['admins']								=	\DB::select('select users.*,count(transactions.pay) as serve,courses.course_name from users,transactions,courses where users.id=transactions.user_id and users.course_id=courses.id and users.role_id=2 group by users.id order by serve desc,users.created_at asc');

		$data['operators']								=	\DB::select('select users.*,count(transactions.pay) as serve,courses.course_name from users,transactions,courses where users.id=transactions.user_id and users.course_id=courses.id and users.role_id=3 group by users.id order by serve desc,users.created_at asc');

		return view( 'pages.dashboard',compact('data'));
	}
}
