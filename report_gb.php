<?php
//require('connect.php');
require('fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->Addpage('L');
$pdf->Addfont('Sarabun','','THSarabunNew.php');
$pdf->Addfont('Sarabun','B','THSarabunNew Bold.php');

$pdf->Image('icon/logo.png',130,5,30);
$pdf->ln();
$pdf->SetFont('Sarabun','B',20);
$pdf->SetY(38);
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลรายรับ'),0,1,'C'); 
$pdf->Cell(0,10,iconv('utf-8','cp874','โครงการแปลงผักเพื่อชุมชน'),0,1,'C'); 

//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM g_budget");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(45,$h_head,iconv('utf-8','cp874','รหัสรับงบประมาณ'),1,0,'C');
$pdf->Cell(45,$h_head,iconv('utf-8','cp874','รหัสผู้ใช้งาน'),1,0,'C');
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','วันที่รับเงิน'),1,0,'C');
$pdf->Cell(90,$h_head,iconv('utf-8','cp874','แหล่งที่มา'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['bud_id']),1,0,'C'); 
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['id']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['bud_amount']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['bud_date']),1,0,'C');
$pdf->Cell(90,10,iconv('utf-8','cp874',$k['bud_details']),1,1,'C');
}

require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM sell_pro");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['sell_id']),1,0,'C'); 
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['id']),1,0,'C'); 
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['sell_amount']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['sell_date']),1,0,'C');
$pdf->Cell(90,10,iconv('utf-8','cp874',$k['sell_details']),1,1,'C');
}

$pdf->output();
?>