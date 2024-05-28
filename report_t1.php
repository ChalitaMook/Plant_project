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

$pdf->Cell(0,10,iconv('utf-8','cp874','รายงาน ณ วันที่ 2024-04-28'),10,1,'R'); //วันที่สั่งพิมพ์
$pdf->Cell(0,10,iconv('utf-8','cp874','โครงการแปลงผักเพื่อชุมชน วัดโพนเลา บ้านเหล่า'),0,1,'L'); 
$pdf->Cell(0,10,iconv('utf-8','cp874','ที่อยู่ 1234'),0,1,'L'); //แก้เอา
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานข้อมูลบันทึกการทำงาน test1'),0,1,'C');
$pdf->Cell(0,10,iconv('utf-8','cp874','รายงานวันที่ : 2024-02-10 '),0,1,'L'); //วันที่เลือกให้แสดงในรายงาน

//$user= "SELECT * FROM `user`";
//$query_user=mysqli_query($conn,$user);
//$rs_user=mysqli_fetch_assoc($query_user);


//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT user.user_first, assign.id,assign.ass_date,assign.ass_details,assign.ass_status,p_area.area_id
                                ,p_area.area_name,assign.amount  FROM assign 
                                JOIN user ON assign.user_id = user.id
                                JOIN p_area ON assign.area_id = p_area.area_id
                                ORDER BY assign.ass_status asc");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k) 


$pdf->SetFont('Sarabun','B',16);
$h_head=8;
$pdf->Cell(45,$h_head,iconv('utf-8','cp874','คนเข้าเวร'),1,0,'C');
$pdf->Cell(30,$h_head,iconv('utf-8','cp874','โซน'),1,0,'C');
$pdf->Cell(35,$h_head,iconv('utf-8','cp874','วันที่'),1,0,'C');
$pdf->Cell(60,$h_head,iconv('utf-8','cp874','งานที่มอบหมาย'),1,0,'C');
$pdf->Cell(60,$h_head,iconv('utf-8','cp874','รายละเอียดงาน'),1,0,'C');
$pdf->Cell(50,$h_head,iconv('utf-8','cp874','สถานะ'),1,1,'C');

$pdf->SetFont('Sarabun','',16);
$h=7.3;
foreach($result as $k){
$pdf->Cell(45,10,iconv('utf-8','cp874',$k['user_first']),1,0,'C');
$pdf->Cell(30,10,iconv('utf-8','cp874',$k['area_name']),1,0,'C');
$pdf->Cell(35,10,iconv('utf-8','cp874',$k['ass_date']),1,0,'C');
$pdf->Cell(60,10,iconv('utf-8','cp874',$k['ass_details']),1,0,'C');
$pdf->Cell(60,10,iconv('utf-8','cp874',$k['amount']),1,0,'C');
$pdf->Cell(50,10,iconv('utf-8','cp874',$k['ass_status']),1,1,'C');

}
//จำนวนสถานะ
$pdf->Cell(0,7,iconv('utf-8','cp874','จำนวนสถานะ:เสร็จสิ้น : 1'),10,1,'R'); 
$pdf->Cell(0,7,iconv('utf-8','cp874','จำนวนสถานะ:กำลังดำเนินการ : 2'),10,1,'R'); 
$pdf->Cell(0,7,iconv('utf-8','cp874','จำนวนสถานะ:ยกเลิก : 3'),10,1,'R'); 


$pdf->output();
ob_end_flush();
?>