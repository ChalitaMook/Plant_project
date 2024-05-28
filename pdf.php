<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->Addpage('L');
$pdf->Addfont('Sarabun','','THSarabunNew.php');
$pdf->Addfont('Sarabun','B','THSarabunNew Bold.php');

$pdf->Image('icon/logo.png',130,5,30);
$pdf->ln();
$pdf->SetFont('Sarabun','B',20);
$pdf->SetY(38);
$pdf->Cell(0,10,iconv('utf-8','cp874','การรายงานเอกสารให้เป็น PDF'),0,1,'C'); 

$pdf->SetFont('Sarabun','',16);
$h_head=8;
$pdf->Cell(25,$h_head,iconv('utf-8','cp874','รหัสผู้ใช้งาน'),1,0,'C');
$pdf->Cell(40,$h_head,iconv('utf-8','cp874','อีเมล'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','รหัสผ่าน'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','ชื่อ'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','นามสกุล'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','เบอร์โทร'),1,0,'C');
$pdf->Cell(70,$h_head,iconv('utf-8','cp874','ที่อยู่'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','สถานะ'),1,1,'C');

$h=7.3;
for($i=1;$i<=30;$i++){
$pdf->Cell(25,$h,iconv('utf-8','cp874',$i),1,0,'C');
$pdf->Cell(40,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(30,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(30,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(30,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(30,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(70,$h,iconv('utf-8','cp874',''),1,0,'C');
$pdf->Cell(30,$h,iconv('utf-8','cp874',''),1,1,'C');
}


$pdf->output();
?>