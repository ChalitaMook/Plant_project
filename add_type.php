<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['type_name']) && isset($_POST['type_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $type_name = $_POST['type_name'];
    $type_details = $_POST['type_details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tb_type (type_id,type_name,type_details)
    VALUES (:type_id,:type_name,:type_details)");
    $stmt->bindParam(':type_id', $type_id, PDO::PARAM_STR);
    $stmt->bindParam(':type_name', $type_name, PDO::PARAM_STR);
    $stmt->bindParam(':type_details', $type_details , PDO::PARAM_STR);
    $result = $stmt->execute();
     // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

