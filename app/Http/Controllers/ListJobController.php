<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Config;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Storage;
use App\Subscribe;

/*
    author          : muhammad gifary (muhammadgifary@gmail.com)
    created date    : 29 maret 2017
    last edited     : 29 maret 2017
*/
class ListJobController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    private $base_url="";
    private $access_token="";

    public function __construct()
    {
        $this->base_url = Config::get("server.base_url");
        $this->access_token = Config::get("server.access_token");
    }

    public function index()
    {
        $response = Curl::to($this->base_url."lokasi")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $lokasi = collect($res->data);
        $lokasi->prepend("All",0);
        $lokasi->all();

        $response = Curl::to($this->base_url."loker/available_postition")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $posisi = $res->data;


        $response = Curl::to($this->base_url."loker")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $loker = $res->data;
        
        return view('list-job',compact("lokasi","posisi","loker"));
    }

    public function search(Request $request)
    {
        $response = Curl::to($this->base_url."lokasi")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $lokasi = collect($res->data);
        $lokasi->prepend("All",0);
        $lokasi->all();

        $response = Curl::to($this->base_url."loker/available_postition")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $posisi = $res->data;


        $response = Curl::to($this->base_url."loker/search")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->withData(array("lokasi"=>$request->input("lokasi"),"posisi"=>$request->input("posisi")))
        ->post();

        $res = json_decode($response);
        $loker = $res->data;
        return view('list-job',compact("lokasi","posisi","loker"));
    }

    public function detailsjob($id){

        $response = Curl::to($this->base_url."loker/".$id)
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $loker = $res->data;
        if(!empty($loker)){
            $id = base64_encode($loker->jabatan->m_jabatan_id);
            return view('detail-job',compact("loker","id"));
        }else{
            return abort(404);
        }
    }

    public function apply_job($id){
        $id = base64_decode($id);
        $response = Curl::to($this->base_url."agama")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $agama = collect($res->data);
        $agama->prepend("Pilih Agama",'');
        $agama->all();

        $response = Curl::to($this->base_url."status")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $status = collect($res->data);
        $status->prepend("Pilih Status",'');
        $status->all();

        $response = Curl::to($this->base_url."jenis_kelamin")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $jk = collect($res->data);
        $jk->prepend("Pilih Jenis Kelamin",'');
        $jk->all();

        $response = Curl::to($this->base_url."pendidikan")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $pendidikan = collect($res->data);
        $pendidikan->prepend("Pilih Pendidikan",'');
        $pendidikan->all();

        $response = Curl::to($this->base_url."lokasi/kota")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $kota = collect($res->data);
        $kota->prepend("Pilih Kota",'');
        $kota->all();

        $masalah_kesehatan = array(
            "0" =>"Tidak",
            "1" => "Ya"
        );
        return view('apply-job',compact("agama","status","jk","pendidikan","masalah_kesehatan","kota","id"));
    }

    public function post_job(Request $request,$m_jabatan_id){

        $messages = [
            'required' => 'This field is required.',
        ];

        $this->validate($request, [
            'nama'              => 'required|string|max:50',
            'nama_panggilan'    => 'required|string|max:50',
            'm_kota_id'         => 'required|numeric',
            'm_agama_id'        => 'required|numeric',
            'm_jenis_kelamin'   => 'required|numeric',
            'm_status_id'       => 'required|numeric',
            'm_kota_id_asal'    => 'required|numeric',
            'tgl_lahir'         => 'required',
            'berat_badan'       => 'required|integer|max:200|min:30',
            'tinggi_badan'      => 'required|integer|max:200|min:120',
            'no_tanggungan'     => 'required|integer|min:0',
            'alamat_ktp'        => 'required',
            'no_ktp'            => 'required|string',
            'no_hp'             => 'required|string|max:13',
            'email'             => 'required|email',
            'salary'            => 'required',
            'foto'              => 'required',
            'tgl_bergabung'     => 'required'
        ],$messages);
       
        $path = $request->file('foto')->store('foto');
        $nama_file = explode("/",$path);
        $file_foto = $this->getCurlValue(storage_path('app/'.$path),false,$nama_file[1]);

        $sent_data = $request->only(['email','nama','nama_panggilan','m_kota_id','m_agama_id','m_jenis_kelamin','m_status_id','m_kota_id_asal','tgl_lahir','berat_badan','tinggi_badan','no_tanggungan','alamat_ktp','no_ktp','no_hp','tgl_bergabung','masalah_kesehatan','no_tlp']);
        $sent_data['salary'] = str_replace(",","",$request->get("salary"));
        $sent_data['foto'] = $file_foto;
        $sent_data['m_jabatan_id'] = $m_jabatan_id;
        $nama_kontak = $request->get("nama_kontak");
        $nomor_hp_kontak = $request->get("nomor_hp_kontak");
        $hubungan_kontak = $request->get("hubungan_kontak");
        $alamat_kontak = $request->get("alamat_kontak");
        $k=0;
        for($i=0; $i<count($nama_kontak);$i++){
            if(!empty($nama_kontak[$i])){
                $sent_data['nama_kontak['.$k.']'] =$nama_kontak[$i];
                $sent_data['nomor_hp_kontak['.$k.']'] =$nomor_hp_kontak[$i];
                $sent_data['alamat_kontak['.$k.']'] =$alamat_kontak[$i];
                $sent_data['hubungan_kontak['.$k.']'] =$hubungan_kontak[$i];
                $k++;
            }
        }

        $nama_perusahaan = $request->get("nama_perusahaan");
        $alamat_perusahaan = $request->get("alamat_perusahaan");
        $jenis_usaha = $request->get("jenis_usaha");
        $no_telp1   = $request->get("no_telp1");
        $nama_atasan    = $request->get("nama_atasan");
        $tanggal_masuk_pekerjaan = $request->get("tanggal_masuk_pekerjaan");
        $tanggal_keluar_pekerjaan = $request->get("tanggal_keluar_pekerjaan");
        $posisi_pekerjaan = $request->get("posisi_pekerjaan");
        $gaji = $request->get("gaji");
        $alasan_berhenti= $request->get("alasan_berhenti");
        $k=0;
        for($i=0; $i<count($nama_perusahaan);$i++){
            if(!empty($nama_perusahaan[$i])){
                $sent_data['nama_perusahaan['.$k.']'] =$nama_perusahaan[$i];
                $sent_data['alamat_perusahaan['.$k.']'] =$alamat_perusahaan[$i];
                $sent_data['jenis_usaha['.$k.']'] =$jenis_usaha[$i];
                $sent_data['no_telp1['.$k.']'] =$no_telp1[$i];
                $sent_data['nama_atasan['.$k.']'] =$nama_atasan[$i];
                $sent_data['tanggal_masuk_pekerjaan['.$k.']'] =$tanggal_masuk_pekerjaan[$i];
                $sent_data['tanggal_keluar_pekerjaan['.$k.']'] =$tanggal_keluar_pekerjaan[$i];
                $sent_data['posisi_pekerjaan['.$k.']'] =$posisi_pekerjaan[$i];
                $sent_data['gaji['.$k.']'] =str_replace(",","",$gaji[$i]);
                $sent_data['alasan_berhenti['.$k.']'] =$alasan_berhenti[$i];
                $k++;
            }
        }

        $m_pendidikan_id_sekolah = $request->get("m_pendidikan_id_sekolah");
        $nama_sekolah = $request->get("nama_sekolah");
        $kota_asal_pendidikan = $request->get("kota_asal_pendidikan");
        $tahun_lulus_sekolah = $request->get("tahun_lulus_sekolah");
        $k=0;
        for($i=0; $i<count($nama_sekolah);$i++){
            if(!empty($nama_sekolah[$i])){
                $sent_data['m_pendidikan_id_sekolah['.$k.']'] =$m_pendidikan_id_sekolah[$i];
                $sent_data['nama_sekolah['.$k.']'] =$nama_sekolah[$i];
                $sent_data['kota_asal_pendidikan['.$k.']'] =$kota_asal_pendidikan[$i];
                $sent_data['tahun_lulus_sekolah['.$k.']'] =$tahun_lulus_sekolah[$i];
                $k++;
            }
        }

        $hubungan = $request->get("hubungan");
        $nama_keluarga = $request->get("nama_keluarga");
        $m_pendidikan_id_keluarga = $request->get("m_pendidikan_id_keluarga");
        $pekerjaan_keluarga = $request->get("pekerjaan_keluarga");
        $k=0;
        for($i=0; $i<count($hubungan);$i++){
            if(!empty($nama_keluarga[$i])){
                $sent_data['hubungan['.$k.']'] =$hubungan[$i];
                $sent_data['nama_keluarga['.$k.']'] =$nama_keluarga[$i];
                $sent_data['m_pendidikan_id_keluarga['.$k.']'] =$m_pendidikan_id_keluarga[$i];
                $sent_data['pekerjaan_keluarga['.$k.']'] =$pekerjaan_keluarga[$i];
                $k++;
            }
        }
        $response = Curl::to($this->base_url."loker")
            ->withContentType('multipart/form-data')
            ->withHeader('Authorization: Bearer '.$this->access_token)
            ->withHeader('Accept: application/json')
            ->withData($sent_data)
            ->containsFile()
            ->enableDebug(storage_path('logs/clientlog.txt'))
            ->post();
        session()->flash('status', 'Task was successful!');
        return redirect()->route('listjob');
    }

    public function download() {
        $file_path = public_path('storage/hello.txt');
        $cfile = $this->getCurlValue($file_path,false,'tes.txt');

        $response = Curl::to($this->base_url."loker")
            ->withData(array("foto"=>$cfile,'nama'=>"gifary"))
            ->withContentType('multipart/form-data')
            ->withHeader('Authorization: Bearer '.$this->access_token)
            ->withHeader('Accept: application/json')
            ->containsFile()
            ->post();
        print_r($response);
    }

    private function getCurlValue($filename, $contentType, $postname)
    {
        // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
        // See: https://wiki.php.net/rfc/curl-file-upload
        if (function_exists('curl_file_create')) {
            return curl_file_create($filename, $contentType, $postname);
        }
    
        // Use the old style if using an older version of PHP
        $value = "@{$filename};filename=" . $postname;
        if ($contentType) {
            $value .= ';type=' . $contentType;
        }
    
        return $value;
    }

    public function subscribe(Request $request){
        $messages = [
            'required' => 'This field is required.',
        ];

        $this->validate($request, [
            'email'             => 'required|email'
        ],$messages);
        Subscribe::create($request->only(['email']));
        session()->flash('subscribe', 'Task was successful!');
        return redirect()->route('listjob');
    }

}
