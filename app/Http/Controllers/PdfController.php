<?php

namespace App\Http\Controllers;

use App\Keterangan;
use App\Pengantar;
use Illuminate\Http\Request;
use App\Penduduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    /*
     * halaman pembuatan surat
     */

    public function skck(){
        $data = DB::table('penduduk')->get();
        return view('page.skck', ['data' => $data]);
    }

    public function domisili(){
        $data = DB::table('penduduk')->get();
        return view('page.domisili', ['data' => $data]);
    }

    /*
     * simpan data surat
     */

    public function simpanS($nik, $nomor){
        $tgl = new \DateTime();
        $tanggal = $tgl->format('/m/Y');

        $nomorSurat = $nomor.$tanggal.'/SKCK';
        $db = new Pengantar();
        $db->nomorSurat = $nomorSurat;
        $db->nik = $nik;
        $db->userId = Auth::user()->id;
        $db->save();
    }

    public function simpanD($nik, $nomor){

        $tgl = new \DateTime();
        $tanggal = $tgl->format('/m/Y');

        $nomorSurat = $nomor.$tanggal.'/DOM'; //custom nomorSurat
        $db = new Keterangan();
        $db->nomorSurat = $nomorSurat;
        $db->nik = $nik;
        $db->userId = Auth::user()->id;
        $db->save();

    }

    /*
     * buat surat
     */

    public function getSkck(Request $request){
        $nik = $request->nik;
        $nomor = $request->nomorSurat;

        $request->session()->forget('nik', 'nomorSkck');
        $request->session()->put([
            'nik' => $nik,
            'nomorSkck' => $nomor,
        ]);
        $this->simpanS($nik, $nomor);

        return response()->json();
    }

    public function getDomisili(Request $request){
        $nik = $request->nik;
        $nomor = $request->nomorSurat;

        $this->simpanD($nik, $nomor);

        $request->session()->forget('nik', 'nomorDomisili');
        $request->session()->put([
            'nik' => $nik,
            'nomorDomisili' => $nomor,
        ]);

        return response()->json();
    }

    public function getDomisili2(Request $request){

        $nik = $request->nik;
        $nomor = $request->nomorSurat;

        $this->simpanD($nik, $nomor);

        $request->session()->forget('nik', 'nomorDomisili');

        $request->session()->put([
            'nik'   => $request->nik,
            'nomorDomisili' => $request->nomorSurat,
        ]);

        $db = new Penduduk();
        $db->nik = $request->nik;
        $db->nama = $request->nama;
        $db->tmlahir = $request->tmlahir;
        $tgl = \DateTime::createFromFormat('d-m-Y', $request->tglahir)->format('Y-m-d'); //konversi string to date format
        $db->tglahir = $tgl;
        $db->kelamin = $request->kelamin;
        $db->status = $request->status;
        $db->agama = $request->agama;
        $db->telp = $request->telp;
        $db->pekerjaan = $request->pekerjaan;
        $db->alamat = $request->alamat;
        $db->rt = $request->rt;
        $db->rw = $request->rw;
        $db->desa = $request->desa;
        $db->kecamatan = $request->kecamatan;
        $db->kabupaten = $request->kabupaten;
        $db->provinsi = $request->provinsi;
        $db->kewarganegaraan = $request->kwn;
        $db->keterangan = 'pendatang';
        $db->save();

        return response()->json($db);
    }

    /*
     * preview surat
     */

    public function previewSkck(){
        return view('pdf.pskck');
    }

    public function previewDomisili(){
        return view('pdf.pdomisili');
    }

    public function previewDomisili2(){
        return view('pdf.pdomisili2');
    }

    /*
     * Section laporan
     */

    public function dataPengantar(){
        $data = DB::table('pengantars')
            ->join('penduduk', 'pengantars.nik', '=', 'penduduk.nik')
            ->join('users', 'pengantars.userId', '=', 'users.id')
            ->select('pengantars.*', 'penduduk.*', 'users.*')
            ->get();
        return view('page.datapengantar', ['data' => $data]);
    }

    public function dataKeterangan(){
        $data = DB::table('keterangans')
            ->join('penduduk', 'keterangans.nik', '=', 'penduduk.nik')
            ->join('users', 'keterangans.userId', '=', 'users.id')
            ->select('keterangans.*', 'penduduk.*', 'users.*')
            ->get();
        return view('page.dataketerangan', ['data' => $data]);
    }

    /*
     * reprint laporan
     */

    public function reprintSet(Request $request){
        $request->session()->forget('nik', 'nomorSurat');
        $request->session()->put([
            'nik' => $request->nik,
            'nomorSurat' => $request->nomorSurat,
        ]);

        return response()->json();
    }

    public function callReprint(){
        return view('pdf.reprint');
    }

    public function periodeSurat(){
        return view('pdf.periode');
    }

    public function allSurat(Request $request){
        $tgl1 = \DateTime::createFromFormat('d-m-Y', $request->tgl1)->format('Y-m-d');
        $tgl2 = \DateTime::createFromFormat('d-m-Y', $request->tgl2)->format('Y-m-d');
        $request->session()->put([
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);
        $request->session()->forget('tgl1', 'tgl2');
        $request->session()->put([
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);

        return response()->json();
    }

    public function dataSurat(){
        return view('pdf.allsurat');
    }

    public function kritikSaran(){
        return view('pdf.periodesr');
    }

    public function allKritikSaran(Request $request){
        $tgl1 = \DateTime::createFromFormat('d-m-Y', $request->tgl1)->format('Y-m-d');
        $tgl2 = \DateTime::createFromFormat('d-m-Y', $request->tgl2)->format('Y-m-d');
        $request->session()->put([
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);
        $request->session()->forget('tgl1', 'tgl2');
        $request->session()->put([
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);

        return response()->json();
    }

    public function dataKritikSaran(){
        return view('pdf.allkritiksaran');
    }

}
