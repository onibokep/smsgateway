@php

use App\Penduduk;

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
$pdf::SetFont('Times','BU',14);
$pdf::Cell(0,5,'SURAT PENGANTAR',0,1,'C');
$pdf::SetFont('Times','',12);
$pdf::Cell(0,5,'No : '.session('nomorSkck').'/'.date('m').'/'.date('Y').'/SKCK',0,1,'C');
$pdf::Ln(5);

$st = 'Yang bertanda tangan dibawah ini Kepala Desa Sukamanah, menerangkan bahwa :';
$pdf::Cell(10,10);
$pdf::Cell(50,10,$st,0,1,'');

$nik = session('nik');

$id = Penduduk::where('nik', $nik)->get();
foreach ($id as $data){
    $nama = $data->nama;
    $al = $data->alamat.', Rt/Rw. '.$data->rt.'/'.$data->rw.', Ds. '.$data->desa.', Kec. '.$data->kecamatan.', Kab.'.$data->kabupaten;
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
    $tl = $data->tglahir;
    $tglahir = strftime('%d-%B-%Y', strtotime($tl));
    $ttl = $data->tmlahir.', '.$tglahir;
    $kelamin = $data->kelamin;
    $status = $data->status;
}
$pdf::Cell(10,10);
$pdf::Cell(50,10,'Nama ',0,0,'');
$pdf::Cell(0, 10," : ".ucfirst($nama), 0, 1);



$pdf::Cell(10,10);
$pdf::Cell(50,10,'Tempat / Tgl. Lahir ',0,0,'');
$pdf::Cell(0, 10,' : '.ucfirst($ttl), 0, 1);

$pdf::Cell(10,10);
$pdf::Cell(50,10,'Jenis Kelamin ',0,0,'');
$pdf::Cell(0, 10," :  ".$kelamin, 0, 1);

$pdf::Cell(10,10);
$pdf::Cell(50,10,'Status ',0,0,'');
$pdf::Cell(0, 10," :  ".$status, 0, 1);

$pdf::Cell(10,10);
$pdf::Cell(50,10,'Tempat tinggal ',0,0,'');
$pdf::Cell(0, 10," :  ".ucfirst($al), 0, 1);

$ed = 'Benar adalah warga kami, dan selama tinggal di Desa Sukamanah warga tersebut berkelakuan baik';
$ed2 = 'dan tidak pernah terlibat tindak pidana yang melanggar undang-undang yang berlaku.';

$pdf::Cell(10,10);
$pdf::Cell(50,10,$ed,0,1,'');
$pdf::Cell(10,10);
$pdf::Cell(50,10,$ed2,0,1,'');

$pdf::Ln(30);
$pdf::Cell(135,5,'',0,0,'');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
$pdf::Cell(0,4,'Tangerang, '.strftime('%d-%B-%Y'),0,1,'L');
$pdf::Cell(135,10,'',0,0,'');
$pdf::Cell(0,10,'Kepala Desa,',0,1,'L');
$pdf::Ln(20);
$pdf::SetFont('Times','U',12);
$pdf::Cell(135,10,'',0,0,'');
$pdf::Cell(0,7,config('app.lurah'),0,1,'L');
$pdf::SetFont('Times','',12);
$pdf::Cell(135,10,'',0,0,'');
$pdf::Cell(10,4,'NIP : ',0,0,'L');
$pdf::Cell(30,4,config('app.nip'),0,0,'L');

$pdf::Output();
exit();

@endphp