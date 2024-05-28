
<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['plant_name']) && isset($_POST['plant_age']) && isset($_POST['type_name']) && isset($_POST['plant_details'])){

        //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $img_file = (isset($_POST['plant_pic']) ? $_POST['plant_pic'] : '');
    $upload=$_FILES['plant_pic']['name'];
 
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['plant_pic']['name'],".");
 
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpeg' || $typefile  =='.png'){
 
    //โฟลเดอร์ที่เก็บไฟล์
    $path="image/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['plant_pic']['tmp_name'],$path_copy); 
 
    
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $plant_name = $_POST['plant_name'];
    $plant_age = $_POST['plant_age'];
    $type_name = $_POST['type_name'];
    $plant_details = $_POST['plant_details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO plants (plant_id, plant_name,plant_age,type_name,plant_details,plant_pic)
    VALUES (:plant_id,:plant_name,:plant_age,:type_name,:plant_details,'$newname')");
    $stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
    $stmt->bindParam(':plant_name', $plant_name, PDO::PARAM_STR);
    $stmt->bindParam(':plant_age', $plant_age , PDO::PARAM_STR);
    $stmt->bindParam(':type_name', $type_name , PDO::PARAM_STR);
    $stmt->bindParam(':plant_details', $plant_details, PDO::PARAM_STR);
    $result = $stmt->execute();
     // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
}} // if($upload !='') 
    if($conn){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "plants.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "plants.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }


    $conn = null; //close connect db
    } //isset
    ?>

