<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>إدارة الموارد البشرية</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/styles/style.min.css')}}">

	<!-- RTL -->

	<link rel="stylesheet" href="{{asset('templatefiles/assets/styles/style-rtl.min.css')}}">


	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/sweet-alert/sweetalert.css')}}">

	<!-- Percent Circle -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/percircle/css/percircle.css')}}">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/chart/chartist/chartist.min.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>

	<!-- Color Picker -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/color-switcher/color-switcher.min.css')}}">



	<!-- Data Tables -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">

	<!-- Remodal -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/modal/remodal/remodal.css')}}">
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/modal/remodal/remodal-default-theme.css')}}">

	<!-- Lightview -->
	<link rel="stylesheet" href="{{asset('templatefiles/assets/plugin/lightview/css/lightview/lightview.css')}}">


</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">إدارة المواد البشرية</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<h5 class="name"><a href="profile.html">{{Auth::user()->name}}</a></h5>
			<h5 class="position">المدير</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="/hr/settings"><i class="fa fa-gear"></i> الإعدادات</a></div>
					<div class="control-item"><a href="#"	onclick="event.preventDefault();
										 document.getElementById('logout-form1').submit();"><i class="fa fa-sign-out"></i> تسجيل الخروج</a>
						<form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
						</form>
					</div>


				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="{{$a[0]}}">
					<a class="waves-effect" href="/hr/persons"><i class="menu-icon fa fa-id-card"></i><span>المعلومات الشخصية</span></a>
				</li>
				<li class="{{$a[1]}}">
					<a class="waves-effect" href="/hr/applicants"><i class="menu-icon fa fa-envelope"></i><span>طلبات التوظيف</span></a>
				</li>
				<li class="{{$a[2]}}">
					<a class="waves-effect" href="/hr/trainers"><i class="menu-icon fa fa-line-chart"></i><span>المتدربين</span></a>
				</li>
				<li class="{{$a[3]}}">
					<a class="waves-effect" href="/hr/testers"><i class="menu-icon fa fa-eye"></i><span>موظفين قيد الاختبار</span></a>
				</li>
				<li class="{{$a[4]}}">
					<a class="waves-effect" href="/hr/employees"><i class="menu-icon fa fa-users"></i><span>الموظفين</span></a>
				</li>
			</ul>

		</div>
	</div>
</div>

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title"></h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
		<a href="{{ route('logout') }}"></a>
		<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();"  class="ico-item fa fa-power-off">
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
		</form>
	</div>
</div>


<div id="wrapper">

	<div class="main-content">

		<div class="row small-spacing">
			@yield('content')
		</div>

	</div>

</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('templatefiles/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/waves/waves.min.js')}}"></script>
	<!-- Full Screen Plugin -->
	<script src="{{asset('templatefiles/assets/plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>

	<!-- Percent Circle -->
	<script src="{{asset('templatefiles/assets/plugin/percircle/js/percircle.js')}}"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="{{asset('templatefiles/assets/plugin/chart/chartist/chartist.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/chart.chartist.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{asset('templatefiles/assets/plugin/moment/moment.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/fullcalendar.init.js')}}"></script>

	<script src="{{asset('templatefiles/assets/scripts/main.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/color-switcher/color-switcher.min.js')}}"></script>




	<!-- Data Tables -->
	<script src="{{asset('templatefiles/assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/datatables.demo.min.js')}}"></script>


	<script src="{{asset('templatefiles/assets/plugin/modal/remodal/remodal.min.js')}}"></script>


	<!-- Isotope -->
	<script src="{{asset('templatefiles/assets/scripts/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('templatefiles/assets/scripts/cells-by-row.min.js')}}"></script>

	<!-- Lightview -->
	<script src="{{asset('templatefiles/assets/plugin/lightview/js/lightview/lightview.js')}}"></script>


</body>
</html>
