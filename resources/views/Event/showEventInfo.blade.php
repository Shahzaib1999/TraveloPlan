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
                    <div class="col-md-4"><span id="country"><?php echo str_replace(" ",",",$data->cities) ?></span></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-right">
                        <span style="color:#6f6f6f">Starting From</span><br />
                        <span id="price">PKR {{ $data->minimum_price }}</span>
                    </div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                            <?php 
                            $a = json_decode($data->image);
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
            <input hidden type="text" value="{{ $data->end_Time }}" id="timing">
            <div class="col-md-4">
                <!-- <button class="btn btn-primary btn-block">Book Now</button> -->
                <div id="timer">
                    <p class="text-center" id="time"></p>
                </div>

                <div class="card mt-3" style="height: 460px;">
                    <div class="card-header text-center">
                        <h2>Bids</h2>
                    </div>
                    <div class="card-body" style="overflow:scroll">
                        <div id="bid">
                            <span class="card-title">Price</span>
                            <p class="card-text">Agency Name</p>
                        </div>


                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="text" name="messages" id="msg" class="form-control" style="background: #fff">
                            </div>
                            <div class="col-md-3">
                                <button type="button" name="messages" class="form-control">
                                    <i class="fas fa-paper-plane" style="color: #21ab64"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5">
            <div>
                <span id="city-heading">Cities</span>
                <ul class="mt-2">
                        <li id="city-name"><?php echo str_replace(" ","<li id='city-name'>",$data->cities) ?></li>
                </ul>
            </div>

            <div class="mt-5">
                <span id="description-heading">Description</span>
                <input id="hide" hidden type="text" value="{{ $data->detail_desc }}" onload="a()">
                <div id="detail" class="mt-2">
                    
                </div>
            </div>
        </div>

    </div>

    {{-- @endforeach --}}

</div>
<script>
    (function(){
        document.getElementById('detail').innerHTML = document.getElementById('hide').value;
    })();
    
    var t = document.getElementById('timing').value;
    var time = t.replace("T"," ");
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
        }
    }, 1000);
</script>

@endsection