@php

use Illuminate\Support\Facades\DB;

$pdf = new \App\PDF();
$pdf->AddPage();
$pdf->Image(asset('/images/tgr.png'),20,6,27);
$pdf->SetFont('Times','',14);
$pdf->Cell(90);
$pdf->Cell(30,7,'PEMERINTAH KABUPATEN TANGERANG',0,1,'C');
$pdf->Cell(90);
$pdf->Cell(30,7,'KECAMATAN RAJEG',0,1,'C');
$pdf->SetFont('Times','',18);
$pdf->Cell(90);
$pdf->Cell(30,7,'SEKERTARIAT DESA SUKAMANAH',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(90);
$pdf->Cell(30,7,'Jl. Raya Kukun Daon, Kec. Rajeg Kab.Tangerang - Banten 15540',0,0,'C');

$pdf->Ln(15);
$pdf->Line(10, 41, 200, 41);
$pdf->Line(10, 42, 200, 42);

$ks = DB::table('inbox')
            ->whereBetween('ReceivingDateTime', [session('tgl1'), session('tgl2')])
            ->Where('TextDecoded', 'like', 'KS%')
            ->get();

$pdf->SetFont('Times','',11);
foreach ($ks as $data){

    //$receive = \DateTime::createFromFormat('Y-m-d h:i:s', $data->ReceivingDateTime)->format('d-m-Y');

    $text = $data->TextDecoded;
    $pdf->Write(5,"Waktu     : ".$data->ReceivingDateTime."\n");
    $pdf->Write(5,"Pengirim : ".$data->SenderNumber."\n");

    $pdf->WordWrap($text,170);
    $pdf->Write(5,"Pesan      : ".$text."\n\n");

}

$pdf->Output();
exit();

@endphp