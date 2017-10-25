<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuideController extends Controller
{
    public function index(Request $request)
    {
    	$update 		=	\App\User::where('id',\Auth::user()->id);
    	$update->update(['read_guide' => 1]);
    	return view('pages.guides.list');
    }
}
