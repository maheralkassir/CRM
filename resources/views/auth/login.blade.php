<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link rel="stylesheet" href="{{asset('templatefiles/assets/styles/style.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/waves/waves.min.css')}}">

</head>

<body>

<div id="single-wrapper">
  <form class="frm-single" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
		<div class="inside">
			<div class="title"> إدارة<strong>  الموارد البشرية  </strong> </div>
			<!-- /.title -->
			<div class="frm-title">تسجيل الدخول</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" name="name" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
			<!-- /.frm-input -->

			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">تسجيل الدخول<i class="fa fa-arrow-circle-right"></i></button>

			<!-- /.row -->
			<div class="frm-footer"  style="text-align:center">Waaptech ©</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div>

	<script src="{{asset('templatefiles/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/waves/waves.min.js')}}"></script>

	<script src="{{asset('templatefiles/assets/scripts/main.min.js')}}"></script>
</body>
</html>
