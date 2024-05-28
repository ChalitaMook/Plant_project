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
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลผู้ใช้งาน'),0,1,'C'); 

//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT* FROM user");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','รหัสผู้ใช้งาน'),1,0,'C');
//$pdf->Cell(40,$h_head,iconv('utf-8','cp874','อีเมล'),1,0,'C');
//$pdf->Cell(30,$h_head,iconv('utf-8','cp874','รหัสผ่าน'),1,0,'C');
$pdf->Cell(40,$h_head,iconv('utf-8','cp874','ชื่อ'),1,0,'C');
$pdf->Cell(40,$h_head,iconv('utf-8','cp874','นามสกุล'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','เบอร์โทร'),1,0,'C');
$pdf->Cell(100,$h_head,iconv('utf-8','cp874','ที่อยู่'),1,0,'C');
$pdf->Cell(35,$h_head,iconv('utf-8','cp874','สถานะ'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(30,10,iconv('utf-8','cp874',$k['id']),1,0,'C'); 
//$pdf->Cell(40,10,iconv('utf-8','cp874',$k['user_email']),1,0,'C');
//$pdf->Cell(30,10,iconv('utf-8','cp874',$k['user_pass']),1,0,'C');
$pdf->Cell(40,10,iconv('utf-8','cp874',$k['user_first']),1,0,'C');
$pdf->Cell(40,10,iconv('utf-8','cp874',$k['user_last']),1,0,'C');
$pdf->Cell(30,10,iconv('utf-8','cp874',$k['user_tel']),1,0,'C');
$pdf->Cell(100,10,iconv('utf-8','cp874',$k['user_add']),1,0,'C');
$pdf->Cell(35,10,iconv('utf-8','cp874',$k['user_status']),1,1,'C');
}
$pdf->output();
?>