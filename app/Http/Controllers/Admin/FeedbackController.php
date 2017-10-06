<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
    	$feedbacks									=	\App\Feedback::where('is_read',0);
    	$feedbacks->update(['is_read'=>1]);

		$data['feedbacks']							=	\App\Feedback::paginate(20);

		return view('pages.feedbacks.list', compact( 'data' ));
    }

    public function create()
    {
    	return view('pages.feedbacks.create');
    }

    public function store(Request $request)
    {
    	$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'ftext' 								=> 'required|string|min:4',
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($request->all());
		}

    	$data										=	new \App\Feedback;
    	$data->feedback_text						=	$request->ftext;
    	$data->save();
    	return \Redirect::back()->with('sc_msg','Feedback Successfully Send');
    }

    public function destroy(Request $request,$id)
    {
    	# code...
    }
}
