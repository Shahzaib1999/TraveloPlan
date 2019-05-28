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

	input[type='password'],input[type='email']{
		/* border: 1px solid */
		background-color: #EFEFEF;
		padding: 20px;
		font-size: 15px;
	}


</style>
<div class="container mt-5">
	<div class="row mt-5">

		<div class="col-lg-3 col-md-2 col-sm-0"></div>
		<div class="col-lg-6 col-md-8 col-sm-12">
			<div class="card" id="card-signIn">
				<div class="card-header text-center" id="card-header-signIn">
					<p id="card-heading">Login Your Account</p>
				</div>
				<div class="card-body mt-2" style="border:1px solid #dfdfdf; padding: 30px">
					<h3 class="font-weight-bold mt-2">ll</h3>
					{{-- <p class="mt-3">If you have an account with us, please log in.</p> --}}
					<form class="mt-4" method="POST" action="{{ route('login') }}" id="color">
						{{ csrf_field() }}
						<div  class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" Name="email" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group mt-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" Name="password" aria-describedby="emailHelp" placeholder="Enter password">
						</div>
						<button type="submit" class="btn mt-4" id="submit">Submit</button>
						<p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Sign Up!</a></p>
						{{-- <label>E-mail</label>
						<input class="form-control" id="email" type="email" Name="email" required>
						<label>Password</label>
						<input id="password" type="password" Name="password" required>
						<div class="send-button w3layouts agileits">
							<form>
								<input type="submit" value="SIGN IN">
							</form>
							<div class="clear"></div>       
						</div>
						<p class="change_link w3layouts agileits">
							Don't have an account? <a href="#toregister" class="to_register" onclick="signIn()">Sign Up!</a>
						</p>
						<div class="clear"></div> --}}
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-0"></div>

	</div>

    {{-- <h1 class="w3layouts agileits"></h1>

	<div id="main" class="container-fluid w3layouts agileits">

		<div class="content-left w3layouts agileits">
			<img src="{{URL::asset('/images/background.jpg')}}" id="timg" style="width: 100%; height: 780px;" alt="W3layouts Agileits">
			<p>Plan your next dream trip. Select your destination and leave the rest to us.</p>
		</div>

		<div class="content-right w3layouts agileits">
			<section>
				<div id="container_demo">
					<a class="hiddenanchor w3layouts agileits" id="tologin"></a>
					<a class="hiddenanchor w3layouts agileits" id="toregister"></a>
					<div id="wrapper">
						<div id="login" class="animate w3layouts agileits form">
							<h2 class="w3layouts agileits">Sign In</h2>
							<form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
								<label>E-mail</label>
								<input id="email" type="email" Name="email" required>
								<label>Password</label>
								<input id="password" type="password" Name="password" required>
								<div class="send-button w3layouts agileits">
									<form>
										<input type="submit" value="SIGN IN">
									</form>
									<div class="clear"></div>       
								</div>
								<p class="change_link w3layouts agileits">
									Don't have an account? <a href="#toregister" class="to_register" onclick="signIn()">Sign Up!</a>
								</p>
								<div class="clear"></div>
							</form>
							<div class="clear"></div>
						</div>
						<div id="register" class="animate w3layouts agileits form">
							<h2>Sign up</h2>
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
									<label>Name</label><br />
									<input id="name" type="text" class="name w3layouts agileits" Name="name" required><br />
									<label>E-mail</label><br />
                                    <input class="{{ $errors->has('email') ? ' has-error' : '' }}" type="email" id="email" Name="email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <br /><span style="color: #fff">{{ $errors->first('email') }}</span><br />
                                        </span>
                                    @endif
									<label>Password</label>
                                    <input class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" id="password" Name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <br /><span style="color: #fff">{{ $errors->first('password') }}</span><br />
                                        </span>
                                    @endif
                                    <label>Confirm Password</label>
									<input type="password" id="password-confirm" Name="password_confirmation" required>
									<label>Phone Number</label>
									<input type="text" class="phone w3layouts agileits" id="contact" Name="contact" required>
									<div class="form-group">
										<label for="role">Role</label>
										<select class="form-control" id="role" required name="role" onchange="onChange()">
											<option value="">Select</option>
											<option value="Agency">Travel Agency</option>
											<option value="Users">User</option>
										</select>
									</div>
									<div style="margin-top: 20px; visibility: hidden;" id="agency">
										<label>Agency Address</label>
										<input type="text" class="name w3layouts agileits" Name="agency_address" required>
									</div>
									<div class="send-button w3layouts agileits">
											<input type="submit" value="SIGN UP">
									</div>
								</form>
								<p class="change_link w3layouts agileits">
									Already a member? <a href="#tologin" class="to_register" onclick="signUp()">Sign In</a>
								</p>
								<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
		</div>
		<div class="clear"></div>

	</div> --}}
</div>
<script>
	
        function onChange(){
            document.getElementById('role').value === "Agency" ? 
            document.getElementById('agency').style.visibility = "visible" : document.getElementById('agency').style.visibility = "hidden";
        }
    
        function signIn(){
            document.getElementById('timg').style.height = "780px";
            document.getElementById('main').style.marginTop = "30px";
        }
        
        // document.getElementById('timg').style.height = document.getElementById('main').style.height;
        
        
        function signUp(){
            document.getElementById('timg').style.height = "460px";
            document.getElementById('main').style.marginTop = "200px"
        }
    
        </script>
@endsection
