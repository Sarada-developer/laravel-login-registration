@extends('master')
@section('container')
	<!-- main -->

<div class="main-w3layouts wrapper">
	<center>{{session('error')}}</center>
		<h1>Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{route('auth')}}" method="post">
					@csrf
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="/register"> Register Now!</a></p>
			</div>
		</div>
        </div>
	<!-- //main -->
@endsection