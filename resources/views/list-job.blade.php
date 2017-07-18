@include('header')
{{-- <div class="container">
    <div class="single">  
	   <div class="col-md-9 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				@if($loker!=null)
					@foreach($loker as $lok)
						<div class="jobs-item with-thumb jarak-bawah">
						<div class="jobs_right">
							<div class="date">{{ date("d",strtotime($lok->tgl_akhir)) }} <span>{{ date("M",strtotime($lok->tgl_akhir)) }}</span></div>
							<div class="date_desc"><h6 class="title"><a href="{{ route('detailsjob',$lok->t_job_vacancy_id) }}">{{ $lok->jabatan->nama." (".$lok->kode.")"}}</a></h6>
							<span class="meta">{{ $lok->lokasi->nama}} / Status Pekerjaan ( {{$lok->status_pekerjaan->nama}} )</span>
							</div>
							<div class="clearfix"> </div>
							
							<p class="description">{{$lok->deskripsi}} <a href="{{ route('detailsjob',$lok->t_job_vacancy_id) }}" class="read-more">Read More</a></p>
						</div>
							<div class="clearfix"> </div>
						</div>
					@endforeach
				@else
					<h1 style="text-align:center">Job not available</h1>
				@endif
		  </div>
	  </div>
     </div>
    </div>
    <!--<ul class="pagination jobs_pagination">
		<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
		<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
	</ul>-->
   </div>
   <div class="col-md-3">
	   	  <div class="widget_search">
			<h5 class="widget-title">Search</h5>
			<div class="widget-content">
				<span>I'm looking for a ...</span>
				{!! Form::open(['route' => 'search', 'method' => 'post']) !!}
                <select class="form-control jb_1" name="posisi">
					<option value="0">All</option>
					@foreach($posisi as $p)
						<option value="{{$p->jabatan->m_jabatan_id}}">{{$p->jabatan->nama}}</option>
					@endforeach
				</select>
                <span>Location</span>
				{!! Form::select('lokasi', $lokasi, null, ['class'=> 'form-control jb_1']) !!}
                <input type="submit" class="btn btn-default" value="Search">
				{!! Form::close() !!}
			</div>
		  </div>
	   	  
	   </div>
  <div class="clearfix"> </div>
 </div>
</div> --}}
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
						<select class="form-control ico-01" name="posisi">
							<option value="0">All Position</option>
							@foreach($posisi as $p)
								<option value="{{$p->jabatan->m_jabatan_id}}">{{$p->jabatan->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="six columns">
						{!! Form::select('lokasi', $lokasi, null, ['class'=> 'form-control ico-02']) !!}
					</div>
					<button><i class="fa fa-search"></i></button>
					
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
			<a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
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