
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Login</h3>
			<div class="login-form">
                <form action="{{ route('login') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="username" class="placeholder"><b>Username</b></label>
					<input id="username" name="username" type="text" value="{{ old('username') }}" class="form-control" autofocus>
					@error('username')
						<div class="is-invalid">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="password" class="placeholder"><b>Password</b></label>
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control">
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					@error('password')
						<div class="is-invalid">{{ $message }}</div>
					@enderror
				</div>
				
				<div class="form-group form-action-d-flex mb-3">
					<!-- <a href="#" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold">Sign In</a> -->
                    <button type="submit" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
				</div>
                {{-- <div class="form-action">
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
				</div> --}}
			</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/ready.js') }}"></script>
</body>
</html>