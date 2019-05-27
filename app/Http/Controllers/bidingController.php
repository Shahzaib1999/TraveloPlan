<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\events;
use App\biding;
use DB;

class bidingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('bidings')
        ->join('users','users.id','=','bidings.agency_id')
        ->join('events','events.id','=','bidings.event_id')
        ->select('bidings.agency_id','users.name','bidings.event_id','events.title','bidings.bid_price')->get()->sortBy('event_id');
        return view('biding/showbid')->with('d',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aid=Auth::user()->id;
        $eid=$request->event_id;
        $bid=$request->bid_price;

        $obj=new biding();
        $obj->agency_id=$aid;
        $obj->event_id=$eid;
        $obj->bid_price=$bid;
        $obj->save();


        echo "<script> alert('Bid Added') </script>";
        return redirect('/Event/'.$eid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        if(Auth::user()->role == 'Agency'){
            
            $d=events::find($id);

            
            return view('biding/Addbid')->with('data',$d);

        }

       // return redirect()->route('/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "destroy";
    }
}
