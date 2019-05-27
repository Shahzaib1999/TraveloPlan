@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! As Agency

                    <a href="/Event" class="btn btn-primay">Show event</a>
                    <a href="/bid" class="btn btn-primay">Show bid</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
