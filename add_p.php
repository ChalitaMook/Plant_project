
<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['area_name']) && isset($_POST['area_amount'])&& isset($_POST['area_size'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $area_name = $_POST['area_name'];
    $area_amount = $_POST['area_amount'];
    $area_size = $_POST['area_size'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO p_area (area_id,area_name,area_amount,area_size)
    VALUES (:area_id,:area_name,:area_amount,:area_size)");
    $stmt->bindParam(':area_id', $area_id, PDO::PARAM_STR);
    $stmt->bindParam(':area_name', $area_name, PDO::PARAM_STR);
    $stmt->bindParam(':area_amount', $area_amount, PDO::PARAM_STR);
    $stmt->bindParam(':area_size', $area_size, PDO::PARAM_STR);
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
                  window.location = "p_area.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "p_area.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

