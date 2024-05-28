
<?php
///////////// ข้อมูลรับพันธุ์พืช ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['id']) && isset($_POST['id_g']) && isset($_POST['p_id']) && isset($_POST['p_name'])
    && isset($_POST['type_g']) && isset($_POST['amount_g'])&& isset($_POST['ng_g']) && isset($_POST['date_g'])&& isset($_POST['details_g'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $id = $_POST['id'];
    $id_g = $_POST['id_g'];
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $type_g = $_POST['type_g'];
    $amount_g = $_POST['amount_g'];
    $ng_g = $_POST['ng_g'];
    $date_g = $_POST['date_g'];
    $details_g = $_POST['details_g'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO g_plants (id,id_g,p_id,p_name,type_g,amount_g,ng_g,date_g,details_g)
    VALUES (:id,:id_g,:p_id,:p_name,:type_g,:amount_g,:ng_g,:date_g,:details_g)");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':id_g', $id_g, PDO::PARAM_STR);
    $stmt->bindParam(':p_id', $p_id, PDO::PARAM_STR);
    $stmt->bindParam(':p_name', $p_name, PDO::PARAM_STR);
    $stmt->bindParam(':type_g', $type_g , PDO::PARAM_STR);
    $stmt->bindParam(':amount_g', $amount_g , PDO::PARAM_STR);
    $stmt->bindParam(':ng_g', $ng_g , PDO::PARAM_STR);
    $stmt->bindParam(':date_g', $date_g, PDO::PARAM_STR);
    $stmt->bindParam(':details_g', $details_g, PDO::PARAM_STR);
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
                  window.location = "g_plants.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "g_plants.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

