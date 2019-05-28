@extends('layouts.app')

@section('content')



<form action="/userEvent" method="post" >
    {{ csrf_field() }}

user id<br>
<input type="text" name="userId" value="{{Auth::user()->id}}"  ><br>
user_name<br>
    <input type="text" name="userName" value="{{Auth::user()->name}}" ><br>
    email<br>
    <input type="text" name="email" value="{{Auth::user()->email}}" ><br>
    contact_number<br>
    <input type="text" name="contactNumber" value="{{Auth::user()->contact}}" ><br>
    cnic<br>
    <input type="text" name="cnic" ><br>
    number_of_packages<br>
    <input type="number" name="numberOfPackages" id="numberOfPackages" ><br>
    price<br>
    <input type="text"  id="totalPrice" value="{{$data->price}} "><br>
    total_price
   <input type="number" name="totalPrice" id="tt"><br>
    <input type="submit" >
</form>


{{-- <script>

var nop = document.getElementById('numberOfPackages').value;
var tp = document.getElementById('totalPrice').value;

function add(){
    var t = nop * tp;
    console.log(nop);
    console.log(tp);
    console.log(t);
    
    document.getElementById('tt').value = t
}

</script> --}}
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js" ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#numberOfPackages").keyup(function(){
            var nop = $("#numberOfPackages").val();
            var tp = parseInt($("#totalPrice").val(), 10);
            var t = nop * tp;
            $('#tt').val(t);

        });
    })
</script>

@endsection
