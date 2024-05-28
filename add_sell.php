
<?php
///////////// ข้อมูลการขายผลผลิต///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['id']) && isset($_POST['sell_type']) && isset($_POST['sell_amount']) && isset($_POST['sell_date']) && isset($_POST['sell_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $id = $_POST['id'];
    $sell_type = $_POST['sell_type'];
    $sell_amount = $_POST['sell_amount'];
    $sell_date = $_POST['sell_date'];
    $sell_details = $_POST['sell_details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO sell_pro (sell_id,id,sell_type,sell_amount,sell_date,sell_details)
    VALUES (:sell_id,:id,:sell_type,:sell_amount,:sell_date,:sell_details)");
    $stmt->bindParam(':sell_id', $sell_id, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':sell_type', $sell_type, PDO::PARAM_STR);
    $stmt->bindParam(':sell_amount', $sell_amount , PDO::PARAM_STR);
    $stmt->bindParam(':sell_date', $sell_date, PDO::PARAM_STR);
    $stmt->bindParam(':sell_details', $sell_details, PDO::PARAM_STR);
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
                  window.location = "sell_pro.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "sell_pro.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

