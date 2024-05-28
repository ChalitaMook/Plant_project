<?php
////////////////// ข้อมูลตารางเวร ฝั่งคนงานบันทึก
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['id'])&& isset($_POST['amount'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$amount = $_POST['amount'];
$ass_status= "เสร็จสิ้น";


//sql update
$stmt = $conn->prepare("UPDATE  assign SET amount=:amount,ass_status=:ass_status WHERE id=:id");
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
$stmt->bindParam(':ass_status', $ass_status, PDO::PARAM_STR);
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
                  title: "บันทึกการทำงานเสร็จสิ้น",
                  type: "success"
              }, function() {
                  window.location = "work_s.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "work_s.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    
$conn = null; //close connect db
} //isset
?>