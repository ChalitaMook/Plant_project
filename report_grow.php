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
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลปลูกพืช'),0,1,'C'); 
$pdf->Cell(0,10,iconv('utf-8','cp874','โครงการแปลงผักเพื่อชุมชน'),0,1,'C'); 

//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM grow_v");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(55,$h_head,iconv('utf-8','cp874','รหัสการปลูก'),1,0,'C');
$pdf->Cell(55,$h_head,iconv('utf-8','cp874','รหัสผู้ใช้งาน'),1,0,'C');
$pdf->Cell(55,$h_head,iconv('utf-8','cp874','รหัสพันธุ์พืช'),1,0,'C');
$pdf->Cell(55,$h_head,iconv('utf-8','cp874','จำนวนที่ปลูก'),1,0,'C');
$pdf->Cell(55,$h_head,iconv('utf-8','cp874','วันที่ปลูก'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(55,10,iconv('utf-8','cp874',$k['grow_id']),1,0,'C'); 
$pdf->Cell(55,10,iconv('utf-8','cp874',$k['id']),1,0,'C');
$pdf->Cell(55,10,iconv('utf-8','cp874',$k['plant_id']),1,0,'C');
$pdf->Cell(55,10,iconv('utf-8','cp874',$k['grow_amount']),1,0,'C');
$pdf->Cell(55,10,iconv('utf-8','cp874',$k['grow_date']),1,1,'C');
}
$pdf->output();
?>