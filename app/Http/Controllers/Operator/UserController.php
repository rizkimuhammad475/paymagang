<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
	{
		$data[ 'films' ] 							= \App\Film::join('tickets','films.id','=','tickets.film_id')
												->where('expired_at','>=',date('Y-m-d'))
												->where('is_blocked',0)
												->select('films.*')
												->groupBy('id','film_tittle','film_description','is_blocked','created_at','updated_at')
												->get();

		return view( 'pages.interface.home', compact( 'data' ) );
	}
	public function feedback()
	{
		return view('pages.interface.feedback');
	}

	public function feedbackstore(Request $request)
	{
		$feedbackstore 								=	new \App\Feedback;

		$feedbackstore->feedback_text				= $request->feedback;

		$feedbackstore->save();

		return \Redirect::to('user')->with('sc_msg','Feedback Successfuly Send');
	}

	public function detail(Request $request,$id)
	{
		$ticket['lists']							=	\App\Ticket::where('film_id',$id)
												->select('start_at','expired_at','play_at','end_at','film_id')
												->groupBy('start_at','expired_at','play_at','end_at','film_id')
												->get();

		return view('pages.interface.list_schedule', compact('ticket'));
	}

	public function serve(Request $request)
	{	
		if (\Session::has('sale')) {
			$ticket['lists']							=	\App\Ticket::where(
				[	'start_at'		=>	$request->start_at,
					'expired_at'	=>	$request->expired_at,
					'play_at'		=>	$request->play_at,
					'end_at'		=>	$request->end_at,
					'film_id'		=> 	$request->film_id])->get();

			$sold										= \App\Ticket_sale::where('sale_id', \Session::get('sale'))->get();
			$ticket['chart']								= \App\Ticket_sale::where('sale_id',\Session::get('sale'))
												->sum('price');

			return view('pages.interface.ticket_list', compact('ticket'));
		}

		$input_sale 								= new \App\Sale;
		$input_sale->save();

		$sale 										= \App\Sale::max('id');

		\Session::put('sale',$sale);

		$ticket['lists']							=	\App\Ticket::where(
			[	'start_at'		=>	$request->start_at,
				'expired_at'	=>	$request->expired_at,
				'play_at'		=>	$request->play_at,
				'end_at'		=>	$request->end_at,
				'film_id'		=> 	$request->film_id])->get();

		$sold										= \App\Ticket_sale::where('sale_id', \Session::get('sale'))->get();
		$ticket['chart']								= \App\Ticket_sale::where('sale_id',\Session::get('sale'))
												->sum('price');

		return view('pages.interface.ticket_list', compact('ticket'));
	}
	public function sale(Request $request)
	{
		$input_sale 								= new \App\Sale;
		$input_sale->save();

		$sale 										= \App\Sale::max('id');

		\Session::put('sale',$sale);

		return \Redirect::to('user')->with('sc_msg','Lets buy the tickets from films');
	}

	public function buy(Request $request,$play,$end,$start,$expired,$price,$ticket,$film,$studio,$row,$chair)
	{
		$ticket_buy									= \App\Ticket::where('id',$ticket);
		$ticket_buy->update(['status'=>\Session::get('sale')]);

		$ticket_sale								= new \App\Ticket_sale;
		$ticket_sale->play_at						= $play;
		$ticket_sale->end_at						= $end;
		$ticket_sale->start_at						= $start;
		$ticket_sale->expired_at					= $expired;
		$ticket_sale->price							= $price;
		$ticket_sale->sale_id						= \Session::get('sale');
		$ticket_sale->ticket_id						= $ticket;
		$ticket_sale->film_id						= $film;
		$ticket_sale->studio_id						= $studio;
		$ticket_sale->row_id						= $row;
		$ticket_sale->chair_id						= $chair;
		$ticket_sale->user_id						= \Auth::user()->id;
		$ticket_sale->Save();

		return \Redirect::back();

	}

	public function cancel(Request $request,$play,$end,$start,$expired,$price,$ticket,$film,$studio,$row,$chair)
	{
		$ticket_buy									= \App\Ticket::where('id',$ticket);
		$ticket_buy->update(['status'=>0]);

		$ticket_sale								= \App\Ticket_sale::where('ticket_id',$ticket);
		$ticket_sale->delete();

		return \Redirect::back();

	}

	public function clear()
	{
		$clear_update								= \App\Ticket::where('status',\Session::get('sale'));

		$clear_update->update(['tickets.status'=>0]);

		$ticket_sale								= \App\Ticket_sale::where('sale_id',\Session::get('sale'));
		$ticket_sale->delete();

		return \Redirect::back();

	}

	public function abort()
	{
		$clear_update								= \App\Ticket::where('status',\Session::get('sale'));

		$clear_update->update(['tickets.status'=>0]);

		$ticket_sale								= \App\Ticket_sale::where('sale_id',\Session::get('sale'));
		$ticket_sale->delete();

		\Session::forget('sale');

		return \Redirect::to('user')->with('sc_msg','Booking successfuly cancel');

	}

	public function chart(Request $request)
	{
		$chart['list']								= \App\Ticket_sale::where('sale_id',\Session::get('sale'))
												->sum('price');
		dd($chart['list']);
		return view( 'pages.interface.chart', compact( 'chart' ) );
		
	}
	public function checkout()
	{
		$checkout['list']							= \App\Ticket_sale::where('sale_id',\Session::get('sale'))->get();

		return view('pages.interface.checkout',compact('checkout'));
	}
	public function docheckout(Request $request)
	{
		$checkout['price']							= \App\Ticket_sale::where('sale_id',\Session::get('sale'))->sum('price');
		$get_back									= $request->pay - $checkout['price'];

		if ($get_back < 0) {
			return \Redirect::back()->with('err_msg','Pay less than price,please add more money');
		}

		$checkout['list']							= \App\Sale::where('id',\Session::get('sale'));

		$checkout['list']->update([
						'sale_date'=>date('Y-m-d H:i:s'),
						'sale_total'=>$checkout['price'],
						'sale_pay'=>$request->pay,
						'sale_back'=>$get_back]);

		$transaction								= new \App\Transaction;
		$transaction->sale_id 						= \Session::get('sale');
		$transaction->user_id 						= \Auth::user()->id;
		$transaction->save();

		\Session::forget('sale');

		return \Redirect::to('user')->with('sc_msg','Ticket Successfuly Booking,the change is '.$get_back);
	}
}
