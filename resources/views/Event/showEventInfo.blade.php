@extends('layouts.app')

@section('content')

<div class="">
    
    <div class="containera">
        <img src="{{URL::asset('/images/detail.jpg')}}" class="img-fluid" width="100%" style="height: 350px;" alt="cover">
        <div class="img"></div>
        <div class="centered">
            <h1 id="cover-heading">Booking Details</h1>
        </div>
    </div>

    {{-- @foreach ($d as $item) --}}

    <div class="container mt-5">
        <div class="row mt-5">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-4"><span id="country"><?php echo str_replace(" ",",",$data['a']->cities) ?></span></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-right">
                        @if(Auth::user()->role == 'Users')
                            <span style="color:#6f6f6f">Price</span><br />
                            <span id="price">PKR {{ $data['a']->price }}</span>
                        @else
                            <span style="color:#6f6f6f">Starting From</span><br />
                            <span id="price">PKR {{ $data['a']->minimum_price }}</span>
                        @endif
                    </div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                            <?php 
                            $a = json_decode($data['a']->image);
                        ?>
                        @for ($i = 0; $i < count($a); $i++)
                            @if($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            @endif
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        @for ($i = 0; $i < count($a); $i++)
                            @if($i == 0)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" height="450"src="data:image/png;base64, <?php echo $a[$i] ?>" alt="slide">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="d-block w-100" height="450"src="data:image/png;base64, <?php echo $a[$i] ?>" alt="slide">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            @endif
                        @endfor
                        
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

            </div>
            <input hidden type="text" value="{{ $data['a']->end_Time }}" id="timing">
            <div class="col-md-4">
                @if(Auth::user()->role == 'Users')
                    <button class="btn btn-primary btn-block">Book Now</button>
                @else
                    <div id="timer">
                        <p class="text-center" id="time"></p>
                    </div>

                    <div class="card mt-3" style="height: 460px;">
                        <div class="card-header text-center">
                            <h2>Bids</h2>
                        </div>
                        <div class="card-body" style="overflow:scroll">
                            @foreach ($data['bids'] as $item)
                            @if($item->id == $data['a']->id )
                            
                            <div id="bid">
                                    <span class="card-title">Rs: {{$item->bid_price}}</span>
                                    <p class="card-text">Agency name: {{$item->name}}</p>
                                    <p class="card-id" hidden>{{$item->uid}}</p>
                                </div>
                                
                                @endif
                                @endforeach


                        </div>
                        <form action="/bid" method="POST" id="bid_value">
                            {{csrf_field()}}
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="hidden" name="event_id" value="{{ $data['a']->id }}" class="form-control">
                                        <input type="text" name="bid_price" id="msg" class="form-control" style="background: #fff">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" name="messages" class="form-control" >
                                            <i class="fas fa-paper-plane" style="color: #21ab64"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

        </div>

        <div class="mt-5">
            <div>
                <span id="city-heading">Cities</span>
                <ul class="mt-2">
                        <li id="city-name"><?php echo str_replace(" ","<li id='city-name'>",$data['a']->cities) ?></li>
                </ul>
            </div>

            <div class="mt-5">
                <span id="description-heading">Description</span>
                <input id="hide" hidden type="text" value="{{ $data['a']->detail_desc }}" onload="a()">
                <div id="detail" class="mt-2">
                    
                </div>
            </div>
        </div>

    </div>

    {{-- @endforeach --}}

</div>

<input hidden type="text" value="{{ $data['a']->status }}" id="status">
<input hidden type="number" value="{{ $data['a']->max_price }}" id="max_price">

<form action="/Events/{{ $data['a']->id }}" method="POST" id="update">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    
    <input type="text" name="eid" value="{{ $data['a']->id }}" hidden>
    <input hidden type="number" value="" id="final_price" name="final_price">
    <input hidden type="number" value="" id="agency_id" name="agency_id">
    
    
    </form>


<script>
    (function(){
        document.getElementById('detail').innerHTML = document.getElementById('hide').value;
    })();
    
    var time = document.getElementById('timing').value;

    var card_title = document.getElementsByClassName("card-title");
    let max_price = document.getElementById("max_price").value;
    // var time = t.replace("T"," ");
    // console.log(t.replace("T"," "));

    // Set the date we're counting down to
    var countDownDate = new Date(time).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="tine"
        document.getElementById("time").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "Biding Finished";
            document.getElementById("bid_value").hidden = true;

            if(document.getElementById('status').value == 0 && card_title.length){

                for(let i = 0; i < card_title.length; i++) {
                    let element = card_title[i].innerHTML;
                    // console.log(element.slice(4,element.length))
                    
                    if (max_price > parseInt(element.slice(4,element.length))) {

                        max_price = parseInt(element.slice(4,element.length));
                        var card_id = document.getElementsByClassName("card-id")[i].innerHTML;
                        document.getElementById("final_price").value = max_price;
                        document.getElementById("agency_id").value = card_id;
                        // console.log(card_id,"id");
                        
                        console.log(max_price,"ddddddddddddddddddddd");
                        
                    }
                }
                document.getElementById('update').submit();
            }
        }
    }, 1000);
    
    

</script>

@endsection