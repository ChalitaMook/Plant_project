
<?php
///////////// ข้อมูลรับงบประมาณ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['bud_id']) && isset($_POST['id']) && isset($_POST['bud_type'])&& isset($_POST['bud_amount'])&& isset($_POST['bud_date']) && isset($_POST['bud_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $bud_id = $_POST['bud_id'];
    $id = $_POST['id'];
    $bud_type = $_POST['bud_type'];
    $bud_amount = $_POST['bud_amount'];
    $bud_date = $_POST['bud_date'];
    $bud_details = $_POST['bud_details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO g_budget (bud_id,id,bud_type,bud_amount,bud_date,bud_details)
    VALUES (:bud_id,:id,:bud_type,:bud_amount,:bud_date,:bud_details)");
    $stmt->bindParam(':bud_id', $bud_id, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id , PDO::PARAM_STR);
    $stmt->bindParam(':bud_type', $bud_type , PDO::PARAM_STR);
    $stmt->bindParam(':bud_amount', $bud_amount, PDO::PARAM_STR);
    $stmt->bindParam(':bud_date', $bud_date, PDO::PARAM_STR);
    $stmt->bindParam(':bud_details', $bud_details, PDO::PARAM_STR);
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
                  window.location = "g_budget.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "g_budget.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

