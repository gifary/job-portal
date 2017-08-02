@include('headers2')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html">{{ $loker->departemen->nama }}</a></span>
			<h2>{{ $loker->jabatan->nama }} 
				{{-- @if($loker->status_pekerjaan->nama=="Casual")
					<span class="full-time">{{ $loker->status_pekerjaan->nama }}</span></h4>
				@elseif($loker->status_pekerjaan->nama=="Kontrak")
					<span class="part-time">{{ $loker->status_pekerjaan->nama }}</span></h4>
				@elseif($loker->status_pekerjaan->nama=="Daily Worker")
					<span class="temporary">{{ $loker->status_pekerjaan->nama }}</span></h4>
				@else
					<span class="internship">{{ $loker->status_pekerjaan->nama }}</span></h4>
				@endif --}}
			</h2>
		</div>

		{{-- <div class="six columns">
			<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Job</a>
		</div> --}}

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
			<img src="{{Config::get('server.image_url')}}{{ $loker->lokasi->logo }}" alt="logo">
			<div class="content">
				<h4>{{ $loker->jabatan->nama }}</h4>
				{{-- <span><a href="#"><i class="fa fa-link"></i> Website</a></span>
				<span><a href="#"><i class="fa fa-twitter"></i> @kingrestaurants</a></span> --}}
			</div>
			<div class="clearfix"></div>
		</div>

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
			<h4>Overview</h4>

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
						<i class="fa fa-user"></i>
						<div>
							<strong>{{trans('common.position')}}</strong>
							<span>{{ $loker->jabatan->nama }}</span>
						</div>
					</li>
				</ul>
				<a href="{{route('applyjob',[$id,$m_lokasi_id])}} " class="button">{{trans('common.apply_job')}}</a>
			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>
@include('footer')

<script>
    
    var geocoder;
    var map;
    var address = "{{$loker->lokasi->nama}}";

function initMap() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var myOptions = {
    zoom: 18,
    center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
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