<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_events;
use Auth;

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
        $data=user_events::all()->where('user_id','=',Auth::user()->id);
        return view('Userhome')->with('d',$data);
    }
}
