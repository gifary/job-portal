<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Storage;
use App\Subscribe;
use App;
use Session;
use Mail;

class AcademyController extends Controller
{
	private $base_url="";
    private $access_token="";

    public function __construct()
    {
        $this->base_url = Config::get("server.base_url");
        $this->access_token = Config::get("server.access_token");
    }

    public function index()
    {
        return view('academy');
    }

    public function apply(){
        $response = Curl::to($this->base_url."agama")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $agama = collect($res->data);
        if(Config::get('app.locale')=="en"){
            $agama->prepend("Choose",'');
        }else{
            $agama->prepend("Pilih",'');
        }
        $agama->all();

        $response = Curl::to($this->base_url."status")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $status = collect($res->data);
        if(Config::get('app.locale')=="en"){
            $status->prepend("Choose",'');
        }else{
            $status->prepend("Pilih",'');
        }
        $status->all();

        $response = Curl::to($this->base_url."jenis_kelamin")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $jk = collect($res->data);
        if(Config::get('app.locale')=="en"){
            $jk->prepend("Choose",'');
        }else{
            $jk->prepend("Pilih",'');
        }
        $jk->all();

        $response = Curl::to($this->base_url."pendidikan")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $pendidikan = collect($res->data);
        if(Config::get('app.locale')=="en"){
            $pendidikan->prepend("Choose",'');
        }else{
            $pendidikan->prepend("Pilih",'');
        }
        $pendidikan->all();

        $response = Curl::to($this->base_url."lokasi/kota")
        ->withHeader('Authorization: Bearer '.$this->access_token)
        ->withHeader('Accept: application/json')
        ->get();

        $res = json_decode($response);
        $kota = collect($res->data);
        if(Config::get('app.locale')=="en"){
            $kota->prepend("Choose",'');
        }else{
            $kota->prepend("Pilih",'');
        }
        $kota->all();

        $masalah_kesehatan = array(
            "0" =>"Tidak",
            "1" => "Ya"
        );
        if(Config::get('app.locale')=="en"){
            $sumber_loker = array(
                "Instagram" => "Instagram",
                "Twitter"   => "Twitter",
                "Facebook"  => "Facebook",
                "LinkedIn"  => "LinkedIn",
                'Karyawan'  => "Employee",
                "0"     => "Other"
            );
        }else{
            $sumber_loker = array(
                "Instagram" => "Instagram",
                "Twitter"   => "Twitter",
                "Facebook"  => "Facebook",
                "LinkedIn"  => "LinkedIn",
                'Karyawan'  => "Karyawan",
                "0"     => "Lainnya"
            );
        }
        return view('apply-academy',compact("agama","status","jk","pendidikan","masalah_kesehatan","kota","sumber_loker"));
    }

    public function store(Request $request){
    	$messages = [
            'required' => 'This field is required.',
        ];

        $this->validate($request, [
            'nama'              => 'required|string|max:50',
            'no_ktp'            => 'required|numeric',
            'm_kota_id_asal'    => 'required|numeric',
            'tgl_lahir'         => 'required|string',
            'email'             => 'required|email',
            'no_hp'             => 'required|numeric',
            'pendidikan_terakhir'    => 'required|numeric',
            'alamat_ktp'        => 'required',
            'm_jenis_kelamin'   => 'required|numeric',
            'cv'                => 'required|mimes:pdf|max:22000',
            'sumber'            => 'required',
            'nilai_sekolah'            => 'required',
            'nama_sekolah'            => 'required'
        ],$messages);

        if($request->get("sumber")=="0"){
            $this->validate($request, [
                'other'            => 'required|string|max:64'
            ],$messages);
            $sumber = $request->get("other");
        }else{
            $sumber = $request->get("sumber");
        }
       
        $path = $request->file('cv')->store('cv');
        $nama_file = explode("/",$path);
        $file_cv = $this->getCurlValue(storage_path('app/'.$path),false,$nama_file[1]);

        $sent_data = $request->only(['email','nama','no_ktp','m_kota_id','m_kota_id_asal','tgl_lahir','no_hp','pendidikan_terakhir','alamat_ktp','m_jenis_kelamin','nilai_sekolah','nama_sekolah']);

       
        $sent_data['cv'] = $file_cv;
        $sent_data['sumber'] = $sumber;
        $sent_data['m_jabatan_id'] = 0;
        $sent_data['m_lokasi_id'] = 2;
        
        $response = Curl::to($this->base_url."loker/academy")
            ->withContentType('multipart/form-data')
            ->withHeader('Authorization: Bearer '.$this->access_token)
            ->withHeader('Accept: application/json')
            ->withData($sent_data)
            ->containsFile()
            ->enableDebug(storage_path('logs/clientlog.txt'))
            ->post();
        session()->flash('status', 'Task was successful!');
        return redirect()->route('home');
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
}