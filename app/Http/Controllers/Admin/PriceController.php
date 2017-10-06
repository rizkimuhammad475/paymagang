<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function index()
    {
		$prices['data']	=	\App\Price::limit(1)->get();
		$prices['row']	=	$prices['data']->count();

		return view('pages.prices.list', compact( 'prices' ));
    }

    public function store(Request $request)
    {
    	$price 			=	new \App\Price;
    	$price->price 	=	$request->price;
    	$price->save();

    	return \Redirect::back()->with('sc_msg', 'Price successfuly declared');
    }

    public function update(Request $request)
    {
    	$price 			= \DB::table('prices')->update(array('price' => $request->price));

    	return \Redirect::back()->with('sc_msg', 'Price successfuly edited');
    }
}
