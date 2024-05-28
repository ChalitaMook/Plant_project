
<?php
///////////// ข้อมูลตารางเวร ///////////////////////////////////
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['area_id']) && isset($_POST['ass_date']) && isset($_POST['ass_details']) 
    && isset($_POST['user_id'])&& isset($_POST['plant_id'])
    ){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $area_id = $_POST['area_id'];
    $ass_date = $_POST['ass_date'];
    $ass_details = $_POST['ass_details'];
    $user_id = $_POST['user_id'];
    $plant_id = $_POST['plant_id'];
    $amount = 'ใส่รายละเอียด';
    $ass_status= 'กำลังดำเนินการ';

    $check_query = "SELECT * FROM assign WHERE ass_date = '$ass_date' AND area_id = '$area_id'";
    $result2 = $conn->query($check_query);

    if ($result2->rowCount() == 0) {
        // ถ้าข้อมูลไม่ซ้ำ ทำการบันทึกข้อมูล
                $stmt = $conn->prepare("INSERT INTO assign (id,area_id,ass_date,ass_details,user_id,plant_id,amount,ass_status)
            VALUES (:id,:area_id,:ass_date,:ass_details,:user_id,:plant_id,:amount,:ass_status)");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':area_id', $area_id , PDO::PARAM_STR);
            $stmt->bindParam(':ass_date', $ass_date, PDO::PARAM_STR);
            $stmt->bindParam(':ass_details', $ass_details, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':plant_id', $plant_id, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            $stmt->bindParam(':ass_status', $ass_status, PDO::PARAM_STR);
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
    } else {
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

        echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "มีการลงเวรในโซนและวันที่นี้แล้ว",
                        type: "error"
                    }, function() {
                        window.location = "assign_add.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
        
    }


    //sql insert
   
    $conn = null; //close connect db
    } //isset
    ?>

