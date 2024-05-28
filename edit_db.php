<?php
////////////////// ข้อมูลผู้ใช้งาน
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['user_email']) && isset($_POST['user_pass']) && isset($_POST['user_first']) && isset($_POST['user_last']) && isset($_POST['user_tel']) && isset($_POST['user_add'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
$user_first = $_POST['user_first'];
$user_last = $_POST['user_last'];
$user_tel = $_POST['user_tel'];
$user_add = $_POST['user_add'];
$user_status = $_POST['user_status'];
//sql update
$stmt = $conn->prepare("UPDATE user SET user_email=:user_email,user_pass=:user_pass, user_first=:user_first, user_last=:user_last, user_tel=:user_tel,user_add=:user_add,user_status=:user_status WHERE id=:id");
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':user_email', $user_email , PDO::PARAM_STR);
$stmt->bindParam(':user_pass', $user_pass , PDO::PARAM_STR);
$stmt->bindParam(':user_first', $user_first , PDO::PARAM_STR);
$stmt->bindParam(':user_last', $user_last , PDO::PARAM_STR);
$stmt->bindParam(':user_tel', $user_tel , PDO::PARAM_STR);
$stmt->bindParam(':user_add', $user_add , PDO::PARAM_STR);
$stmt->bindParam(':user_status', $user_status , PDO::PARAM_STR);

$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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

<?php
////////////////// ข้อมูลตารางเวร
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['id']) && isset($_POST['user_id']) 
 && isset($_POST['area_id']) && isset($_POST['ass_date']) && isset($_POST['ass_details'])
 && isset($_POST['plant_id'])&& isset($_POST['ass_status'])
    ){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$area_id = $_POST['area_id'];
$user_id = $_POST['user_id'];
$ass_date = $_POST['ass_date'];
$ass_details = $_POST['ass_details'];
$plant_id = $_POST['plant_id'];
$ass_status= $_POST['ass_status'];


//sql update
$stmt = $conn->prepare("UPDATE  assign SET user_id=:user_id, area_id=:area_id, ass_date=:ass_date, ass_details=:ass_details,plant_id=:plant_id,ass_status=:ass_status WHERE id=:id");
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':area_id', $area_id , PDO::PARAM_STR);
$stmt->bindParam(':user_id', $user_id , PDO::PARAM_STR);
$stmt->bindParam(':ass_date', $ass_date , PDO::PARAM_STR);
$stmt->bindParam(':ass_details', $ass_details , PDO::PARAM_STR);
$stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
$stmt->bindParam(':ass_status', $ass_status, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "assign.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "assign.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    
$conn = null; //close connect db
} //isset
?>


