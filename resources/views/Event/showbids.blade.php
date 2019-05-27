@extends('layouts.app')

@section('content')

@if(Auth::user()->role == 'Users')

    <button>aas</button>

@endif


@if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Agency')

    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Agency Name</th>
                <th>Bids</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($d['a'] as $item)
            
            <tr>
                <td scope="row"> {{ $item->name }}</td>
                <td>{{ $item->bid_price }}</td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    
    
    @if(Auth::user()->role == 'Agency')
    
    <form action="/bid" method="post">
        {{ csrf_field() }}
        
        <input type="hidden" name="event_id" value="{{$d['b']}}" class="form-control">
        
        <label for="bid_price">Bid Price</label>
        <input type="text" name="bid_price" class="form-control">
        
        <br><br>
        <button type="submit" class="btn btn-primary">Bid</button>
        
        
    </form>
    
    @endif

@endif


@endsection