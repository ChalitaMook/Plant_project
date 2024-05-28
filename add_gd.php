
<?php
///////////// ข้อมูลเบิกพันธุ์พืช ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['id']) && isset($_POST['id_d']) && isset($_POST['p_id']) && isset($_POST['p_name']) && isset($_POST['amount_d']) && isset($_POST['date_d'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $id = $_POST['id'];
    $id_d = $_POST['id_d'];
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $amount_d = $_POST['amount_d'];
    $date_d = $_POST['date_d'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO d_plants (id,id_d,p_id,p_name,amount_d,date_d)
    VALUES (:id,:id_d,:p_id,:p_name,:amount_d,:date_d)");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':id_d', $id_d, PDO::PARAM_STR);
    $stmt->bindParam(':p_id', $p_id, PDO::PARAM_STR);
    $stmt->bindParam(':p_name', $p_name, PDO::PARAM_STR);
    $stmt->bindParam(':amount_d', $amount_d , PDO::PARAM_STR);
    $stmt->bindParam(':date_d', $date_d, PDO::PARAM_STR);
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
                  window.location = "d_plants.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "d_plants.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

