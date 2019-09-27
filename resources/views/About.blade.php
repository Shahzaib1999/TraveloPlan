@extends('layouts.app')

@section('content')


<style>

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
}
  
.title {
    color: grey;
    font-size: 28px;
}

.name
{
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 26px
}

h5{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
p{
    color: gray;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}

</style>

<div class="containera">
    <img src="{{URL::asset('/images/about.jpg')}}" class="img-fluid" width="100%" style="height: 350px;" alt="cover" />
    <div class="img"></div>
    <div class="centered">
        <h1 id="cover-heading">ABOUT TRAVELOPLAN</h1>
    </div>
</div>


<div class="container mt-5">

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h1>About Traveloplan</h1>
            <p style="font-size: 17px;line-height: 1.4;">Have you ever looked for a trip online?
                Did you noticed there are so many prices out there for the same trip. Traveloplan does the work for
                you and instantly compare prices with many agencies, So instead of searching for hours and spending
                too much time Traveloplan makes it easy to find ideal offer for the best price.
                Traveloplan is public service website that provides travel and tourism services to the public on
                behalf of suppliers such as activities, airlines, cruise lines, hotels and railways etc. our biggest
                moto is to serve highest acheivement of comfort and luxury on very low rates.
                For the first time in Pakistan, Total Travels Services proudly introduces tour packages. We provide Complete travel packages at an affordable price,
                international and domestic tickets, Visa counselling, Travel Insurance, Cruise & boat services,
                luxury Island tours, Sightseeing , Village Life, Hot Air Baloon services and many more.</p>
        </div>


        <div class="col-md-4 col-sm-12">
            <img id="img" src="{{URL::asset('/images/plane.jpg')}}" class="img-thumbnail">
            <img id="img2" src="{{URL::asset('/images/plane2.jpg')}}" class="img-thumbnail">
            <img id="img3" src="{{URL::asset('/images/plane3.jpg')}}" class="img-thumbnail">
        </div>

    </div>


    <img src="{{URL::asset('/images/line.png')}}" class="img-fluid">

    <div class="col-xs-4 text-center">
        <h1 style="color:#212529">
            OUR TEAM
        </h1>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <img src="https://ru.opensuse.org/images/0/0b/Icon-user.png" alt="Shahzaib" style="width:100%;height: 250px;">
                <span class="name">Muhammad Shahzaib</span>
                <p class="title mt-2">CEO & Founder</p>
                <p class="mt-2">XYZ University</p>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://ru.opensuse.org/images/0/0b/Icon-user.png" alt="Shahzaib" style="width:100%;height: 250px;">
                <span class="name">Zain</span>
                <p class="title mt-2">Marketing Manager</p>
                <p class="mt-2">XYZ University</p>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://ru.opensuse.org/images/0/0b/Icon-user.png" alt="zain" style="width:100%;height:250px;">
                <span class="name">Mustafa</span>
                <p class="title mt-2">Tour Consultant</p>
                <p class="mt-2">XYZ University</p>
            </div>
        </div>

        {{-- <div class="col-md-3">
            <div class="card">
                <img src="https://ru.opensuse.org/images/0/0b/Icon-user.png" alt="Mustafa" style="width:100%;height: 250px;">
                <span class="name">Sahil</span>
                <p class="title mt-2">Ticketing Officer</p>
                <p class="mt-2">XYZ University</p>
            </div>
        </div> --}}

    </div>
</div>

@endsection