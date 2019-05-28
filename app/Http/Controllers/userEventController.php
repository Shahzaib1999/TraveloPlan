<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\events;
use App\bidings;
use DB;
use App\user_events;


class userEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //echo "id found".$id;
         $data=events::find($id);
        
         return view('userEvent/addUserEvent')->with('data',$data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = $request->userId;
        $uname = $request->userName;
        $uemail = $request->email;
        $ucn = $request->contactNumber;
        $uc = $request->cnic;
        $unop = $request->numberOfPackages;
        $utp = $request->totalPrice;


        $obj=new user_events();
            $obj->user_id=$uid;
            $obj->user_name=$uname;
            $obj->email=$uemail;
            $obj->contact_number=$ucn;
            $obj->cnic=$uc;
            $obj->number_of_packages=$unop;
            $obj->total_price=$utp;

            $obj->save();

            return view('Userhome');
            
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
