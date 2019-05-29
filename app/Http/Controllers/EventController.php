<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\events;
use App\bidings;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=events::all();
        return view('Event/onbidevents')->with('d',$data);
    }


    public function eventname()
    {
        $data=DB::table('bidings')
        ->join('events','events.id','=','bidings.event_id')
        ->select('events.id','events.title','bidings.event_id')->distinct()->get();
        return view('Event/showevents')->with('d',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin'){
            
            return view('Event/AddEvent');

        }

        return redirect()->route('/login');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(Auth::user()->role == 'Admin'){
            // $this->validate($request, [
            //     'filename' => 'required',
            //     'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // ]);
            $arr = [];
            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){
                    // $image=$request->filename;
                    $data = fopen($image, 'rb');
                    $size = filesize($image);
                    $contents = fread($data, $size);
                    fclose($data);
                    $encoded = base64_encode($contents);
                    array_push($arr, $encoded);
                    // echo serialize($arr);
                }
            }

            $t = $request->title;
            $d = $request->description;
            $ld = $request->detail_desc;
            $es = $request->Starting_date;
            $ee = $request->End_date;
            $e = $request->End_Time;
            $mx = $request->max_price;
            $ev = false;
            $ci = $request->city;
            $m = $request->minimum_price;
        
            // if($request->hasfile('filename'))
            // {

            //    foreach($request->file('filename') as $image)
            //    {
            //        $name=$image->getClientOriginalName();
            //        $image->move(public_path().'/images/', $name);  
            //        $data[] = $name;  
            //    }
            // }

            $obj=new events();
            $obj->title=$t;
            $obj->description=$d;
            $obj->detail_desc=$ld;
            $obj->Starting_date=$es;
            $obj->End_date=$ee;
            $obj->End_Time=$e;
            $obj->max_price=$mx;
            $obj->minimum_price=$m;
            $obj ->status = $ev;
            $obj ->cities = $ci;
            $obj->image = json_encode($arr);
            

            $obj->save();

                


            echo "<script> alert('Event Added') </script>";
            return redirect('Event');

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data=DB::table('bidings')
        // ->join('users','users.id','=','bidings.agency_id')
        // ->join('events','events.id','=','bidings.event_id')->where('events.id', '==', '1')
        // ->select('bidings.agency_id','users.name','bidings.event_id','events.title','bidings.bid_price')
        // ->get()->sortBy('event_id');

        // $data=DB::table('bidings')
        // ->join('users','users.id','=','bidings.agency_id')
        // ->where('bidings.event_id', '=', $id)
        // ->join('events','events.id','=','bidings.event_id')
        // ->get();
        

        // return view('Event/showbids')->with('d',['a'=>$data, 'b'=>$id]); 

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
        $data=events::find($id);
       return view('/Event/updateEvent')->with('data',$data);
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
        if(Auth::user()->role == 'Admin'){
            // $this->validate($request, [
            //     'filename' => 'required',
            //     'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // ]);
            $arr = [];
            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){
                    // $image=$request->filename;
                    $data = fopen($image, 'rb');
                    $size = filesize($image);
                    $contents = fread($data, $size);
                    fclose($data);
                    $encoded = base64_encode($contents);
                    array_push($arr, $encoded);
                    // echo serialize($arr);
                }
            }

            $t = $request->title;
            $d = $request->description;
            $ld = $request->detail_desc;
            $es = $request->Starting_date;
            $ee = $request->End_date;
            $e = $request->End_Time;
            $mx = $request->max_price;
            $ev = false;
            $ci = $request->city;
            $m = $request->minimum_price;
        
            // if($request->hasfile('filename'))
            // {

            //    foreach($request->file('filename') as $image)
            //    {
            //        $name=$image->getClientOriginalName();
            //        $image->move(public_path().'/images/', $name);  
            //        $data[] = $name;  
            //    }
            // }

            $obj = events::find($id);
            $obj->title=$t;
            $obj->description=$d;
            $obj->detail_desc=$ld;
            $obj->Starting_date=$es;
            $obj->End_date=$ee;
            $obj->End_Time=$e;
            $obj->max_price=$mx;
            $obj->minimum_price=$m;
            $obj ->status = $ev;
            $obj ->cities = $ci;
            $obj->image = json_encode($arr);
            

            $obj->save();

                


            echo "<script> alert('Event Added') </script>";
            return redirect('Event');

    }
    }



    public function updatestatus(Request $request, $id)
    {
        $aid = $request->agency_id;
        $fp = $request->final_price;
        $eeid = $request->eid;

        $obj = events::find($eeid);
        $obj->agency_id = $aid;
        $obj->price = $fp;
        $obj->status = 1;

        $obj->save();

        return redirect('/EventInfo/'.$eeid);
     
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventInfo($id)
    {
        
        $d=DB::table('bidings')
        ->join('users','users.id','=','bidings.agency_id')
        ->join('events','events.id','=','bidings.event_id')
        ->select('users.name','users.id as uid','bidings.bid_price','events.id')->get();


        $data=events::find($id);
        // echo $data;
        return view('Event/showEventInfo')->with('data',['a'=>$data, 'bids'=>$d]);
        // echo $data;
    }
}
