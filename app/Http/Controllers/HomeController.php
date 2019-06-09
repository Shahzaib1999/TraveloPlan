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
            $agency = User::where('role','Agency')->orderBy('id','asc')->simplePaginate(5);
            $user = User::where('role','Users')->orderBy('id','asc')->simplePaginate(5);
            return view('Adminhome')->with('d',['agency'=>$agency,'user'=>$user]);;
        }
        else if(Auth::user()->role == 'Users'){
            // $data = user_events::all()->where('user_id','=',Auth::user()->id);
            return redirect('Event');
        }
        else if(Auth::user()->role == 'Agency'){
            return redirect('Event');
        }
        else{
            return redirect('login');
        }
        
    }

    public function block(Request $request,$id)
    {
        $block = true;

        $upd = User::all()->find($id);
        $upd->block = $block;
        $upd->save();

        return redirect('home');
        
    }

    public function unblock(Request $request,$id)
    {
        $block = false;

        $upd = User::all()->find($id);
        $upd->block = $block;
        $upd->save();

        return redirect('home');
    }
}
