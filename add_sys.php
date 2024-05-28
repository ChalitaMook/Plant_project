<?php
///////////// ข้อมูลระบบ ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['sys_name']) && isset($_POST['sys_tel']) && isset($_POST['sys_add'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $img_file = (isset($_POST['sys_pic']) ? $_POST['sys_pic'] : '');
    $upload=$_FILES['sys_pic']['name'];
 
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['sys_pic']['name'],".");
 
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpeg' || $typefile  =='.png'){
 
    //โฟลเดอร์ที่เก็บไฟล์
    $path="image/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['sys_pic']['tmp_name'],$path_copy); 
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $sys_name = $_POST['sys_name'];
    $sys_tel = $_POST['sys_tel'];
    $sys_add = $_POST['sys_add'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO system (sys_date,sys_name,sys_tel,sys_add,sys_pic)
    VALUES (:sys_date,:sys_name,:sys_tel,:sys_add,'$newname')");
    $stmt->bindParam(':sys_date', $sys_date, PDO::PARAM_STR);
    $stmt->bindParam(':sys_name', $sys_name , PDO::PARAM_STR);
    $stmt->bindParam(':sys_tel', $sys_tel , PDO::PARAM_STR);
    $stmt->bindParam(':sys_add', $sys_add, PDO::PARAM_STR);
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
                  window.location = "system.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "system.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    }
 }
 } //isset
    ?>

