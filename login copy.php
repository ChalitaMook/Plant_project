<?php session_start();?>
 <!DOCTYPE html>
<html lang="en">
  <head>
  <title>เข้าสู่ระบบ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Mitr:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300" rel="stylesheet">
  </head>
  <style>
  h3{
        font-family: 'Pattaya', sans-serif;
    }
    a,button {
        font-family: 'Kanit', sans-serif;
    }
    body {
  margin:0 auto;
  width:800px;
}

.landing{
background-image: url('https://cdn.pixabay.com/photo/2020/08/04/22/19/veggies-5463924_960_720.png');
background-position:   right top;
background-size: cover;
background-repeat: no-repeat;
}
    </style>
    <body style="background-color:#F5F5F5">
  <body>
  <div class="landing">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8"> <br> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br> <br><br> <br><br>
        <h3>กรุณาล็อกอินเพื่อเข้าสู่ระบบ :ตัวแทนหมู่บ้าน</h3>
          <br>
          <form action="" method="post">
                <div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="user_email" class="form-control" required minlength="3" placeholder="email">
                </div>
                </div>
                <div class="mb-3">
                <div class="col-sm-9">
                  <input type="password" name="user_pass" class="form-control" required minlength="3" placeholder="password">
                </div>
                </div>
                <div class="d-grid gap-2 col-sm-9 mb-3">
                <button type="submit" class="btn btn-info">Login</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </body>
      </html>  


    <?php

  //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['user_email']) && isset($_POST['user_pass']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass']; //เก็บรหัสผ่านในรูปแบบ sha1 

    //check username  & password
    $stmt = $conn->prepare("SELECT id, user_first ,user_last, user_status FROM user WHERE user_email = :user_email AND user_pass = :user_pass");
      $stmt->bindParam(':user_email', $user_email , PDO::PARAM_STR);
      $stmt->bindParam(':user_pass', $user_pass , PDO::PARAM_STR);
      $stmt->execute();

      //กรอก username & password ถูกต้อง
      if($stmt->rowCount() == 1){
        //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //สร้างตัวแปร session
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_first'] = $row['user_first'];
        $_SESSION['user_last'] = $row['user_last'];
        $_SESSION['user_status'] = $row['user_status'];
       
        if( $_SESSION['user_status'] == "admin" ) {
          header('Location: admin_page.php');
        } else if( $_SESSION['user_status'] == "member" ) {
          header('Location: user_page.php');
        } 
    
       

        //เช็คว่ามีตัวแปร session อะไรบ้าง
        //print_r($_SESSION);

       // exit();

          //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
      }else{ //ถ้า username or password ไม่ถูกต้อง

         echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                             text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "login copy.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
              $conn = null; //close connect db
            } //else
    } //isset 
    //devbanban.com
    ?>
