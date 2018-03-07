@include('headers2')
<!-- Titlebar
================================================== -->
<div id="titlebar" style="background-image: url('../images/banner-home-02.jpg');height: 150px;">
	<div class="container">
		<div class="ten columns">
			<img src="{{url('images/sas-academy-logo.png')}}" alt="logo" style="height: 75px;margin-bottom: 10px;">
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
			<p  style="font-weight: bold; text-align: justify;">
				<b>Anda ingin dapat bekerja di dunia perhotelan? </b>
			</p>
	  		<p  style="font-weight: bold; text-align: justify;">
				<b>Mari bergabung bersama kami di SAS Hotel Academy! Hanya bermodalkan kemauan belajar, komitmen, dan integritas. Teman-teman tidak perlu mengeluarkan sepeserpun. GRATIS!! </b>
			</p>
			<p style="text-align: justify;">
				SAS Hotel Academy memberikan kesempatan bagi kamu untuk menjembatani pendidikan kamu dengan dunia profesional atau karir. Siapapun kamu dan level pendidikan kamu dapat kami terima untuk bergabung bersama akademi. 
			</p>
			<p style="text-align: justify;">
				Belajar dari para profesional terbaik akan membantu kamu untuk siap bekerja di dunia pariwisata khususnya perhotelan. Pelatihan dalam kelas dan praktek secara langsung di hotel-hotel berbintang kami yang prestisius membuka peluang kamu agar siap bekerja. 
			</p>
			<p style="text-align: justify;">
				Lulusan kami sudah banyak yang mampu bekerja di perhotelan dengan keterampilan memadai yang telah diajarkan selama proses pembelajaran berlangsung. Selama 3 bulan kamu akan praktek lapangan atau On The Job Training (OJT) dengan manfaat makan di kantin satu kali sehari. Setelah kamu lolos fase OJT, selanjutnya kamu masuk proses Magang atau Internship selama 9 bulan dengan diberikan uang saku sebesar Rp 1.500.000 (satu juta lima ratus ribu rupiah).
			</p>
			<a href="{{route('apply-academy')}} " class="button" style="width: 100%; text-align: center;">DAFTAR</a>
		</div>
	</div>
</div>
@extends('footer')
@section('additional-script')

@endsection