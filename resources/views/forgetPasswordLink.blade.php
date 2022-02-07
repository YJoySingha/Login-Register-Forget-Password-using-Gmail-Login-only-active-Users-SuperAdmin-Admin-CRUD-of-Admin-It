 
<!DOCTYPE html>
<html>
<head>
@include('common.head')
</head>
<body class="form-v8">
<div class="page-content">
<div class="form-v8-content">

	<div class="form-left">	
	<img src="{{ asset('images/form-v8.jpg') }}" alt="form">
	</div>
	<div class="form-right">


	<div class="tab">
		<div class="tab-inner">
		<button class="tablinks" onclick="openCity(event, 'sign-in')" id="defaultOpen">Reset Password</button>
		</div>
	</div>

	<form class="form-detail" action="{{ route('resetpasswordpost',$token) }}" method="post">
	{{ csrf_field() }}
		<div class="tabcontent" id="sign-in">
			<div class="form-row">
			<label class="form-row-inner">
			<input type="text" name="email" class="input-text" required>
			<span class="label">E-Mail</span>
			<span class="border"></span>
			</label>
                @if ($errors->has('email'))
				<span class="error">{{ $errors->first('email') }}</span>
				@endif 
			</div>

            <div class="form-row">
			<label class="form-row-inner">
			<input type="password" name="password" class="input-text" required>
			<span class="label">Password</span>
			<span class="border"></span>
			</label>
                @if ($errors->has('password'))
				<span class="error">{{ $errors->first('password') }}</span>
				@endif 
			</div>

            <div class="form-row">
			<label class="form-row-inner">
			<input type="password" name="password_confirmation" class="input-text" required>
			<span class="label">Confirm Password</span>
			<span class="border"></span>
			</label>
                @if ($errors->has('password_confirmation'))
				<span class="error">{{ $errors->first('password_confirmation') }}</span>
				@endif 
			</div>
			
			<div class="form-row-last">
			<input type="submit" class="register" value="Submit">
			</div>
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