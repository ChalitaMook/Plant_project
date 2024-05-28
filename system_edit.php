<?php
session_start();
echo '';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if(empty($_SESSION['user_id']) && empty($_SESSION['user_first'])){
            echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
            exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลระบบ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
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
    
    <style>
         h3{
        font-family: 'Pattaya', sans-serif;
    }
    a,button {
        font-family: 'Kanit', sans-serif;
    }
    h5{
        font-family: 'Noto Sans Thai', sans-serif;
    }
    .fa-2x {
font-size: 2em;
}
.fa {
position: relative;
display: table-cell;
width: 60px;
height: 36px;
text-align: center;
vertical-align: middle;
font-size:20px;
}


.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}

.main-menu {
background:#212121;
border-right:1px solid #e5e5e5;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:60px;
overflow:hidden;
-webkit-transition:width .05s linear;
transition:width .05s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}

.main-menu>ul {
margin:7px 0;
}

.main-menu li {
position:relative;
display:block;
width:250px;
}

.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;
  
}

.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}

.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
  font-family: 'Titillium Web', sans-serif;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
}

.no-touch .scrollable.hover {
overflow-y:hidden;
}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}

a:hover,a:focus {
text-decoration:none;
}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#F5F5F5;
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}
body {
  margin:0 auto;
  width:800px;
}
div.b { text-align: right; }

</style>
<body style="background-color:#F5F5F5;">
<body>
<body>
<div class="landing">
<div class = "container">
        <div class="col py-3 text-center ">
            
        <div class="b"><h8 class="text-center"><?= $_SESSION['user_first'];?>  กำลังใช้งาน</div>
            
            
          </h8>
          </div>
    </style>
</head>
<body>
<body>
<?php

    if(isset($_GET['sys_date'])){
      require_once 'connect.php';
      $stmt = $conn->prepare("SELECT* FROM system WHERE sys_date=?");
      $stmt->execute([$_GET['sys_date']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      if($stmt->rowCount() < 1){
          header('Location: system.php');
          exit();
      }
    }//isset
    ?>

<div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="admin_page.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            หน้าแรก
                        </span>
                    </a>
                  
                    </li>
                <li class="has-subnav">
                    <a href="form_user.php">
                        <i class="fa fa-users fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลผู้ใช้งาน
                        </span>
                    </a>
                    <li class="has-subnav">
                    <a href="system.php">
                    <i class="fa fa-cloud" aria-hidden="true"></i>
                        <span class="nav-text">
                            ข้อมูลระบบ
                        </span>
                    </a>
                    <li class="has-subnav">
                    <a href="type.php">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="nav-text">
                            ข้อมูลประเภทพันธุ์พืช
                        </span>
                    </a>

                    <li class="has-subnav">
                    <a href="plants.php">
                       <i class="fa fa-lemon-o fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลพันธุ์พืช
                        </span>
                    </a>
                   
                    </li>
                <li class="has-subnav">
                    <a href="p_area.php">
                       <i class="fa fa-folder fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลพื้นที่โซน
                        </span>
                    </a>
                    
                    </li>
               <!-- <li class="has-subnav">
                    <a href="account.php">
                       <i class="fa fa-credit-card fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลบัญชี
                        </span>
                    </a>-->
                   
                    <li class="has-subnav">
                    <a href="assign.php">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลจัดตารางเวร
                        </span>
                    </a>
                    
                </li>
                <!--<li>
                    <a href="g_budget.php">
                        <i class="fa fa-money fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลรับงบประมาณ
                        </span>
                    </a>
                </li>
                <li>
                    <a href="d_budget.php">
                        <i class="fa fa-usd fa-2x"></i>
                        <span class="nav-text">
                           ข้อมูลเบิกงบประมาณ
                        </span>
                    </a>
                </li>-->
                   
                
                    <li>
                   <a href="report.php">
                       <i class="fa fa-file-text-o fa-2x"></i>
                        <span class="nav-text">
                           รายงาน
                        </span>
                    </a>
                </li>

            <ul class="logout">
                <li>
                   <a href="logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            ออกจากระบบ
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
      <!-- Left links -->
    </div>
     <!-- Collapsible wrapper -->

    <!-- Right elements -->
   
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <center><h3>แก้ไขข้อมูลระบบ</h3></center>
            <br><br>
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                    <form class="requires-validation"  enctype="multipart/form-data" method="post" action="edit_db.php" novalidate>
                    <input type="hidden" name="sys_date" required value="<?= $row['sys_date'];?>">

                    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">ชื่อผู้นำโครงการ</label>
         <input type="text" id="form6Example4" class="form-control" name = "user_first" required value="<?= $row['user_first'];?>" /> 
        </div> 

<div class="form-outline mb-4">
  <label class="form-label" for="date">วันที่ก่อตั้งโครงการ</label>
  <input class="form-control" type="date" id="date" name="sys_date" required value="<?= $row['sys_date'];?>" >
  </div>


  
  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">เบอร์โทร</label>
         <input type="text" id="form6Example4" class="form-control" name = "sys_tel" required value="<?= $row['sys_tel'];?>"/>
  </div>
  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">ที่ตั้งโครงการ</label>
         <input type="text" id="form6Example4" class="form-control" name = "sys_add" required value="<?= $row['sys_add'];?>"/>
  </div>
  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">รูปโลโก้</label>
        <input type="file" class="form-control" name="sys_pic" id="sys_pic">
         
  </div>
  

 
        
       
<br>
<input type="submit" class="btn btn-success " value="บันทึก" >
&nbsp;&nbsp;&nbsp; &nbsp;
<input type="reset" class="btn btn-danger" value="ยกเลิก" onclick="window.location.href='system.php?val='">
     
      </div>
    
                    </ol>
                </nav>
            
            
                
            </main>
        </div>
    </div>
</body>
</html>