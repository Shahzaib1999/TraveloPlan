@extends('layouts.app')

@section('content')

<style>

.jumbotron{
    font-size: 25px;
    font-weight: 600;
    line-height: 1.5;
    padding-top: 35px 
}

</style>

<div class="containera">
    <img src="{{URL::asset('/images/contact.jpg')}}" class="img-fluid" width="100%" style="height: 350px;" alt="cover" />
    <div class="img"></div>
    <div class="centered">
        <h1 id="cover-heading">My Tours</h1>
    </div>
</div>

<div class="container mt-5">
    
    @foreach ($data as $item)

        @if(Auth::user()->role == 'Users' && Auth::user()->id == $item->user_id)
            <div class="jumbotron border border-primary">
                <h3>Name: {{$item->user_name}}</h3>
                <h4>Email: {{$item->email}}</h4>
                <h4>Contact: {{$item->contact_number}}</h4>
                <h4>No. of persons: {{$item->number_of_packages}}</h4>
                <h4>Total Price: {{$item->total_price}}</h4>
            </div>
        @elseif(Auth::user()->role == 'Agency')
            <div class="jumbotron border border-primary">
                <h3>Client Name: {{$item->user_name}}</h3>
                <h4>Email: {{$item->email}}</h4>
                <h4>Contact: {{$item->contact_number}}</h4>
                <h4>No. of persons: {{$item->number_of_packages}}</h4>
                <h4>Total Price: {{$item->total_price}}</h4>
            </div>
        @endif


    @endforeach


</div>

@endsection