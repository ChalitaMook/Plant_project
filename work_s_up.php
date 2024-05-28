<?php 
//////////////// ข้อมูลตารางเวร /////////////////
if(isset($_GET['id'])){
require_once 'connect.php';
//ประกาศตัวแปรรับค่าจาก param method get
$id = $_GET['id'];
$ass_status= 'ยกเลิก';
$stmt = $conn->prepare("UPDATE  assign SET ass_status=:ass_status WHERE id=:id");
$stmt->bindParam(':ass_status', $ass_status, PDO::PARAM_STR);
$stmt->bindParam(':id', $id , PDO::PARAM_INT);
$stmt->execute();

//  sweet alert 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  if($stmt->rowCount() ==1){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ยกเลิกการทำงาน",
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
$conn = null;
} //isset
?>

