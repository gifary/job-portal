<!DOCTYPE HTML>
<html>
<head>
<title>Seeking a Job at Sas Hospitality</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="eeking a Job at Sas Hospitality, Grand tjokro bandung, Grand tjokro" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
{{-- <link href="{{asset('css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' /> --}}

<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
{{-- <link rel="stylesheet" href="{{ asset('/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/jquery.steps.css')}} ">
<link rel="stylesheet" href="{{ asset('/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/datepicker3.css')}} "> --}}

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/colors/white.css') }}" id="colors">
<link rel="stylesheet" href="{{ asset('/css/sweetalert.css')}} ">
<style>

</style>
</head>
<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="transparent sticky-header full-width">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="{{ route('home') }}"><img src="{{ asset('images/logo_sas_hospitality.jpg') }}" alt="Job" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li>
                    <a href="{{ route('home') }}">Home</a>
				</li>
				
				<li><a href="#">For Candidates</a>
					<ul>
						<li><a href="{{ route('listjob') }}">Browse Jobs</a></li>
						{{-- <li><a href="browse-categories.html">Browse Categories</a></li>
						<li><a href="add-resume.html">Add Resume</a></li>
						<li><a href="manage-resumes.html">Manage Resumes</a></li>
						<li><a href="job-alerts.html">Job Alerts</a></li> --}}
					</ul>
				</li>
				<li> <a href="{{ route('contact') }}">Contact</a>
				</li>
				<li> <a href="{{ route('faq') }}">FAQ</a>
				</li>
				<li><a href="{{ route('fraud') }}">Fraud Information</a></li>
			</ul>
			<ul class="float-right">
				@if(Config::get('app.locale')=="en")
					<li><a href="#">English</a>
						<ul>
							<li><a href="{{route('lang','id')}}"><i class="fa fa-flag"></i> Indonesia</a></li>
						</ul>
					</li>
				@else
					<li><a href="#">Indonesia</a>
						<ul>
							<li><a href="{{route('lang','en')}}"><i class="fa fa-flag"></i> English</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>
