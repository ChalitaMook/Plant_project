<?php
////////////////// อนุมัติการเบิกงบประมาณ
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['dis_status'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$dis_status = $_POST['dis_status'];
//sql update
$stmt = $conn->prepare("UPDATE budget_dis SET id=:id,dis_type=:dis_type,dis_amount=:dis_amount,dis_date=:dis_date,dis_details=:dis_details,dis_status=:dis_status WHERE dis_id=:dis_id");
$stmt->bindParam(':dis_id', $dis_id, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':dis_type', $dis_type, PDO::PARAM_STR);
$stmt->bindParam(':dis_amount', $dis_amount , PDO::PARAM_STR);
$stmt->bindParam(':dis_date', $dis_date, PDO::PARAM_STR);
$stmt->bindParam(':dis_details', $dis_details, PDO::PARAM_STR);
$stmt->bindParam(':dis_status', $dis_status, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "อนุมัติสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "d_budget.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "d_budget.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>
