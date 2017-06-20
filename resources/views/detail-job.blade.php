@include('header')
<div class="container">
   <div class="single">  
        <div class="col-md-9 single_right">
            <h1 class="title">{{$loker->jabatan->nama. " (".$loker->kode.")"}}</h1>
            <span class="meta">{{$loker->lokasi->nama}} / Status Pekerjaan ( {{$loker->status_pekerjaan->nama}} )</span>
        </div>
	    <div class="col-md-9 single_right">
        <p></p>
	       <p>{{ $loker->deskripsi }}</p>
	       <p><b>Requirements</b></p>
           <p>{!! $loker->keterangan !!}</p>
	       <dl class="experience">
	       	    <div class="experience_content experience_content1">
                    <div class="experience_1"><dt><h6>Job Description</h6></dt>
                        <dd>
                            {!! $loker->jabatan->job_deskripsi !!}
                        </dd>
                    </div>
	       	    </div>
	       </dl>
        </div>
       <div class="col-md-3">
	   	  <div class="map_1" id="map_canvas">
	         
          </div>
          <br>
            <table class="condidate_detail">
                <h4>Job Details</h4>
                <tbody>
                    <tr>
                        <td>Tanggal Penutupan</td>
                        <td>{{ date('d M Y', strtotime($loker->tgl_akhir)) }}</td>
                    </tr>

                    <tr>
                        <td>Departement</td>
                        <td>{{ $loker->departemen->nama }}</td>
                    </tr>

                    <tr>
                        <td>Jabatan</td>
                        <td>{{ $loker->jabatan->nama }}</td>
                    </tr>

                    <tr>
                        <td>Lokasi</td>
                        <td>{{ $loker->lokasi->nama }}</td>
                    </tr>

                    <tr>
                        <td>Status Pekerjaan</td>
                        <td>{{ $loker->status_pekerjaan->nama }}</td>
                    </tr>
                </tbody>
		    </table>
            <br>
            <div class="condidate_detail">
                <a href="{{ route('applyjob',$id) }}" class="btn btn-primary btn-block" role="button">Apply</a>
            </div>
       </div>
       <div class="clearfix"> </div>
    </div>
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