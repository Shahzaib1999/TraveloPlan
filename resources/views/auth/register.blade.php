@extends('layouts.app')

@section('content')
<style>

        #card-signIn{
            border: 0px #fff;
            border-color: #fff
        }
    
        #card-heading{
            font-weight: bold;
            font-size: 30px;
            margin: 0 auto;
            color: #232323;
            background: transparent;
            border-color: 
        }
    
        #card-header-signIn{
            background: #fff;
            border-color: #fff
        }
    
        #color{
            color: #6F6F6F;
            font-size: 15px;
            font-weight: 600
        }
    
        #submit{
            background: #21ab64;
            color: #fff
        }
    
        input[type='password'],input[type='email'],input[type='text'],input[type='number']{
            background-color: #EFEFEF;
            padding: 20px;
            color: #6F6F6F;
            font-size: 15px;
        }

        #address{
            background-color: #EFEFEF;
            color: #6F6F6F;
            font-size: 15px;
        }

        #role{
            background-color: #EFEFEF;
            font-size: 15px;
            color: #6F6F6F
        }

        #role option{
            background: #EFEFEF
        }

        .help-block{
            color: red;
        }
    
    
    </style>
<div class="container" style="background: ">
        <div class="row mt-5">

                <div class="col-lg-6 col-md-6 col-sm-12">

                        <div class="card" id="card-signIn">
                                
                                <div class="card-body mt-2" style="border:1px solid #dfdfdf; padding: 30px">
                
                                    <h3 class="font-weight-bold mt-2">SIGN UP</h3>
                
                                    <form class="mt-4" method="POST" action="{{ route('register') }}" id="color">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="control-label">Name</label>
                
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name" required autofocus>
                
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group  mt-3{{ $errors->has('email') ? ' has-error' : '' }} ">
                                            <label for="email" class="control-label">E-Mail Address</label>
                
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required>
                
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                
                                        <div class="form-group  mt-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="control-label">Password</label>
                
                                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                
                                        <div class="form-group mt-3">
                                            <label for="password-confirm" class="control-label">Confirm Password</label>
                
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required>
                                        </div>
                
                
                                        
                                        <div class="form-group  mt-3">
                                            
                                            <label for="role" class="control-label">Role</label>
                
                                            <select name="role" class="form-control" id="role" onchange="onChange()" required>
                                                <option value="">Select</option>
                                                <option value="Users">User</option>
                                                <option value="Agency">Travel Agency</option>
                                            </select>

                                        </div>
                
                
                                        <div class="form-group  mt-3{{ $errors->has('contact') ? ' has-error' : '' }}">
                                            <label for="contact" class="control-label">Contact Number</label>
                
                                                <input type="number" id="contact" name="contact" class="form-control" placeholder="03xx-xxxxxxx" required>
                                                @if ($errors->has('contact'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                
                
                                        <div class="form-group  mt-3" style="visibility: hidden;" id="agency">
                                            <label for="agency_address" class="control-label">Address</label>
                
                                                
                                                <textarea id="address" name="agency_address" class="form-control" rows="3" ></textarea>
                                                
                                        </div>
                                        {{-- <div class="form-group mt-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" Name="password" placeholder="Password" required>
                                        </div> --}}
                                        <button type="submit" class="btn mt-4" id="submit">Register</button>
                                    </form>
                
                                </div><!-- /.card-body -->
                
                            </div><!-- /.card -->
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
			
                        <div class="card" id="card-signIn">
                            
                            <div class="card-body mt-2" style="border:1px solid #dfdfdf; padding: 30px">
            
                                <h3 class="font-weight-bold mt-2">LOGIN</h3>
            
                                <form class="mt-4" method="POST" action="{{ route('login') }}" id="color">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" Name="email" placeholder="Enter email" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" Name="password" placeholder="Enter password" required>
                                    </div>
                                    <button type="submit" class="btn mt-5" id="submit">Log In</button>
                                </form>
            
                            </div><!-- /.card-body -->
            
                        </div><!-- /.card -->
            
                    </div><!-- /.col-lg-6 col-md-8 col-sm-12 -->
        
            </div>
    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                <option>Select</option>
                                <option>Admin</option>
                                <option>Users</option>
                                <option>Agency</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6">
                                <input type="text" id="contact" name="contact" class="form-control" required>
                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="agency_address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                
                                <textarea name="agency_address" class="form-control" rows="3" required="required"></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<script>
	
    function onChange(){
        if(document.getElementById('role').value === "Agency"){
            document.getElementById('agency').style.visibility = "visible";
            document.getElementById('address').required = true
        } else{
            document.getElementById('agency').style.visibility = "hidden";
            document.getElementById('address').required = false
        }
    }

</script>
@endsection
