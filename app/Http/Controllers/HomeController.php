<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y');
        $incomingOrder  = Order::where('status','=','0')->whereYear('created_at',$year)->count();
        $processOrder   = Order::where('status','=','1')->whereYear('created_at',$year)->count();
        $revenueOrder   = Order::where('status','=','1')->whereYear('created_at',$year)->sum('total_amount');
        $revenueHold   = Order::where('status','=','0')->whereYear('created_at',$year)->sum('total_amount');
        
        return view('homeLTE', compact('incomingOrder','processOrder','revenueOrder','revenueHold'));
    }
}
