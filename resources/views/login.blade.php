
<!DOCTYPE html>
<html>
<head>
@include('common.head')
</head>
<body class="form-v8">
<div class="page-content">
<div class="form-v8-content">

	<div class="form-left">	
	<img src="images/form-v8.jpg" alt="form">
	</div>
	<div class="form-right">


	@if(session('message'))
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{ session('message') }}
	</div>
	@endif



	@if(session('failed'))
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{ session('failed') }}
	</div>
	@endif

	<div class="tab">
		<div class="tab-inner">
		<button class="tablinks" onclick="openCity(event, 'sign-in')" id="defaultOpen">Sign In</button>
		</div>
	</div>

	<form class="form-detail" action="{{url('post-login')}}" method="post">
	{{ csrf_field() }}
		<div class="tabcontent" id="sign-in">
			<div class="form-row">
			<label class="form-row-inner">
			<input type="text" name="email" class="input-text" required>
			<span class="label">E-Mail</span>
			<span class="border"></span>
				@if ($errors->has('email'))
				<span class="error">{{ $errors->first('email') }}</span>
				@endif 
			</label>
			</div>
			<div class="form-row">
			<label class="form-row-inner">
			<input type="password" name="password" class="input-text" required>
			<span class="label">Password</span>
			<span class="border"></span>
				@if ($errors->has('password'))
				<span class="error">{{ $errors->first('password') }}</span>
				@endif
			</label>
			</div>
			
			<div class="form-row-last">
			<input type="submit" class="register" value="Sign In">
			</div>
			<a class="small" href="{{ route('forgetpassword') }}" style="color:white;">Forgot Password?</a>
		</div>
	</form>
	
</div>
</div>
</div>
@include('common.footer')
</body>
</html>


<style>
.form-v8-content {
    background: #3d5983;
}
</style>