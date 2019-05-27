@extends('layouts.app')

@section('content')
bids from agency for events
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Agency Id</th>
            <th>Agency Name</th>
            <th>Events Id</th>
            <th>Events Name</th>
            <th>Event images</th>
            <th>Bids</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($d as $item)
            <tr>
            <td scope="row"> {{ $item->agency_id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->event_id }}</td>
            <td><img src="public/images/{{$item->filename}}" style="width:100px;height:100px;"></td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->bid_price }}</td>
            <td><a class="btn btn-primary" href="#">select</a></td>
            </tr>
            @endforeach
        </tbody>
</table>
@endsection