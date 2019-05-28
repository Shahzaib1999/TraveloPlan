@extends('layouts.app')

@section('content')
<div>

<!-- Carousel start -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" height="600"
                    src="https://tr-images.condecdn.net/image/5K4zKqvQBrX/crop/2040/f/joali-maldives-dec18-pr13.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Maldives</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="600" src="http://www.hi.tours/images/banner-nepal.jpg"
                    alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Nepal</h1>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span c*lass="sr-only"></span>
        </a>
    </div>
    <!-- Carousel end -->

    <div class="mt-5" style="width: 90%; margin: 0 auto; border: 0px solid">
        <div>
            <p id="main-heading">TOP PLACES</p>
            <p id="sub-heading">BEST TRAVEL PACKAGES AVAILABLE</p>
        </div>

        <div class="row">
            @foreach ($d as $item)

            @if((Auth::user()->role == 'Users' && !$item->status == 0) || ((Auth::user()->role == 'Agency' || Auth::user()->role == 'Admin') && $item->status == 0))
            
                <div id="card" class="col-lg-4 col-md-6">
                    <div>
                        <?php 
                            $a = json_decode($item->image);
                        ?>
                        <img src="data:image/png;base64, <?php echo $a[0] ?>" width="100%" height="260">
                        <div class="tr-price">
                            <span>{{ $item->max_price }} USD</span>
                        </div>
                    </div>
                    <div>
                        <p id="card-heading">{{ $item->title }}</p>
                        <p id="card-sub-heading">{{ $item->description }}</p>
                    </div>
                    <div style="width:350px; margin-top:50px; border-top: 1px solid; color: rgba(0,0,0,.1); margin: 25px auto"
                        align="center"></div>
                    <div>
                        <p id="card-text">Cities: <?php $city = str_replace(" ",",",$item->cities); echo $city?></p>
                    </div>
                    <div class="row" id="btn-main">
                        @if(Auth::user()->role == 'Admin')
                            <button id="btn-card"><i class="fas fa-edit"></i> Edit</button>
                            <button id="btn-card2" onClick="document.location.href='/EventInfo/{{ $item->id }}'"><i class="fas fa-info-circle"></i> Info</button><br />
                            <button id="btn-card3"><i class="fas fa-trash-alt"></i> Delete</button>
                        @endif
                        @if(Auth::user()->role == 'Agency')
                            <button id="btn-card2" style="width: 100%" onClick="document.location.href='/EventInfo/{{ $item->id }}'"><i class="fas fa-info-circle"></i> Info</button>
                        @endif 
                        @if(Auth::user()->role == 'Users')
                        <a href="/userEvent/create/{{ $item->id }}" class="btn btn-primay">going event</a>
                            <button id="btn-card"><i class="fas fa-location-arrow" onClick="document.location.href='/userEvent'"></i> Going</button>
                            <button id="btn-card2" onClick="document.location.href='/EventInfo/{{ $item->id }}'"><i class="fas fa-info-circle"></i> Info</button>
                        @endif 
                    </div>
                </div>

            @else
                <div></div>
            @endif

            @endforeach
        </div>
    </div>

@endsection