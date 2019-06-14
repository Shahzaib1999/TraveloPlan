@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header text-center text-white" id="bg-green" style="font-size:30px;font-weight:600">
                    User Details
                </div>
        
                <div class="card-body">

                    <form action="/userEvent" method="post" >
                    {{ csrf_field() }}

                        <div class="form-group mt-4" hidden>
                            <label for="title">Name</label>
                            <input class="form-control" type="text" name="userName" value="{{Auth::user()->name}}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="title">Email</label>
                            <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="title">Phone number</label>
                            <input class="form-control" type="text" name="contactNumber" value="{{Auth::user()->contact}}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="title">No. of persons</label>
                            <input class="form-control" type="number" name="numberOfPackages" id="numberOfPackages" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="title">Price</label>
                            <input class="form-control" type="text" id="totalPrice" value="{{$data->price}}" disabled>
                        </div>

                        <div class="form-group mt-4">
                            <label for="title">Total Price</label>
                            <input class="form-control" type="number" id="tt" disabled>
                            <input class="form-control" type="number" name="totalPrice" id="t" hidden>
                        </div>

                        <button type="submit" class="btn btn-green mt-5" >Add Event</button>

                    </form>

                </div><!-- /.card-body -->

            </div><!-- /.card -->

        </div>

    </div><!-- /.row -->

</div>

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
            $('#t').val(t);
            $('#tt').val(t);

        });
    })
</script>

@endsection