<?php
////////////////// ข้อมูลการปลูกพืช
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['grow_id']) && isset($_POST['plant_id']) && isset($_POST['grow_amount']) && isset($_POST['grow_date']) && isset($_POST['area_id'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$grow_id = $_POST['grow_id'];
$plant_id = $_POST['plant_id'];
$grow_amount = $_POST['grow_amount'];
$grow_date = $_POST['grow_date'];
$area_id = $_POST['area_id'];
//sql update
$stmt = $conn->prepare("UPDATE grow_v SET plant_id=:plant_id,grow_amount=:grow_amount
                        ,grow_date=:grow_date,area_id=:area_id WHERE grow_id=:grow_id");
$stmt->bindParam(':grow_id', $grow_id, PDO::PARAM_STR);
$stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
$stmt->bindParam(':grow_amount', $grow_amount , PDO::PARAM_STR);
$stmt->bindParam(':grow_date', $grow_date, PDO::PARAM_STR);
$stmt->bindParam(':area_id', $area_id, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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


<?php
////////////////// ข้อมูลการเก็บเกี่ยว
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['har_id'])&& isset($_POST['plant_id'])&& isset($_POST['area_id']) && isset($_POST['har_amount']) && isset($_POST['har_date'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$har_id = $_POST['har_id'];
$plant_id = $_POST['plant_id'];
$area_id = $_POST['area_id'];
$har_amount = $_POST['har_amount'];
$har_date = $_POST['har_date'];
//sql update
$stmt = $conn->prepare("UPDATE harvest SET plant_id=:plant_id,area_id=:area_id,har_amount=:har_amount,har_date=:har_date WHERE har_id=:har_id");
$stmt->bindParam(':har_id', $har_id, PDO::PARAM_STR);
$stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
$stmt->bindParam(':area_id', $area_id, PDO::PARAM_STR);
$stmt->bindParam(':har_amount', $har_amount , PDO::PARAM_STR);
$stmt->bindParam(':har_date', $har_date, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "harvest.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "harvest.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>


<?php
////////////////// ข้อมูลการขายผลผลิต
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['sell_amount']) && isset($_POST['sell_date']) && isset($_POST['sell_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$sell_amount = $_POST['sell_amount'];
$sell_date = $_POST['sell_date'];
$sell_details = $_POST['sell_details'];
//sql update
$stmt = $conn->prepare("UPDATE sell_pro SET id=:id,sell_type=:sell_type,sell_amount=:sell_amount,sell_date=:sell_date,sell_details=:sell_details WHERE sell_id=:sell_id");
$stmt->bindParam(':sell_id', $sell_id, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':sell_type', $sell_type, PDO::PARAM_STR);
$stmt->bindParam(':sell_amount', $sell_amount , PDO::PARAM_STR);
$stmt->bindParam(':sell_date', $sell_date, PDO::PARAM_STR);
$stmt->bindParam(':sell_details', $sell_details, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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


<?php
////////////////// ข้อมูลการรับงบประมาณ
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['bud_amount']) && isset($_POST['bud_date'])&& isset($_POST['bud_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$bud_amount = $_POST['bud_amount'];
$bud_date = $_POST['bud_date'];
$bud_details = $_POST['bud_details'];
//sql update
$stmt = $conn->prepare("UPDATE g_budget SET id=:id,bud_type=:bud_type,bud_amount=:bud_amount,bud_date=:bud_date,bud_details=:bud_details WHERE bud_id=:bud_id");
$stmt->bindParam(':bud_id', $bud_id, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':bud_type', $bud_type, PDO::PARAM_STR);
$stmt->bindParam(':bud_amount', $bud_amount , PDO::PARAM_STR);
$stmt->bindParam(':bud_date', $bud_date, PDO::PARAM_STR);
$stmt->bindParam(':bud_details', $bud_details, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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

<?php
////////////////// ข้อมูลการเบิกงบประมาณ
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['dis_amount']) && isset($_POST['dis_date'])&& isset($_POST['dis_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$dis_date = $_POST['dis_date'];
$dis_details = $_POST['dis_details'];
//sql update
$stmt = $conn->prepare("UPDATE budget_dis SET id=:id,dis_type=:dis_type,dis_amount=:dis_amount,dis_date=:dis_date,dis_details=:dis_details,dis_status=:dis_status WHERE dis_id=:dis_id");
$stmt->bindParam(':dis_id', $dis_id, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':dis_type', $dis_type, PDO::PARAM_STR);
$stmt->bindParam(':dis_amount', $dis_amount , PDO::PARAM_STR);
$stmt->bindParam(':dis_date', $dis_date, PDO::PARAM_STR);
$stmt->bindParam(':dis_details', $dis_details, PDO::PARAM_STR);
$stmt->bindParam(':dis_status', $dis_status, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "budget_dis.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "budget_dis.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>


<?php
////////////////// ข้อมูลการเบิกอุปกรณ์
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
//sql update
$stmt = $conn->prepare("UPDATE borrow SET bor_name=:bor_name,id=:id,bor_amount=:bor_amount,bor_date=:bor_date WHERE bor_id=:bor_id");
$stmt->bindParam(':bor_id', $bor_id, PDO::PARAM_STR);
$stmt->bindParam(':bor_name', $bor_name, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindParam(':bor_amount', $bor_amount , PDO::PARAM_STR);
$stmt->bindParam(':bor_date', $bor_date, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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


<?php
////////////////// แก้ไขข้อมูลพันธุ์พืช
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
$plant_id = $_POST['plant_id'];
$plant_name = $_POST['plant_name'];
$plant_age = $_POST['plant_age'];
$type_name = $_POST['type_name'];
$plant_details = $_POST['plant_details'];

//sql update
$stmt = $conn->prepare("UPDATE plants SET plant_name=:plant_name,plant_age=:plant_age,type_name=:type_name,plant_details=:plant_details,plant_pic='$newname' WHERE plant_id=:plant_id");
$stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
$stmt->bindParam(':plant_name', $plant_name, PDO::PARAM_STR);
$stmt->bindParam(':plant_age', $plant_age, PDO::PARAM_STR);
$stmt->bindParam(':type_name', $type_name, PDO::PARAM_STR);
$stmt->bindParam(':plant_details', $plant_details , PDO::PARAM_STR);

$stmt->execute();

if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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
}}elseif($upload ==null){

    $plant_id = $_POST['plant_id'];
    $plant_name = $_POST['plant_name'];
    $plant_age = $_POST['plant_age'];
    $type_name = $_POST['type_name'];
    $plant_details = $_POST['plant_details'];
    
    //sql update
    $stmt = $conn->prepare("UPDATE plants SET plant_name=:plant_name,plant_age=:plant_age,type_name=:type_name,plant_details=:plant_details WHERE plant_id=:plant_id");
    $stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
    $stmt->bindParam(':plant_name', $plant_name, PDO::PARAM_STR);
    $stmt->bindParam(':plant_age', $plant_age, PDO::PARAM_STR);
    $stmt->bindParam(':type_name', $type_name, PDO::PARAM_STR);
    $stmt->bindParam(':plant_details', $plant_details , PDO::PARAM_STR);
    
    $stmt->execute();
    
    if($stmt->rowCount() >= 0){
            echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "แก้ไขข้อมูลสำเร็จ",
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


}

//sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 
$conn = null; //close connect db
} //isset
?>

<?php
////////////////// ข้อมูลพื้นที่โซน
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['area_size']) && isset($_POST['area_name'])&& isset($_POST['area_amount'])&& isset($_POST['area_size'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$area_id = $_POST['area_id'];
$area_id = $_POST['area_name'];
$area_id = $_POST['area_amount'];
$area_size = $_POST['area_size'];

//sql update
$stmt = $conn->prepare("UPDATE p_area SET area_name=:area_name,area_amount=:area_amount,area_size=:area_size WHERE area_id=:area_id");
$stmt->bindParam(':area_id', $area_id, PDO::PARAM_STR);
$stmt->bindParam(':area_name', $area_name, PDO::PARAM_STR);
$stmt->bindParam(':area_amount', $area_amount, PDO::PARAM_STR);
$stmt->bindParam(':area_size', $area_size, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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

<?php
////////////////// ข้อมูลระบบ
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['user_first'])&& isset($_POST['sys_tel'])&& isset($_POST['sys_add'])){
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
$sys_date = $_POST['sys_date'];
$user_first = $_POST['user_first'];
$sys_tel = $_POST['sys_tel'];
$sys_add = $_POST['sys_add'];

//sql update
$stmt = $conn->prepare("UPDATE system SET user_first=:user_first,sys_tel=:sys_tel,sys_add=:sys_add,sys_pic='$newname' WHERE sys_date=:sys_date");
$stmt->bindParam(':sys_date', $sys_date, PDO::PARAM_STR);
$stmt->bindParam(':user_first', $user_first, PDO::PARAM_STR);
$stmt->bindParam(':sys_tel', $sys_tel, PDO::PARAM_STR);
$stmt->bindParam(':sys_add', $sys_add, PDO::PARAM_STR);

$stmt->execute();

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
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
}}elseif($upload ==null){

$sys_date = $_POST['sys_date'];
$user_first = $_POST['user_first'];
$sys_tel = $_POST['sys_tel'];
$sys_add = $_POST['sys_add'];

//sql update
$stmt = $conn->prepare("UPDATE system SET user_first=:user_first,sys_tel=:sys_tel,sys_add=:sys_add WHERE sys_date=:sys_date");
$stmt->bindParam(':sys_date', $sys_date, PDO::PARAM_STR);
$stmt->bindParam(':user_first', $user_first, PDO::PARAM_STR);
$stmt->bindParam(':sys_tel', $sys_tel, PDO::PARAM_STR);
$stmt->bindParam(':sys_add', $sys_add, PDO::PARAM_STR);

$stmt->execute();


if($stmt->rowCount() >= 0){
    echo '<script>
         setTimeout(function() {
          swal({
              title: "แก้ไขข้อมูลสำเร็จ",
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
}
// sweet alert 
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

$conn = null;
} //isset
?>
<?php
////////////////// ข้อมูลประเภทพันธุ์พืช
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['type_name']) && isset($_POST['type_details'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'connect.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$type_id = $_POST['type_id'];
$type_name= $_POST['type_name'];
$type_details = $_POST['type_details'];

//sql update
$stmt = $conn->prepare("UPDATE tb_type SET type_name=:type_name,type_details=:type_details WHERE type_id=:type_id");
$stmt->bindParam(':type_id', $type_id, PDO::PARAM_STR);
$stmt->bindParam(':type_name', $type_name, PDO::PARAM_STR);
$stmt->bindParam(':type_details', $type_details, PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>