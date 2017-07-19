@include('header')
<!-- Banner
================================================== -->
<div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="search-container">

				<!-- Form -->
				<h2>Find job</h2>
				
				{!! Form::open(['route' => 'search', 'method' => 'post']) !!}
					<div class="six columns">
						<select class="chosen-select-no-single ico-02" name="posisi">
							<option value="0">All Position</option>
							@foreach($posisi as $p)
								<option value="{{$p->jabatan->m_jabatan_id}}">{{$p->jabatan->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="six columns">
						{!! Form::select('lokasi', $lokasi, null, ['class'=> 'chosen-select-no-single ico-02']) !!}
					</div>
					<button style="height:48px;"><i class="fa fa-search"></i></button>
					
				{!! Form::close() !!}
				<!-- Browse Jobs -->
				<div class="browse-jobs">
					Browse job offers by <a href="#"> Department</a> or <a href="#">location</a>
				</div>
				
				<!-- Announce -->
				<div class="announce">
					We’ve over <strong>15 000</strong> job offers for you!
				</div>

			</div>

		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Categories -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		<h3 class="margin-bottom-25">Recent Jobs</h3>
		<ul class="job-list">
		
			@if($loker!=null)
				@foreach($loker as $lok)
					<li><a href="{{ route('detailsjob',$lok->t_job_vacancy_id) }}">
						<img src="http://hrms.com/images/{{ $lok->lokasi->logo }}" alt="logo">
						<div class="job-list-content">
							<h4>{{ $lok->jabatan->nama }} 
							@if($lok->status_pekerjaan->nama=="Casual")
								<span class="full-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
							@elseif($lok->status_pekerjaan->nama=="Kontrak")
								<span class="part-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
							@elseif($lok->status_pekerjaan->nama=="Daily Worker")
								<span class="temporary">{{ $lok->status_pekerjaan->nama }}</span></h4>
							@else
								<span class="internship">{{ $lok->status_pekerjaan->nama }}</span></h4>
							@endif
							<div class="job-icons">
								<span><i class="fa fa-calendar"></i> {{$lok->tgl_akhir}}</span>
								<span><i class="fa fa-map-marker"></i> {{ $lok->lokasi->nama}}</span>
							</div>
						</div>
						</a>
						<div class="clearfix"></div>
					</li>
				@endforeach
			@else
			<h4 style="text-align:center">Sory, Job not available</h4>
			@endif
		</ul>
		@if($loker!=null)
			<a href="{{ route('listjob') }}" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
		@endif
		<div class="margin-bottom-55"></div>
	</div>
	</div>

	<!-- Job Spotlight -->
	<div class="five columns">
		<h3 class="margin-bottom-5">Job Spotlight</h3>

		<!-- Navigation -->
		<div class="showbiz-navigation">
			<div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clearfix"></div>
		
		<!-- Showbiz Container -->
		<div id="job-spotlight" class="showbiz-container">
			<div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
				<div class="overflowholder">
					<ul>
						@if($spotlight!=null)
							@foreach($spotlight as $lok)
								<li>
									<div class="job-spotlight">
										<a href="#"><h4>{{ $lok->jabatan->nama }}  
										@if($lok->status_pekerjaan->nama=="Casual")
											<span class="full-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
										@elseif($lok->status_pekerjaan->nama=="Kontrak")
											<span class="part-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
										@elseif($lok->status_pekerjaan->nama=="Daily Worker")
											<span class="temporary">{{ $lok->status_pekerjaan->nama }}</span></h4>
										@else
											<span class="internship">{{ $lok->status_pekerjaan->nama }}</span></h4>
										@endif</h4></a>
										<span><i class="fa fa-calendar"></i> {{$lok->tgl_akhir}}</span>
										<span><i class="fa fa-map-marker"></i> {{ $lok->lokasi->nama}}</span>
										<p>{{ $lok->deskripsi}}</p>
										<a href="job-page.html" class="button">Apply For This Job</a>
									</div>
								</li>
							@endforeach
						@endif
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
</div>


<!-- Counters -->
<div id="counters">
	<div class="container">
		<div class="four columns">
			<div class="counter-box">
				<span class="counter">15</span><i>k</i>
				<p>Job Offers</p>
			</div>
		</div>

		<div class="four columns">
			<div class="counter-box">
				<span class="counter">4982</span>
				<p>Members</p>
			</div>
		</div>

		<div class="four columns">
			<div class="counter-box">
				<span class="counter">768</span>
				<p>Resumes Posted</p>
			</div>
		</div>

		<div class="four columns">
			<div class="counter-box">
				<span class="counter">90</span><i>%</i>
				<p>Clients Who Rehire</p>
			</div>
		</div>

	</div>
</div>


<!-- Infobox -->


<!-- Clients Carousel -->
<h3 class="centered-headline">Clients Who Have Trusted Us <span>The list of clients who have put their trust in us includes:</span></h3>
<div class="clearfix"></div>

<div class="container">

	<div class="sixteen columns">

		<!-- Navigation / Left -->
		<div class="one carousel column"><div id="showbiz_left_2" class="sb-navigation-left-2"><i class="fa fa-angle-left"></i></div></div>

		<!-- ShowBiz Carousel -->
		<div id="our-clients" class="showbiz-container fourteen carousel columns" >

		<!-- Portfolio Entries -->
		<div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
			<div class="overflowholder">

				<ul>
					<!-- Item -->
					<li><img src="{{ asset('images/logo_grandtjokro.png') }}" alt="" /></li>
					<li><img src="{{ asset('images/logo_tjokrobudget.png') }}" alt="" /></li>
					<li><img src="{{ asset('images/logo_tjokrohotel.png') }}" alt="" /></li>
					<li><img src="{{ asset('images/logo_tjokrostyle.png') }}" alt="" /></li>
				</ul>
				<div class="clearfix"></div>

			</div>
			<div class="clearfix"></div>

		</div>
		</div>

		<!-- Navigation / Right -->
		<div class="one carousel column"><div id="showbiz_right_2" class="sb-navigation-right-2"><i class="fa fa-angle-right"></i></div></div>

	</div>

</div>
@include('footer')
<script>
@if(session()->exists('status'))
	swal("Thanks!", "Your data will be review!", "success")
@endif
@if(session()->exists('subscribe'))
	swal("Thanks!", "We will announce when available jobs!", "success")
@endif
</script>