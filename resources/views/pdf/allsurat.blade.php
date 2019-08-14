@php

use Illuminate\Support\Facades\DB;

$pdf = new Fpdf();

$pdf::Addpage();
$pdf::Image(asset('/images/tgr.png'),20,6,27);
$pdf::SetFont('Times','',14);
$pdf::Cell(90);
$pdf::Cell(30,7,'PEMERINTAH KABUPATEN TANGERANG',0,1,'C');
$pdf::SetFont('Times','',14);
$pdf::Cell(90);
$pdf::Cell(30,7,'KECAMATAN RAJEG',0,1,'C');
$pdf::SetFont('Times','B',18);
$pdf::Cell(90);
$pdf::Cell(30,7,'SEKERTARIAT DESA SUKAMANAH',0,1,'C');

$pdf::SetFont('Times','',10);
$pdf::Cell(90);
$pdf::Cell(30,7,'Jl. Raya Kukun Daon, Kec. Rajeg Kab.Tangerang - Banten 15540',0,0,'C');

$pdf::Ln(15);
$pdf::Line(10, 41, 200, 41);
$pdf::Line(10, 42, 200, 42);

$keterangan = DB::table('keterangans')
                 ->whereBetween('created_at', [session('tgl1'), session('tgl2')]);

$surat = DB::table('pengantars')
            ->whereBetween('created_at', [session('tgl1'), session('tgl2')])
            ->union($keterangan)
            ->get();

$pdf::SetFont('Times','B',12);
$pdf::Cell(40,10,'Tanggal Surat',0,0,'C');
$pdf::Cell(40,10,'Nomor Surat',0,0);
$pdf::Cell(60,10,'Pemohon',0,0);
$pdf::Cell(50,10,'Pembuat Surat',0,1,'C');

$pdf::SetFont('Times','',11);
foreach ($surat as $data){

    $created = \DateTime::createFromFormat('Y-m-d h:i:s', $data->created_at)->format('d-m-Y');
    $pdf::Cell(40,10,$created,0,0,'C');
    $pdf::Cell(40,10,$data->nomorSurat,0,0);

    $penduduk = DB::table('penduduk')
                    ->where('nik', '=', $data->nik)
                    ->get();

    foreach ($penduduk as $d){
        $pdf::Cell(60,10,ucfirst($d->nama) ,0,0);
    }

    $user = DB::table('users')
                ->where('id', '=', $data->userId)
                ->get();

    foreach ($user as $users){
        $pdf::Cell(50,10,ucfirst($users->name) ,0,1,'C');
    }
}

$pdf::Output();
exit();

@endphp