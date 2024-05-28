
<?php
///////////// ข้อมูลผู้ใช้งาน ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['user_email']) && isset($_POST['user_pass']) && isset($_POST['user_first']) && isset($_POST['user_last']) && isset($_POST['user_tel']) && isset($_POST['user_add'])&& isset($_POST['user_status'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_first = $_POST['user_first'];
    $user_last = $_POST['user_last'];
    $user_tel = $_POST['user_tel'];
    $user_add = $_POST['user_add'];
    $user_status = $_POST['user_status'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO user (id, user_email,user_pass,user_first,user_last,user_tel,user_add,user_status)
    VALUES (:id,:user_email,:user_pass,:user_first,:user_last,:user_tel,:user_add,:user_status)");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':user_pass', $user_pass , PDO::PARAM_STR);
    $stmt->bindParam(':user_first', $user_first , PDO::PARAM_STR);
    $stmt->bindParam(':user_last', $user_last, PDO::PARAM_STR);
    $stmt->bindParam(':user_tel', $user_tel , PDO::PARAM_STR);
    $stmt->bindParam(':user_add', $user_add, PDO::PARAM_STR);
    $stmt->bindParam(':user_status', $user_status, PDO::PARAM_STR);
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
                  window.location = "form_user.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "form_user.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>

