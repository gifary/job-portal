@include('header_apply')
<style>
#profileForm .content {
    min-height: 100px;
}
#profileForm .content > .body {
    width: 100%;
    height: auto;
    padding: 15px;
    position: relative;
}
.wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
  background: #26ae61;
}
.wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active{
  background: #26ae61;
}
.wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
  background: #74cc9a;
}
</style>
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
<div class="container" style="width:100%;">
  {!! Form::open(['route' => ['postjob',$id,$m_lokasi_id], 'method' => 'post', "id"=>"form-recrutiment",'files' => true]) !!}
   <div id="profileForm" class="single">
    <div class="wajib">
      <span>* Wajib diisi</span>
    </div>
    <h2>Identitas Diri</h2>
    <section>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">
              {!! Form::label('foto', '*Photo') !!}
              {!! Form::file('foto',['class'=>'',"accept"=>"image/*"]) !!}
              {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
              {!! Form::label('email', '*Email') !!}<br>
              {!! Form::text('email', isset($model) ? $model->email: null , ['class'=>'form-control']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
              {!! Form::label('nama', '*Nama') !!}
              {!! Form::text('nama', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('nama_panggilan') ? 'has-error' : '' !!}">
              {!! Form::label('nama_panggilan', '*Nama Panggilan') !!}
              {!! Form::text('nama_panggilan', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
              {!! $errors->first('nama_panggilan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('m_kota_id') ? 'has-error' : '' !!}">
              {!! Form::label('m_kota_id', '*Kota Kelahiran') !!}
              {!! Form::select('m_kota_id',$kota, null , ['class'=>'form-control select2']) !!}
              {!! $errors->first('m_kota_id', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>

        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('tgl_lahir') ? 'has-error' : '' !!}">
              {!! Form::label('tgl_lahir', '*Tanggal Lahir') !!}
              {!! Form::text('tgl_lahir', isset($model) ? $model->tgl_lahir: null , ['class'=>'form-control pull-right datepicker']) !!}
              {!! $errors->first('tgl_lahir', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>

        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('m_agama_id') ? 'has-error' : '' !!}">
              {!! Form::label('m_agama_id', '*Agama') !!}
              {!! Form::select('m_agama_id',$agama, isset($model) ? $model->m_agama_id: null , ['class'=>'form-control']) !!}
              {!! $errors->first('m_agama_id', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>

        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('m_jenis_kelamin') ? 'has-error' : '' !!}">
              {!! Form::label('m_jenis_kelamin', '*Jenis Kelamin') !!}
              {!! Form::select('m_jenis_kelamin',$jk, isset($model) ? $model->m_jenis_kelamin: null , ['class'=>'form-control']) !!}
              {!! $errors->first('m_jenis_kelamin', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('no_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('no_ktp', '*Nomor KTP') !!}
              {!! Form::text('no_ktp', isset($model) ? $model->no_ktp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('berat_badan') ? 'has-error' : '' !!}">
              {!! Form::label('berat_badan', '*Berat Badan') !!}
              {!! Form::text('berat_badan', isset($model) ? $model->berat_badan: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('berat_badan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('tinggi_badan') ? 'has-error' : '' !!}">
              {!! Form::label('tinggi_badan', '*Tinggi Badan') !!}
              {!! Form::text('tinggi_badan', isset($model) ? $model->tinggi_badan: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('tinggi_badan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>  
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('salary') ? 'has-error' : '' !!}">
              {!! Form::label('salary', '*Gajih yang diharapkan') !!}
              {!! Form::text('salary', isset($model) ? $model->salary: null , ['class'=>'form-control price']) !!}
              {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', '*Tanggal Bergabung') !!}
                {!! Form::text('tgl_bergabung', isset($model) ? $model->tgl_bergabung: null , ['class'=>'form-control pull-right datepicker']) !!}
                {!! $errors->first('tgl_bergabung', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('no_tlp') ? 'has-error' : '' !!}">
              {!! Form::label('no_tlp', 'Nomor Telphone') !!}
              {!! Form::text('no_tlp', isset($model) ? $model->no_tlp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', '*Nomor HP') !!}
              {!! Form::text('no_hp', isset($model) ? $model->no_hp: null , ['class'=>'form-control numericOnly']) !!}
              {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('m_status_id') ? 'has-error' : '' !!}">
              {!! Form::label('m_status_id', '*Status') !!}
              {!! Form::select('m_status_id',$status, isset($model) ? $model->m_status_id: null , ['class'=>'form-control']) !!}
              {!! $errors->first('m_status_id', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('no_tanggungan') ? 'has-error' : '' !!}">
              {!! Form::label('no_tanggungan', 'Jumlah Tanggungan') !!}
              {!! Form::number('no_tanggungan', isset($model) ? $model->no_tanggungan: null , ['class'=>'form-control', "min"=>0]) !!}
              {!! $errors->first('no_tanggungan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('m_kota_id_asal') ? 'has-error' : '' !!}">
              {!! Form::label('m_kota_id_asal', '*Kota Tempat Tinggal') !!}
              {!! Form::select('m_kota_id_asal',$kota, isset($model) ? $model->m_kota_id_asal: null , ['class'=>'form-control select2']) !!}
              {!! $errors->first('m_kota_id_asal', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('alamat_ktp') ? 'has-error' : '' !!}">
              {!! Form::label('alamat_ktp', '*Alamat') !!}
              {!! Form::textarea('alamat_ktp', isset($model) ? $model->alamat_ktp: null , ['class'=>'form-control','style'=>'height:150px;']) !!}
              {!! $errors->first('alamat_ktp', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group {!! $errors->has('masalah_kesehatan') ? 'has-error' : '' !!}">
              {!! Form::label('masalah_kesehatan', '*Apakah punya masalah kesehatan ?') !!}
              {!! Form::select('masalah_kesehatan',$masalah_kesehatan, isset($model) ? $model->no_ktp: null , ['class'=>'form-control']) !!}
              {!! $errors->first('masalah_kesehatan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group {!! $errors->has('keterangan_kesehatan') ? 'has-error' : '' !!}">
              {!! Form::label('keterangan_kesehatan', 'Jika Ya Ceritakan Masalahnya') !!}
              {!! Form::textarea('keterangan_kesehatan', isset($model) ? $model->alamat_ktp: null , ['class'=>'form-control','style'=>'height:150px;']) !!}
              {!! $errors->first('keterangan_kesehatan', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        
      </div>
    </section>
    <h2>Kontak Darurat</h2>
    <section>
      <div id="form-kontak">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="form-group {!! $errors->has('nama_kontak[0]') ? 'has-error' : '' !!}">
                {!! Form::label('nama_kontak', '*Nama') !!}
                {!! Form::text('nama_kontak[0]', null , ['class'=>'form-control']) !!}
                {!! $errors->first('nama_kontak[0]', '<p class="help-block">:message</p>') !!}
              </div>    
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="form-group {!! $errors->has('nomor_hp_kontak[0]') ? 'has-error' : '' !!}">
                {!! Form::label('nomor_hp_kontak', '*Nomor HP') !!}
                {!! Form::text('nomor_hp_kontak[0]', null , ['class'=>'form-control']) !!}
                {!! $errors->first('nomor_hp_kontak[0]', '<p class="help-block">:message</p>') !!}
              </div>    
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="form-group {!! $errors->has('hubungan_kontak[0]') ? 'has-error' : '' !!}">
                {!! Form::label('hubungan_kontak', '*Hubungan') !!}
                {!! Form::text('hubungan_kontak[0]', null , ['class'=>'form-control']) !!}
                {!! $errors->first('hubungan_kontak[0]', '<p class="help-block">:message</p>') !!}
              </div>    
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
              <div class="form-group {!! $errors->has('alamat_kontak[0]') ? 'has-error' : '' !!}">
                {!! Form::label('alamat_kontak', '*Alamat') !!}
                {!! Form::text('alamat_kontak[0]', null , ['class'=>'form-control']) !!}
                {!! $errors->first('alamat_kontak[0]', '<p class="help-block">:message</p>') !!}
              </div>    
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col-md-12 pull-left">
          <input type="button" class="btn btn-sm btn-success" value="Tambah Kontak Darurat" onClick="addKontak('form-kontak');">
        </div>
      </div>
    </section>
    <h2>Pengalaman Pekerjaan</h2>
    <section>
      <div id="form-perusahaan">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_perusahaan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama_perusahaan[0]', 'Perusahaan') !!}
                  {!! Form::text('nama_perusahaan[0]', isset($model) ? $model->nama_perusahaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_perusahaan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('alamat_perusahaan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('alamat_perusahaan[0]', 'Alamat Perusahaan') !!}
                  {!! Form::textarea('alamat_perusahaan[0]', isset($model) ? $model->alamat_perusahaan: null , ['class'=>'form-control','style'=>'height:50px']) !!}
                  {!! $errors->first('alamat_perusahaan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('jenis_usaha[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('jenis_usaha[0]', 'Jenis Bidang Usaha') !!}
                  {!! Form::text('jenis_usaha[0]', isset($model) ? $model->kota->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('jenis_usaha[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('no_telp1[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('no_telp1[0]', 'Telphone') !!}
                  {!! Form::text('no_telp1[0]', isset($model) ? $model->berat_badan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('no_telp1[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_atasan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama_atasan[0]', 'Nama Atasan') !!}
                  {!! Form::text('nama_atasan[0]', isset($model) ? $model->nama_atasan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_atasan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('tanggal_masuk_pekerjaan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('tanggal_masuk_pekerjaan', 'Tanggal Masuk') !!}
                  {!! Form::text('tanggal_masuk_pekerjaan[0]', isset($model) ? $model->tgl_bergabung: null , ['class'=>'form-control pull-right datepicker']) !!}
                  {!! $errors->first('tanggal_masuk_pekerjaan', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('tanggal_keluar_pekerjaan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('posisi_pekerjaan', 'Tanggal Keluar') !!}
                  {!! Form::text('tanggal_keluar_pekerjaan[0]', isset($model) ? $model->tgl_bergabung: null , ['class'=>'form-control pull-right datepicker']) !!}
                  {!! $errors->first('tanggal_keluar_pekerjaan', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('posisi_pekerjaan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('posisi_pekerjaan', 'Posisi') !!}
                  {!! Form::text('posisi_pekerjaan[0]', isset($model) ? $model->posisi: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('posisi_pekerjaan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('gaji[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('gaji[0]', 'Gaji') !!}
                  {!! Form::text('gaji[0]', isset($model) ? $model->gaji: null , ['class'=>'form-control price']) !!}
                  {!! $errors->first('gaji[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('alasan_berhenti[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('alasan_berhenti[0]', 'Alasan Berhenti') !!}
                  {!! Form::textarea('alasan_berhenti[0]', isset($model) ? $model->alasan_berhenti: null , ['class'=>'form-control',"style"=>"height:100px"]) !!}
                  {!! $errors->first('alasan_berhenti[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 pull-left">
          <input type="button" class="btn btn-sm btn-success" value="Tambah Pengalaman" onClick="addPengalaman('form-perusahaan');">
        </div>
      </div>
    </section>
    <h2>Pendidikan</h2>
    <section>
      <div id="pendidikan">
          <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group {!! $errors->has('nama[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', '*Nama Sekolah\Nama Universitas') !!}
                  {!! Form::text('nama_sekolah[0]', isset($model) ? $model->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="form-group {!! $errors->has('kota_asal_pendidikan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('kota_asal_pendidikan[0]', '*Kota/Kabupaten') !!}
                  {!! Form::text('kota_asal_pendidikan[0]', null , ['class'=>'form-control']) !!}
                  {!! $errors->first('kota_asal_pendidikan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="form-group {!! $errors->has('tahun_lulus_sekolah[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('tahun_lulus_sekolah[0]', '*Tahun Lulus') !!}
                  {!! Form::number('tahun_lulus_sekolah[0]', isset($model) ? $model->pendidikan->tahun: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('tahun_lulus_sekolah[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="form-group {!! $errors->has('m_pendidikan_id_sekolah[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_sekolah[0]', '*Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_sekolah[0]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('m_pendidikan_id_sekolah[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 pull-left">
          <input type="button" class="btn btn-sm btn-success" value="Tambah Pendidikan" onClick="addInput('pendidikan');">
        </div>
      </div>
    </section>
    <h2>Keluarga</h2>
    <section>
      <div id="pendidikan">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('hubungan[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('hubungan', 'Hubungan') !!}
                  {!! Form::text('hubungan[0]', "Ayah" , ['class'=>'form-control', 'readonly'=>"true" ]) !!}
                  {!! $errors->first('hubungan[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_keluarga[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', 'Nama') !!}
                  {!! Form::text('nama_keluarga[0]', isset($model) ? $model->keluarga->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_keluarga[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('m_pendidikan_id_keluarga[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_keluarga[0]', 'Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_keluarga[0]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id_keluarga: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('pekerjaan_keluarga[0]') ? 'has-error' : '' !!}">
                  {!! Form::label('pekerjaan_keluarga[0]', 'Pekerjaan') !!}
                  {!! Form::text('pekerjaan_keluarga[0]', isset($model) ? $model->keluarga->pekerjaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('pekerjaan_keluarga[0]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('hubungan[1]') ? 'has-error' : '' !!}">
                  {!! Form::label('hubungan[1]', 'Hubungan') !!}
                  {!! Form::text('hubungan[1]', "Ibu" , ['class'=>'form-control', 'readonly'=>"true" ]) !!}
                  {!! $errors->first('hubungan[1]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_keluarga[1]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', 'Nama') !!}
                  {!! Form::text('nama_keluarga[1]', isset($model) ? $model->keluarga->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_keluarga[1]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('m_pendidikan_id_keluarga[1]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_keluarga[1]', 'Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_keluarga[1]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id_keluarga: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('m_pendidikan_id_keluarga[1]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('pekerjaan_keluarga[1]') ? 'has-error' : '' !!}">
                  {!! Form::label('pekerjaan_keluarga[1]', 'Pekerjaan') !!}
                  {!! Form::text('pekerjaan_keluarga[1]', isset($model) ? $model->keluarga->pekerjaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('pekerjaan_keluarga[1]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('hubungan[2]') ? 'has-error' : '' !!}">
                  {!! Form::label('hubungan', 'Hubungan') !!}
                  {!! Form::select('hubungan[2]', array("Saudara/Anak laki-laki"=> "Saudara/Anak laki-laki", "Saudara/Anak perempuan"=>"Saudara/Anak perempuan", "Istri"=> "Istri","Suami"=>"Suami") , null,['class'=>'form-control']) !!}
                  {!! $errors->first('hubungan', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_keluarga[2]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', 'Nama') !!}
                  {!! Form::text('nama_keluarga[2]', isset($model) ? $model->keluarga->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_keluarga[2]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('m_pendidikan_id_keluarga[2]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_keluarga[2]', 'Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_keluarga[2]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id_keluarga: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('m_pendidikan_id_keluarga[2]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('pekerjaan_keluarga[2]') ? 'has-error' : '' !!}">
                  {!! Form::label('pekerjaan_keluarga[2]', 'Pekerjaan') !!}
                  {!! Form::text('pekerjaan_keluarga[2]', isset($model) ? $model->keluarga->pekerjaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('pekerjaan_keluarga[2]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('hubungan[3]') ? 'has-error' : '' !!}">
                  {!! Form::label('hubungan', 'Hubungan') !!}
                  {!! Form::select('hubungan[3]', array("Saudara/Anak laki-laki"=> "Saudara/Anak laki-laki", "Saudara/Anak perempuan"=>"Saudara/Anak perempuan", "Istri"=> "Istri","Suami"=>"Suami") , null,['class'=>'form-control']) !!}
                  {!! $errors->first('hubungan[3]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_keluarga[3]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', 'Nama') !!}
                  {!! Form::text('nama_keluarga[3]', isset($model) ? $model->keluarga->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_keluarga[3]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
             
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('m_pendidikan_id_keluarga[3]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_keluarga[3]', 'Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_keluarga[3]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id_keluarga: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('m_pendidikan_id_keluarga[3]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('pekerjaan_keluarga[3]') ? 'has-error' : '' !!}">
                  {!! Form::label('pekerjaan_keluarga[3]', 'Pekerjaan') !!}
                  {!! Form::text('pekerjaan_keluarga[3]', isset($model) ? $model->keluarga->pekerjaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('pekerjaan_keluarga[3]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('hubungan[4]') ? 'has-error' : '' !!}">
                  {!! Form::label('hubungan[4]', 'Hubungan') !!}
                  {!! Form::select('hubungan[4]', array("Saudara/Anak laki-laki"=> "Saudara/Anak laki-laki", "Saudara/Anak perempuan"=>"Saudara/Anak perempuan", "Istri"=> "Istri","Suami"=>"Suami") , null,['class'=>'form-control']) !!}
                  {!! $errors->first('hubungan[4]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('nama_keluarga[4]') ? 'has-error' : '' !!}">
                  {!! Form::label('nama', 'Nama') !!}
                  {!! Form::text('nama_keluarga[4]', isset($model) ? $model->keluarga->nama: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('nama_keluarga[4]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
            
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('m_pendidikan_id_keluarga[4]') ? 'has-error' : '' !!}">
                  {!! Form::label('m_pendidikan_id_keluarga[4]', 'Tingkat') !!}
                  {!! Form::select('m_pendidikan_id_keluarga[4]', $pendidikan, isset($model) ? $model->pendidkan->m_pendidikan_id_keluarga: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('m_pendidikan_id_keluarga[4]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group {!! $errors->has('pekerjaan_keluarga[4]') ? 'has-error' : '' !!}">
                  {!! Form::label('pekerjaan_keluarga[4]', 'Pekerjaan') !!}
                  {!! Form::text('pekerjaan_keluarga[4]', isset($model) ? $model->keluarga->pekerjaan: null , ['class'=>'form-control']) !!}
                  {!! $errors->first('pekerjaan_keluarga[4]', '<p class="help-block">:message</p>') !!}
                </div>    
            </div>
          </div>
      </div>
    </section>
   </div>
  {!! Form::close() !!}
</div>
@include('footer')
<script>
    
    function adjustIframeHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }

    $("#profileForm").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex)
        {
          var form = $("#form-recrutiment");
          swal({
            title: "Are you sure?",
            text: "By submit data I aggree for privacy policy",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, I am Sure!",
            closeOnConfirm: false
          },
          function(){
            form.submit();
          });

           /* var form = $("#form-recrutiment");
            // Submit form input
            var result = confirm("Apakah data yang diisi sudah benar ?");
            if (result) {
              form.submit();
            }else{
              return false;
            } */
            
        }
    });

    $('.datepicker').datepicker({
      autoclose: true,
      startView : 2,
      format: 'yyyy-mm-dd'
    });
    var next =1;
    function addInput(divName){
        var html ='<div class="row">';
          html += '<div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group"> {!! Form::label("nama", "Nama Sekolah/Nama Universitas") !!} <input class="form-control" name="nama_sekolah['+next+']" type="text"></div> </div>';
          html += '<div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group"> <label for="m_kota_id_sekolah'+next+'">Kota/kabupaten</label> <input class="form-control sekolah ui-autocomplete-input" data-id="m_kota_nama_sekolah_'+next+'" name="m_kota_nama_sekolah['+next+']" autocomplete="off" type="text"> <input class="form-control hidden" id="m_kota_id_sekolah_'+next+'" name="m_kota_id_sekolah['+next+']" type="text"> </div> </div>';
          html += '<div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group"> {!! Form::label("tahun_lulus_sekolah[]", "Tahun Lulus") !!} <input class="form-control" name="tahun_lulus_sekolah['+next+']" type="number"> </div> </div>';
          html += '<div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group"> {!! Form::label("m_pendidikan_id_sekolah[]", "Tingkat") !!}<select class="form-control" name="m_pendidikan_id_sekolah['+next+']"><?php foreach ($pendidikan as $key => $val) { ?> <option value="{{$key}}">{{$val}}</option> <?php } ?> </select>  </div> </div>';
          html +='</div>';
          next++;
          $("#pendidikan").append(html);
    }
    var kontak =1;
    function addKontak(divname){
      var html = '<div class="row"> <div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group "> <label for="nama_kontak">Nama</label> <input class="form-control" name="nama_kontak['+kontak+']" type="text"> </div> </div> <div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group "> <label for="nomor_hp_kontak">Nomor HP</label> <input class="form-control" name="nomor_hp_kontak['+kontak+']" type="text"> </div> </div> <div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group "> <label for="hubungan_kontak">Hubungan</label> <input class="form-control" name="hubungan_kontak['+kontak+']" type="text"> </div> </div> <div class="col-lg-3 col-md-6 col-xs-12"> <div class="form-group "> <label for="alamat_kontak">Alamat</label> <input class="form-control" name="alamat_kontak['+kontak+']" type="text"> </div> </div> </div>';
      $("#form-kontak").append(html);
    }
    var pengalaman =1;
    function addPengalaman(divName){
           var html ='<hr class="half-rule"/><div id="form-perusahaan"><div class="row"><div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="nama_perusahaan['+pengalaman+']">Perusahaan</label> <input name="nama_perusahaan['+pengalaman+']" id="nama_perusahaan['+pengalaman+']" class="form-control" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="alamat_perusahaan['+pengalaman+']">Alamat Perusahaan</label> <textarea name="alamat_perusahaan['+pengalaman+']" cols="5'+pengalaman+'" rows="1'+pengalaman+'" id="alamat_perusahaan['+pengalaman+']" class="form-control" style="height: 5'+pengalaman+'px;"></textarea></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="jenis_usaha['+pengalaman+']">Jenis Bidang Usaha</label> <input name="jenis_usaha['+pengalaman+']" id="jenis_usaha['+pengalaman+']" class="form-control" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="no_telp1['+pengalaman+']">Telphone</label> <input name="no_telp1['+pengalaman+']" id="no_telp1['+pengalaman+']" class="form-control" type="text"></div></div></div> <div class="row"><div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="nama_atasan['+pengalaman+']">Nama Atasan</label> <input name="nama_atasan['+pengalaman+']" id="nama_atasan['+pengalaman+']" class="form-control" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="tanggal_masuk_pekerjaan">Tanggal Masuk</label>  <input name="tanggal_masuk_pekerjaan['+pengalaman+']" class="form-control pull-right datepicker" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="posisi_pekerjaan">Tanggal Keluar</label> <input name="tanggal_keluar_pekerjaan['+pengalaman+']" class="form-control pull-right datepicker" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="posisi_pekerjaan">Posisi</label> <input name="posisi_pekerjaan['+pengalaman+']" class="form-control" type="text"></div></div> <div class="col-lg-3 col-md-6 col-xs-12"><div class="form-group "><label for="gaji['+pengalaman+']">Gaji</label> <input name="gaji['+pengalaman+']" id="gaji['+pengalaman+']" class="form-control price" type="text"></div></div><div class="col-md-3"><div class="form-group "><label for="alasan_berhenti['+pengalaman+']">Alasan Berhenti</label> <textarea name="alasan_berhenti['+pengalaman+']" cols="5'+pengalaman+'" rows="1'+pengalaman+'" id="alasan_berhenti['+pengalaman+']" class="form-control" style="height: 1'+pengalaman+''+pengalaman+'px;"></textarea></div></div></div></div>';
          html +='<script>';
          html += " $('.datepicker').datepicker({autoclose: true, format: 'yyyy-mm-dd'}); $('.price').priceFormat({prefix: '',centsSeparator: '.',thousandsSeparator: ',',centsLimit: 0});";
          html += '<\/script>';
          pengalaman++;
          $("#form-perusahaan").append(html);
    }
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
