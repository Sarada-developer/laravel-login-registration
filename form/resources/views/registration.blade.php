@extends('master')
@section('container')
<div class="main-w3layouts wrapper">
		<h1>Registration Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{route('insertUser')}}" method="post" >
					@csrf
				    <input class="text email" type="text" name="name" placeholder="Name" required="">
					<input class="text email" type="text" name="surname" placeholder="Surname" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text email" type="text" name="phone" placeholder="Phone Number" required="">
					<select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="state" name="state" required="">
					<option value="">---Select State---</option>
					@foreach($state as $list)
					<option value="{{$list->id}}">{{$list->state}}</option>
					@endforeach
					</select>
					<select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="city" name="city" required="">
					<option value="">---Select City---</option>
					<option value=""></option>
					</select>
					<!-- {{csrf_field()}} -->
                    <input class="text email" type="text" name="address" placeholder="Address" required="">
					<input class="text email" type="text" name="pin" placeholder="Pin" required="">
                    <input class="text email" type="password" name="password" placeholder="password" required="">
					<input class="text email" type="password" name="con_password" placeholder="Confirm Password" required="">
					<input type="submit" value="SIGNUP">
				</form>
				<p>Already have an Account? <a href="{{route('login')}}"> Login Now!</a></p>
			</div>
		</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function(){
      jQuery('#state').change(function(){
		  let sid = jQuery(this).val();
		  jQuery.ajax({
				url:'/getCity',
				type:'post',
				data:'sid='+sid+'&_token={{csrf_token()}}',
				success:function(result){
					jQuery('#city').html(result)
				}
			});
      });
    });
  </script>
@endsection