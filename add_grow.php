
<?php
///////////// ข้อมูลการปลูกพืช ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['plant_id']) && isset($_POST['grow_amount']) && isset($_POST['grow_date']) && isset($_POST['area_id'])&& isset($_POST['user_id'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $user_id = $_POST['user_id'];
    $plant_id = $_POST['plant_id'];
    $grow_amount = $_POST['grow_amount'];
    $grow_date = $_POST['grow_date'];
    $area_id = $_POST['area_id'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO grow_v (grow_id,plant_id,grow_amount,grow_date,area_id,user_id)
    VALUES (:grow_id,:plant_id,:grow_amount,:grow_date,:area_id,:user_id)");
    $stmt->bindParam(':grow_id', $grow_id, PDO::PARAM_STR);
    $stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
    $stmt->bindParam(':grow_amount', $grow_amount , PDO::PARAM_STR);
    $stmt->bindParam(':grow_date', $grow_date, PDO::PARAM_STR);
    $stmt->bindParam(':area_id', $area_id, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
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
                  window.location = "grow_v.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "grow_v.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

