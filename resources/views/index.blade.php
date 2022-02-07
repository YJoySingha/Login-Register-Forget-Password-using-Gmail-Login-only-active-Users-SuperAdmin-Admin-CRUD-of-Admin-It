
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



	@if (session('status'))
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{ session('status') }}
	</div>
	@elseif(session('failed'))
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{{ session('failed') }}
	</div>
	@endif

	<div class="tab">
		<div class="tab-inner">
		<button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Sign Up</button>
		</div>
	</div>

	<form class="form-detail" action="{{url('post-register')}}" method="post">
	{{ csrf_field() }}
		<div class="tabcontent" id="sign-up">
			<div class="form-row">
			<label class="form-row-inner">
			<input type="text" name="name" class="input-text" required>
			<span class="label">Username</span>
			<span class="border"></span>
			@if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
			</label>
			</div>
			<div class="form-row">
			<label class="form-row-inner">
			<input type="text" name="phone" class="input-text" required>
			<span class="label">Phone Number</span>
			<span class="border"></span>
				@if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
			</label>
			</div>
			<div class="form-row">
			<label class="form-row-inner">
			<input type="text" name="email" class="input-text" required>
			<span class="label">E-Mail</span>
			<span class="border"></span>
				@if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
			</label>
			</div>
			<div class="form-row">
			<label class="form-row-inner">
			<input type="password" name="password"  class="input-text" required>
			<span class="label">Password</span>
			<span class="border"></span>
				@if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
			</label>
			</div>
			<div class="form-row-last">
			<input type="submit" class="register" value="Sign Up">
			</div>
			<a class="small" href="/login" style="color:white;">Already have an account?</a>
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