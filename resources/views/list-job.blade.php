@include('headers2')

<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Browse Jobs</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{ trans("common.here") }} ></li>
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
		<ul class="job-list full">
            @if($loker!=null)
                @foreach($loker as $lok)
                    <li><a href="{{ route('detailsjob',$lok->t_job_vacancy_id) }}">
                        <img src="{{Config::get('server.image_url')}}{{ $lok->lokasi->logo }}" alt="logo">
                        <div class="job-list-content">
                            <h4>{{ $lok->jabatan->nama }} 
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
            <h4 style="text-align:center">{{ route('common.not_found') }}</h4>
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
			    <h4>{{trans('common.position')}}</h4>
				<select class="chosen-select-no-single ico-02" name="posisi">
                    @if(Config::get('app.locale')=="en")
						<option value="0">All Position</option>
					@else
						<option value="0">Semua Posisi</option>
					@endif
                    @foreach($posisi as $p)
                        @if(isset($m_jabatan_id))
                            @if($m_jabatan_id==$p->jabatan->nama)
                                <option value="{{$p->jabatan->nama}}" selected>{{$p->jabatan->nama}}</option>
                            @else
                                <option value="{{$p->jabatan->nama}}">{{$p->jabatan->nama}}</option>
                            @endif
                        @else
                            <option value="{{$p->jabatan->nama}}">{{$p->jabatan->nama}}</option>
                        @endif
                    @endforeach
                </select>

                <h4>{{trans('common.location')}}</h4>
				{!! Form::select('lokasi', $lokasi, isset($m_lokasi_id) ? $m_lokasi_id : null, ['class'=> 'chosen-select-no-single ico-02']) !!}
                <button class="button" style="margin-top:15px">Filter</button>
			</form>
		</div>
	</div>
	<!-- Widgets / End -->


</div>
@include('footer')
