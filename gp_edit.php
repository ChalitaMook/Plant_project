<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลรับพันธุ์พืช</title>
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
background-color:#5fa2db;
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
    </style>
</head>
<body>
<body>
    <?php
    if(isset($_GET['id'])){
      require_once 'connect.php';
      $stmt = $conn->prepare("SELECT* FROM g_plants WHERE id=?");
      $stmt->execute([$_GET['id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      if($stmt->rowCount() < 1){
          header('Location: g_plants.php');
          exit();
      }
    }//isset
    ?>
         
      
         <body style="background-color:#F5F5F5">
<body>
    </nav>
                    <div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="user_page.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            หน้าแรก
                        </span>
                    </a>
                  
                </li>
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
                            ข้อมูลพื้นที่แปลง
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="work_s.php">
                        <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลตารางการทำงานประจำวัน
                        </span>
                    </a>
                </li>
                <li>
                    <a href="grow_v.php">
                        <i class="fa fa-leaf fa-2x"></i>
                        <span class="nav-text">
                           ข้อมูลการปลูกพืช
                        </span>
                    </a>
                </li>
                <li>
                   <a href="harvest.php">
                       <i class="fa fa-archive fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลการเก็บเกี่ยว
                        </span>
                    </a>
                </li>
                <li>
                   <a href="sell_pro.php">
                        <i class="fa fa-dollar  fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลการขายผลผลิต
                        </span>
                    </a>
                </li>
                <li>
                    <a href="budget_dis.php">
                       <i class="fa fa-btc fa-2x"></i>
                        <span class="nav-text">
                            เบิกงบประมาณ
                        </span>
                    </a>
                </li>
                <li>
                    <a href="borrow.php">
                       <i class="fa fa-scissors fa-2x"></i>
                        <span class="nav-text">
                            เบิกอุปกรณ์
                        </span>
                    </a>
                </li>
                <li>
                    <a href="g_plants.php">
                       <i class="fa fa-plus-square fa-2x"></i>
                        <span class="nav-text">
                            รับพันธุ์พืช
                        </span>
                    </a>
                </li>
                <li>
                    <a href="d_plants.php">
                       <i class="fa fa-minus-square-o fa-2x"></i>
                        <span class="nav-text">
                            เบิกพันธุ์พืช
                        </span>
                    </a>
                </li>
            </ul>

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
            <center><h3>แก้ไขข้อมูลรับพันธุ์พืช</h3></center>
            <br><br>
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                    <form class="requires-validation"  method="post" action="edit_db.php" novalidate>

    <div class="form-outline mb-4">
      <label class="form-label" for="typeText">รหัสรับพันธุ์พืช</label>
      <input type="text" id="typeText" class="form-control" name = "id" required value="<?= $row['id'];?>" />
      </div>

      <div class="form-outline mb-4">
      <label class="form-label" for="typeText">รหัสผู้ใช้งาน</label>
      <input type="text" id="typeText" class="form-control" name = "id_g" required value="<?= $row['id_g'];?>" />
      </div>
     
  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">รหัสพันธุ์พืช</label>
         <input type="text" id="form6Example4" class="form-control" name = "p_id" required value="<?= $row['p_id'];?>"/>  
  </div>

  <div class="form-outline">
      <label class="form-label" for="typeText">ชื่อพันธุ์พืช</label>
      <select id="inputState" class="form-control" name = "p_name">
        <option selected></option>
        <option>ถั่วฝักยาว</option>
        <option>ฟักทอง</option>
        <option>ฟักเขียว</option>
        <option>มะเขือเทศ</option>
        <option>ตำลึง</option>
        <option>บวบ</option>
        <option>พริก</option>
        <option>กะเพรา</option>
        <option>มะเขือเปราะ</option>
        <option>มะเขือพวง</option>
        <option>โหระพา</option>
        <option>แมงลัก</option>
        <option>ข่า</option>
        <option>ตะไคร้</option>
        <option>มะละกอ</option>
        <option>อ้อย</option>
        <option>ชะอม</option>
        <option>หน่อไม้</option>
        <option>กระถิน</option>
        <option>ต้นแค</option>
        <option>ผักบุ้ง</option>
        <option>แตงกวา</option>
        <option>กล้วย</option>
        <option>ผักชีลาว</option>
        <option>คะน้า</option>
        <option>กะหล่ำปลี</option>
        <option>ผักคอส</option>
        <option>ผักกาดขาว</option>
        <option>ผักสลัด</option>
      </select>
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">ประเภท</label>
         <input type="text" id="form6Example4" class="form-control" name = "type_g" required value="<?= $row['type_g'];?>"/>   
  </div>

  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">จำนวนที่รับ</label>
         <input type="text" id="form6Example4" class="form-control" name = "amount_g" required value="<?= $row['amount_g'];?>"/>   
  </div>

  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">จำนวนเงินที่จ่าย</label>
         <input type="text" id="form6Example4" class="form-control" name = "ng_g" required value="<?= $row['ng_g'];?>"/>   
  </div>

  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">วันที่รับ</label>
         <input type="text" id="form6Example4" class="form-control" name = "date_g" required value="<?= $row['date_g'];?>"/>   
  </div>

  <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">รายละเอียด</label>
         <input type="text" id="form6Example4" class="form-control" name = "details_g" required value="<?= $row['details_g'];?>"/>   
  </div>

        
       
<br>
<input type="submit" class="btn btn-success " value="บันทึก" >

     
      </div>
    
                    </ol>
                </nav>
            
            
                
            </main>
        </div>
    </div>
</body>
</html>