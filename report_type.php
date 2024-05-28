<?php
//require('connect.php');
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
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลประเภทพันธุ์พืช'),0,1,'C'); 


//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM tb_type");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(135,$h_head,iconv('utf-8','cp874','รหัสประเภท'),1,0,'C');
$pdf->Cell(135,$h_head,iconv('utf-8','cp874','ชื่อประเภท'),1,1,'C');
//$pdf->Cell(90,$h_head,iconv('utf-8','cp874','รายละเอียด'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(135,10,iconv('utf-8','cp874',$k['type_id']),1,0,'C'); 
$pdf->Cell(135,10,iconv('utf-8','cp874',$k['type_name']),1,1,'C');
//$pdf->Cell(90,10,iconv('utf-8','cp874',$k['type_details']),1,1,'C');
}
$pdf->output();
?>