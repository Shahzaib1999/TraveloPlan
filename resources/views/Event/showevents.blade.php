@extends('layouts.app')

@section('content')

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Events Id</th>
            <th>Events Name</th>
            <th>bid event id</th>
            <th>show bids</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($d as $item)
            <tr>
            <td scope="row"> {{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->event_id }}</td>
            <td><a href="/Event/{{$item->id}}" class="btn btn-primay" >show bids</a></td>
            </tr>
            @endforeach
        </tbody>
</table>
@endsection