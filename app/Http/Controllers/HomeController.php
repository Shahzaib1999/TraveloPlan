<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user_events;
use App\User;
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
        
        if (!Auth::user()) {
            return redirect('login');
        }
        else if(Auth::user()->role == 'Admin'){
            $data = User::orderBy('id','asc')->paginate(5);
            return view('Adminhome')->with('d',$data);;
        }else if(Auth::user()->role == 'Users'){
            $data = user_events::all()->where('user_id','=',Auth::user()->id);
            return view('Userhome')->with('d',$data);
        }
        else if(Auth::user()->role == 'Agency'){
            return view('Agencyhome');
        }else{
            return redirect('login');
        }
        
    }
}
