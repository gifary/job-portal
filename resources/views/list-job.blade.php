@include('headers2')

<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Browse Jobs</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('home')}}">Home</a></li>
					<li>Browse Jobs</li>
				</ul>
			</nav>
		</div>

	</div>
</div>
<!-- Content
================================================== -->
<div class="container" style="margin-top:50px;">
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		{{-- <form action="#" method="get" class="list-search">
			<button><i class="fa fa-search"></i></button>
			<input type="text" placeholder="job title, keywords or company name" value=""/>
			<div class="clearfix"></div>
		</form> --}}

		<ul class="job-list full">
            @if($loker!=null)
                @foreach($loker as $lok)
                    <li><a href="{{ route('detailsjob',$lok->t_job_vacancy_id) }}">
                        <img src="{{Config::get('server.image_url')}}{{ $lok->lokasi->logo }}" alt="logo">
                        <div class="job-list-content">
                            <h4>{{ $lok->jabatan->nama }} 
                            {{-- @if($lok->status_pekerjaan->nama=="Casual")
                                <span class="full-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
                            @elseif($lok->status_pekerjaan->nama=="Kontrak")
                                <span class="part-time">{{ $lok->status_pekerjaan->nama }}</span></h4>
                            @elseif($lok->status_pekerjaan->nama=="Daily Worker")
                                <span class="temporary">{{ $lok->status_pekerjaan->nama }}</span></h4>
                            @else
                                <span class="internship">{{ $lok->status_pekerjaan->nama }}</span></h4>
                            @endif --}}
                            </h4>
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
		<div class="clearfix"></div>
	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Location -->
		<div class="widget">
            <form action="{{route('search')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <h4>Position</h4>
				<select class="chosen-select-no-single ico-02" name="posisi">
                    <option value="0">All Position</option>
                    @foreach($posisi as $p)
                        @if(isset($m_jabatan_id))
                            @if($m_jabatan_id==$p->jabatan->m_jabatan_id)
                                <option value="{{$p->jabatan->m_jabatan_id}}" selected>{{$p->jabatan->nama}}</option>
                            @else
                                <option value="{{$p->jabatan->m_jabatan_id}}">{{$p->jabatan->nama}}</option>
                            @endif
                        @else
                            <option value="{{$p->jabatan->m_jabatan_id}}">{{$p->jabatan->nama}}</option>
                        @endif
                    @endforeach
                </select>

                <h4>Location</h4>
				{!! Form::select('lokasi', $lokasi, isset($m_lokasi_id) ? $m_lokasi_id : null, ['class'=> 'chosen-select-no-single ico-02']) !!}

                {{-- <h4>Job Type</h4>
                <ul class="checkboxes">
                    <li>
                        <input id="check-1" type="checkbox" name="status_pekerjaan[]" value="0" 
                        @if(isset($status_pekerjaan))
                            @if(in_array(0,$status_pekerjaan)) 
                                checked 
                            @else
                            @endif 
                        @else 
                            checked 
                        @endif >
                        <label for="check-1">Any Type</label>
                    </li>
                    <li>
                        <input id="check-2" type="checkbox" name="status_pekerjaan[]" value="1"
                        @if(isset($status_pekerjaan))
                            @if(in_array(1,$status_pekerjaan)) 
                                checked 
                            @endif 
                        @endif >
                        <label for="check-2">Kontrak</label>
                    </li>
                    <li>
                        <input id="check-3" type="checkbox" name="status_pekerjaan[]" value="2"
                        @if(isset($status_pekerjaan))
                            @if(in_array(2,$status_pekerjaan)) 
                                checked 
                            @endif 
                        @endif>
                        <label for="check-3">Casual</label>
                    </li>
                    <li>
                        <input id="check-4" type="checkbox" name="status_pekerjaan[]" value="5"
                        @if(isset($status_pekerjaan))
                            @if(in_array(5,$status_pekerjaan)) 
                                checked 
                            @endif 
                        @endif>
                        <label for="check-4">Daily Worker</label>
                    </li>
                    <li>
                        <input id="check-5" type="checkbox" name="status_pekerjaan[]" value="6"
                        @if(isset($status_pekerjaan))
                            @if(in_array(6,$status_pekerjaan)) 
                                checked 
                            @endif 
                        @endif>
                        <label for="check-5">Interns</label>
                    </li>
                </ul> --}}
                <button class="button" style="margin-top:15px">Filter</button>
			</form>
		</div>
	</div>
	<!-- Widgets / End -->


</div>
@include('footer')
