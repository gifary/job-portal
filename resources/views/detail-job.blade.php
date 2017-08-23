@include('headers2')
<!-- Titlebar
================================================== -->
<div id="titlebar" style="background-image: url('../images/banner-home-02.jpg');height: 150px;">
	<div class="container">
		<div class="ten columns">
			<img src="{{Config::get('server.image_url')}}{{ $loker->lokasi->logo }}" alt="logo">
			<span><a href="browse-jobs.html"><div style="background:#343836cc; padding:5px; color:white;">{{ $loker->departemen->nama }}</div></a></span>
			<div class="content" style="background:#343836cc; padding:5px; color:white;">
				<h2 style="color:white;">{{ $loker->jabatan->nama }}</h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		{{-- <div class="company-info">
			<img src="{{Config::get('server.image_url')}}{{ $loker->lokasi->logo }}" alt="logo">
			<div class="content">
				<h4>{{ $loker->jabatan->nama }}</h4>
			</div>
			<div class="clearfix"></div>
		</div> --}}

		<p class="margin-reset">
			@if(App::isLocale('id'))
				{{ $loker->deskripsi_indonesia }}
			@else
				{{ $loker->deskripsi_english }}
			@endif
		</p>

		<br>
		<p><strong>{{trans('common.job_desc')}} {{ $loker->jabatan->nama }}</strong>:</p>
		@if(App::isLocale('id'))
				{!! $loker->jabatan->job_deskripsi_indonesia !!}
		@else
			{!! $loker->jabatan->job_deskripsi_english !!}
		@endif
    
		
		<br>

		<h4 class="margin-bottom-10">{{trans('common.requirement')}}</h4>
		@if(App::isLocale('id'))
			{!! $loker->keterangan_indonesia !!}
		@else
			{!! $loker->keterangan_english !!}
		@endif
	  
	</div>
	</div>

	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>{{trans('common.about')}}</h4>
			<div class="job-overview">
				
				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>{{trans('common.location')}}</strong>
							<span>{{ $loker->lokasi->nama }}</span>
						</div>
					</li>
					<li>
						<div style="top:20px; margin-left:0px;">
							<div id="googlemaps" class="google-map google-map-full"></div>
						</div>
					</li>
				</ul>
				<a href="{{route('applyjob',[$id,$m_lokasi_id])}} " class="button">{{trans('common.apply_job')}}</a>
			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>
@extends('footer')
@section('additional-script')
    <!-- Google Maps -->
<script>
    
    var geocoder;
    var map;
   	var address = "{{$loker->lokasi->nama}}";

	function initMap() {
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		var myOptions = {
			zoom: 15,
			center: latlng,
			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			navigationControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("googlemaps"), myOptions);
		if (geocoder) {
			geocoder.geocode({
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
						map.setCenter(results[0].geometry.location);

						var infowindow = new google.maps.InfoWindow({
							content: '<b>' + address + '</b>',
							size: new google.maps.Size(150, 50)
						});

						var marker = new google.maps.Marker({
							position: results[0].geometry.location,
							map: map,
							title: address
						});
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map, marker);
						});

					} else {
						console.log("No results found");
					}
				} else {
					console.log("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
	google.maps.event.trigger(map, 'resize');
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAamC8mmFuHPiEX_R6xxOfdTC-ChuVOiew&callback=initMap"
		type="text/javascript"></script>
@endsection