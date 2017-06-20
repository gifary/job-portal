@include('header')
<div class="container">
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