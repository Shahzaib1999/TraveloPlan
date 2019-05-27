@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Bid</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/bid" method="post">
                    {{ csrf_field() }}

                    
            <label for="agency_id"> Agency id</label>
            <input type="text" name="agency_id" value="{{Auth::user()->id}}" class="form-control">
                        
            event id
            <input type="text" name="event_id" value="{{$data->id}}" class="form-control">

            

            <label for="bid_price">Bid Price</label>
            <input type="text" name="bid_price" class="form-control">


            <input type="text" name="status" value="On Bid" class="form-control">


            <br><br>
            <button type="submit" class="btn btn-primary">Bid</button>

                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
