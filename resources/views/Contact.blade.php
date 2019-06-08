@extends('layouts.app')

@section('content')

<style>

p{
    color: gray; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}

</style>

<div class="containera">
    <img src="{{URL::asset('/images/contact.jpg')}}" class="img-fluid" width="100%" style="height: 350px;" alt="cover" />
    <div class="img"></div>
    <div class="centered">
        <h1 id="cover-heading">CONTACT US</h1>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="box">
                <h2>GET IN TOUCH</h2>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Name">
                </div>

                <div class="form-group"><br>
                    <input type="password" class="form-control" id="" placeholder="Email Id">
                </div>

                <div class="form-group">
                    <label for=""></label>
                    <textarea class="form-control" name="" id="" rows="4" placeholder="Comment"></textarea>
                </div>
                <button type="button" class="btn btn-success btn-block">SUBMIT</button><br>

            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="box2">
                <h4>OUR ADDRESS</h4>

                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> APWA Complex, 1st Floor, Agha Khan 3 Rd,
                    Garden East, Saddar Town, Karachi
                </p>

                <h4>OUR EMAIL</h4>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> info@traveloplan.pk</p>

                <h4>PHONE</h4>
                <p><i class="fa fa-phone" aria-hidden="true"> </i> Muhammad Zain : 0310-1021899 </p>
                <p><i class="fa fa-phone" aria-hidden="true"> </i> Muhammad Shahzaib : 0300-XXXXXXX </p>
                <p><i class="fa fa-phone" aria-hidden="true"> </i> Muhammad Mustafa : 0314-XXXXXXX </p>


            </div>
        </div>

    </div>
</div>

@endsection