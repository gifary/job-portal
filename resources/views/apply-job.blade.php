@include('header_apply')

<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Apply Job</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{route('home')}}">Home</a></li>
					<li>Apply Job</li>
				</ul>
			</nav>
		</div>

	</div>
</div>
<div class="container" >
  {!! Form::open(['route' => ['postjob',$id,$m_lokasi_id], 'method' => 'post', "id"=>"form-recrutiment",'files' => true]) !!}
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
              {!! Form::label('nama', '*Nama') !!}
              {!! Form::text('nama', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('no_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('no_ktp', '*Nomor KTP') !!}
              {!! Form::text('no_ktp', isset($model) ? $model->no_ktp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_kota_id_asal') ? 'has-error' : '' !!}">
              {!! Form::label('m_kota_id_asal', '*Tempat Lahir') !!}
              {!! Form::select('m_kota_id_asal',$kota, isset($model) ? $model->m_kota_id_asal: null , ['class'=>'form-control select2']) !!}
              {!! $errors->first('m_kota_id_asal', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_kota_id_asal') ? 'has-error' : '' !!}">
              {!! Form::label('tgl_lahir', '*Tanggal Lahir') !!}
              {!! Form::text('tgl_lahir', isset($model) ? $model->tgl_lahir: null , ['class'=>'form-control pull-right datepicker']) !!}
              {!! $errors->first('tgl_lahir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
              {!! Form::label('email', '*Email') !!}
              {!! Form::text('email', isset($model) ? $model->email: null , ['class'=>'form-control']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', '*Nomor HP') !!}
              {!! Form::text('no_hp', isset($model) ? $model->no_hp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('pendidikan_terakhir') ? 'has-error' : '' !!}">
              {!! Form::label('pendidikan_terakhir', '*Pendidikan Terakhir') !!}
              {!! Form::select('pendidikan_terakhir', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id: null , ['class'=>'form-control']) !!}
              {!! $errors->first('pendidikan_terakhir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('posisi_terakhir') ? 'has-error' : '' !!}">
              {!! Form::label('posisi_terakhir', '*Posisi Terakhir') !!}
              {!! Form::text('posisi_terakhir', isset($model) ? $model->posisi: null , ['class'=>'form-control']) !!}
              {!! $errors->first('posisi_terakhir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('alamat_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('alamat_ktp', '*Alamat') !!}
              {!! Form::textarea('alamat_ktp', isset($model) ? $model->alamat_ktp: null , ['class'=>'form-control','style'=>'height:150px;']) !!}
              {!! $errors->first('alamat_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('cv') ? 'has-error' : '' !!}">
              {!! Form::label('cv', '*CV Format PDF Max(2 Mb)') !!}
              {!! Form::file('cv') !!}
              {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <button class="button btn-block" type="button" id="apply">Apply</button>
        </div>
      </div>
  {!! Form::close() !!}
</div>
@include('footer')
<script>
    $( "#apply" ).click(function() {
        var form = $('#form-recrutiment');
        swal({
          title: "Are you sure?",
          text: "By submit data I aggree for privacy policy",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#16465E",
          confirmButtonText: "Yes, I am Sure!",
          closeOnConfirm: false
        },
        function(){
          form.submit();
        });
    });
    $('.datepicker').datepicker({
      autoclose: true,
      startView : 2,
      format: 'yyyy-mm-dd'
    });
    $(".select2").select2();
    $('.price').priceFormat({
        prefix: '',
        centsSeparator: '.',
        thousandsSeparator: ',',
        centsLimit: 0
    });
    $('.numericOnly').keyup(function () {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
          this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });
</script>