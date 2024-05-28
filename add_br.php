
<?php
///////////// ข้อมูลการเบิกอุปกรณ์ ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['bor_id']) && isset($_POST['bor_name']) && isset($_POST['id']) && isset($_POST['bor_amount']) && isset($_POST['bor_date'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $bor_id = $_POST['bor_id'];
    $bor_name = $_POST['bor_name'];
    $id = $_POST['id'];
    $bor_amount = $_POST['bor_amount'];
    $bor_date = $_POST['bor_date'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO borrow (bor_id,bor_name,id,bor_amount,bor_date)
    VALUES (:bor_id,:bor_name,:id,:bor_amount,:bor_date)");
    $stmt->bindParam(':bor_id', $bor_id, PDO::PARAM_STR);
    $stmt->bindParam(':bor_name', $bor_name, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':bor_amount', $bor_amount , PDO::PARAM_STR);
    $stmt->bindParam(':bor_date', $bor_date, PDO::PARAM_STR);
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
                  window.location = "borrow.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "borrow.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

