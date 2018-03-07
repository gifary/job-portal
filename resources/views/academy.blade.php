@include('headers2')
<!-- Titlebar
================================================== -->
<div id="titlebar" style="background-image: url('../images/banner-home-02.jpg');height: 150px;">
	<div class="container">
		<div class="ten columns">
			<img src="{{url('images/sas-academy-logo.png')}}" alt="logo" style="height: 100px;margin-bottom: 10px;">
			{{-- <span><a href="browse-jobs.html"><div style="background:#343836cc; padding:5px; color:white;">{{ $loker->departemen->nama }}</div></a></span> --}}
			<div class="content" style="background:#343836cc; padding:5px; color:white;">
				<h2 style="color:white;">SAS Hotel Academy</h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="sixteen columns">
		<div class="padding-right">
			<h1><b>SAS Hotel Academy</b></h1>
			<img src="{{url('images/banner-sas-academy1.png')}}">
			{!! trans("apply.academy_text") !!}
			<a href="{{route('apply-academy')}} " class="button" style="width: 100%; text-align: center;">{!! trans("apply.apply_academy") !!}</a>
		</div>
	</div>
</div>
@extends('footer')
@section('additional-script')

@endsection