@include('headers2')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Contact</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('home')}}">Home</a></li>
					<li>Contact</li>
				</ul>
			</nav>
		</div>

	</div>
</div>

<!-- Content
================================================== -->
<!-- Container -->
<div class="container">
	<div class="sixteen columns">

		<h3 class="margin-bottom-20">Our Office</h3>

		<!-- Google Maps -->
		<section class="google-map-container">
			<div id="googlemaps" class="google-map google-map-full"></div>
		</section>
		<!-- Google Maps / End -->

	</div>
</div>
<!-- Container / End -->
			

<!-- Container -->
<div class="container">

<div class="eleven columns">

	<h3 class="margin-bottom-15">Contact Form</h3>
	
		<!-- Contact Form -->
		<section id="contact" class="padding-right">

			<!-- Success Message -->
			<mark id="message"></mark>

			<!-- Form -->
			<form method="post" name="contactform" id="contactform">

				<fieldset>

					<div>
						<label>Name:</label>
						<input name="name" type="text" id="name" style="padding: 8px 18px" />
					</div>

					<div>
						<label >Email: <span>*</span></label>
						<input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" style="padding: 8px 18px" />
					</div>

					<div>
						<label>Message: <span>*</span></label>
						<textarea name="comment" cols="40" rows="3" id="comment" spellcheck="true"></textarea>
					</div>

				</fieldset>
				<div id="result"></div>
				<input type="submit" class="submit" id="submit" value="Send Message" />
				<div class="clearfix"></div>
				<div class="margin-bottom-40"></div>
			</form>

		</section>
		<!-- Contact Form / End -->

</div>
<!-- Container / End -->


<!-- Sidebar
================================================== -->
<div class="five columns">

	<!-- Information -->
	<h3 class="margin-bottom-10">Information</h3>
	<div class="widget-box">
		<p>Morbi eros bibendum lorem ipsum dolor pellentesque pellentesque bibendum. </p>

		<ul class="contact-informations">
			<li>45 Park Avenue, Apt. 303</li>
			<li>New York, NY 10016 </li>
		</ul>

		<ul class="contact-informations second">
			<li><i class="fa fa-phone"></i> <p>+48 880 440 110</p></li>
			<li><i class="fa fa-envelope"></i> <p>mail@example.com</p></li>
			<li><i class="fa fa-globe"></i> <p>www.sas-hospitality.com</p></li>
		</ul>

	</div>
	
	<!-- Social -->
	<div class="widget margin-top-30">
		<h3 class="margin-bottom-5">Social Media</h3>
		<ul class="social-icons">
			<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
			<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
			<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
			<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		<div class="margin-bottom-50"></div>
	</div>

</div>
</div>
<!-- Container / End -->
@extends('footer')
@section('additional-script')
    <!-- Google Maps -->
    <script>
    
    var geocoder;
    var map;
    var address = "Grand Tjokro Bandung";

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