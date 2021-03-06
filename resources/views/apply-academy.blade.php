@include('header_apply')

<div id="titlebar" style="background-image: url('../../images/banner-home-02.jpg');height: 250px;" class="single">
	<div class="container">
		
	</div>
</div>
<div class="container" >
  {!! Form::open(['route' => ['academy'], 'method' => 'post', "id"=>"form-recrutiment",'files' => true]) !!}
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
              {!! Form::label('nama', trans('apply.nama') ) !!}
              {!! Form::text('nama', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('no_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('no_ktp', trans('apply.nomor_ktp')) !!}
              {!! Form::text('no_ktp', isset($model) ? $model->no_ktp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_kota_id_asal') ? 'has-error' : '' !!}">
              {!! Form::label('m_kota_id_asal', trans("apply.tempat_lahir")) !!}
              {!! Form::select('m_kota_id_asal',$kota, isset($model) ? $model->m_kota_id_asal: null , ['class'=>'form-control select2']) !!}
              {!! $errors->first('m_kota_id_asal', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_kota_id_asal') ? 'has-error' : '' !!}">
              {!! Form::label('tgl_lahir', trans("apply.tanggal_lahir")) !!}
              {!! Form::text('tgl_lahir', isset($model) ? $model->tgl_lahir: null , ['class'=>'form-control pull-right datepicker']) !!}
              {!! $errors->first('tgl_lahir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
              {!! Form::label('email', trans("apply.email")) !!}
              {!! Form::text('email', isset($model) ? $model->email: null , ['class'=>'form-control']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', trans("apply.nomor_hp")) !!}
              {!! Form::text('no_hp', isset($model) ? $model->no_hp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('pendidikan_terakhir') ? 'has-error' : '' !!}">
              {!! Form::label('pendidikan_terakhir', trans("apply.pendidikan")) !!}
              {!! Form::select('pendidikan_terakhir', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id: null , ['class'=>'form-control']) !!}
              {!! $errors->first('pendidikan_terakhir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('nilai_sekolah') ? 'has-error' : '' !!}">
              {!! Form::label('nilai_sekolah', trans("apply.nilai_sekolah")) !!}
              {!! Form::text('nilai_sekolah', isset($model) ? $model->pendidkan->nilai_sekolah: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nilai_sekolah', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('nama_sekolah') ? 'has-error' : '' !!}">
              {!! Form::label('nama_sekolah', trans("apply.nama_sekolah")) !!}
              {!! Form::text('nama_sekolah', isset($model) ? $model->pendidkan->nama_sekolah: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nama_sekolah', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_departement_id') ? 'has-error' : '' !!}">
              {!! Form::label('m_departement_id', trans("apply.departement")) !!}
              {!! Form::select('m_departement_id',$departemen, isset($model) ? $model->m_departement_id: null , ['class'=>'form-control']) !!}
              {!! $errors->first('m_departement_id', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('m_jenis_kelamin') ? 'has-error' : '' !!}">
              {!! Form::label('m_jenis_kelamin', trans("apply.jenis_kelamin")) !!}
              {!! Form::select('m_jenis_kelamin',$jk, isset($model) ? $model->m_jenis_kelamin: null , ['class'=>'form-control']) !!}
              {!! $errors->first('m_jenis_kelamin', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('sumber') ? 'has-error' : '' !!}">
              {!! Form::label('sumber', trans("apply.sumber")) !!}
              {!! Form::select('sumber',$sumber_loker, isset($model) ? $model->m_jenis_kelamin: null , ['class'=>'form-control']) !!}
              {!! $errors->first('sumber', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12" id="lainnya">
            <div class="form-group {!! $errors->has('other') ? 'has-error' : '' !!}">
              {!! Form::label('other', trans("apply.lainnya")) !!}
              {!! Form::text('other',  null , ['class'=>'form-control']) !!}
              {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {!! $errors->has('alamat_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('alamat_ktp', trans("apply.alamat")) !!}
              {!! Form::textarea('alamat_ktp', isset($model) ? $model->alamat_ktp: null , ['class'=>'form-control','style'=>'height:150px;']) !!}
              {!! $errors->first('alamat_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('cv') ? 'has-error' : '' !!}">
              {!! Form::label('cv', trans("apply.cv")) !!}
              {!! Form::file('cv') !!}
              {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <button class="button btn-block" type="button" id="apply">SUBMIT</button>
        </div>
      </div>
  {!! Form::close() !!}
</div>
@include('footer')
<script>
    if($("#sumber").val()==='0'){
        $("#lainnya").show();
    }else{
        $("#lainnya").hide();
    }
    $("#sumber").on("change",function(){
        if(this.value=='0'){
            $("#lainnya").show();
        }else{
            $("#lainnya").hide();
        }
    });
    $( "#apply" ).click(function() {
        var form = $('#form-recrutiment');
        swal({
          title: '{{ trans("apply.persetujuan") }}',
          text: '{!! trans("apply.aggrement") !!}',
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#16465E",
          cancelButtonText : '{{ trans("apply.batal") }}',
          confirmButtonText: '{{ trans("apply.setuju") }}',
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