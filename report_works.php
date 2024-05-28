<?php
//require('connect.php');
ob_start();
require('fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->Addpage('L');
$pdf->Addfont('Sarabun','','THSarabunNew.php');
$pdf->Addfont('Sarabun','B','THSarabunNew Bold.php');

$pdf->Image('icon/โลโก้.png',130,5,30);
$pdf->ln();
$pdf->SetFont('Sarabun','B',20);
$pdf->SetY(38); 
$pdf->Cell(0,10,iconv('utf-8','cp874','โครงการแปลงผักเพื่อชุมชน วัดโพนเลา บ้านเหล่า'),0,1,'C'); 
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลตารางเวร'),0,1,'C');
//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT user.user_first, assign.id,assign.ass_date,assign.ass_details,p_area.area_id
                                ,p_area.area_zone,assign.amount  FROM assign
                                JOIN user ON assign.user_id = user.id
                                JOIN p_area ON assign.area_id = p_area.area_id");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(35,$h_head,iconv('utf-8','cp874','รหัสเวร'),1,0,'C');
$pdf->Cell(60,$h_head,iconv('utf-8','cp874','เวรแปลง'),1,0,'C');
$pdf->Cell(40,$h_head,iconv('utf-8','cp874','โซนแปลง'),1,0,'C');
$pdf->Cell(45,$h_head,iconv('utf-8','cp874','วันที่'),1,0,'C');
$pdf->Cell(45,$h_head,iconv('utf-8','cp874','มอบหมายงาน'),1,0,'C');
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','รายละเอียดงาน'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(35,10,iconv('utf-8','cp874',$k['id']),1,0,'C'); 
$pdf->Cell(60,10,iconv('utf-8','cp874',$k['user_first']),1,0,'C');
$pdf->Cell(40,10,iconv('utf-8','cp874',$k['area_zone']),1,0,'C');
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['ass_date']),1,0,'C');
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['ass_details']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['amount']),1,1,'C');

}
$pdf->output();
ob_end_flush();
?>