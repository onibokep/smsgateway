<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('penduduk')
            ->get();
        return view('page.showdata', ['penduduk' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new Penduduk();
        $db->nik = $request->nik;
        $db->nama = $request->nama;
        $db->tmlahir = $request->tmlahir;
        $tgl = \DateTime::createFromFormat('d-m-Y', $request->tglahir);
        $tglahir = $tgl->format('Y-m-d'); //konversi string to date format
        $db->tglahir = $tglahir;
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

        $db->save();

        return response()->json($db);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editP(Request $request)
    {
        $record = Penduduk::where('nik', $request->nik)->get();
        foreach ($record as $data){
            $date = new \DateTime($request->tglahir);
            $tgl = $date->format('d-m-Y');
            $d = [
                'nama' => ucfirst($data->nama),
                'tmlahir' => ucfirst($data->tmlahir),
                'tglahir' => $tgl,
                'kelamin' => $data->kelamin,
                'status' => $data->status,
                'telp' => $data->telp,
                'alamat' => ucfirst($data->alamat),
                'rt' => $data->rt,
                'rw' => $data->rw,
                'desa' => $data->desa,
                'kecamatan' => $data->kecamatan,
                'kabupaten' => $data->kabupaten,
                'provinsi'  => $data->provinsi,
                'agama' => ucfirst($data->agama),
                'pekerjaan' => $data->pekerjaan,
                'kwn' => strtoupper($data->kewarganegaraan),
                'keterangan' =>$data->keterangan,

            ];
        }
        return response()->json($d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateP(Request $request)
    {
        $tgl = \DateTime::createFromFormat('d-m-Y', $request->tglahir);
        $tglahir = $tgl->format('Y-m-d'); //konversi string to date format
        $db = Penduduk::where('nik', $request->nik)
            ->update([
                'nama'  => $request->nama,
                'tmlahir'   => $request->tmlahir,
                'tglahir'   => $tglahir,
                'kelamin'   => $request->kelamin,
                'status'    => $request->status,
                'agama'     => $request->agama,
                'telp'      => $request->telp,
                'pekerjaan' => $request->pekerjaan,
                'alamat'    => $request->alamat,
                'rt'        => $request->rt,
                'rw'        => $request->rw,
                'desa'      => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi'  => $request->provinsi,
                'kewarganegaraan'   => $request->kwn,
                'keterangan'    => $request->keterangan,
            ]);
        return response()->json();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
