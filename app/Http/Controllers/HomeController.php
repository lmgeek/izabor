<?php

namespace Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Order\Order;

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
        return view('home');
    }


    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $products = App\product::all();
        return view('welcome', compact('$products','products'));
    }
}
