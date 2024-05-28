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
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลระบบ'),0,1,'C'); 
//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM system");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','วันที่ก่อตั้งโครงการ'),1,0,'C');
$pdf->Cell(60,$h_head,iconv('utf-8','cp874','ชื่อผู้นำโครงการ'),1,0,'C');
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','เบอร์โทร'),1,0,'C'); 
$pdf->Cell(120,$h_head,iconv('utf-8','cp874','ที่ตั้งโครงการ'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['sys_date']),1,0,'C'); 
$pdf->Cell(60,10,iconv('utf-8','cp874',$k['user_first']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['sys_tel']),1,0,'C');
$pdf->Cell(120,10,iconv('utf-8','cp874',$k['sys_add']),1,1,'C');
}
$pdf->output();
?>