<!DOCTYPE html>
<html lang="en">
<head>
  <title>การปลูกพืช</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

</style>
<body style="background-color:#F5F5F5">
<body>

    <!-- Collapsible wrapper -->
    
      <!-- Left links -->
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
                    <a href="assign.php">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลการแบ่งเวร
                        </span>
                    </a>
                    
                    <li>
                    <a href="grow_v1.php">
                        <i class="fa fa-leaf fa-2x"></i>
                        <span class="nav-text">
                           ข้อมูลการปลูกพืช
                        </span>
                    </a>
                </li>
                <li>
                   <a href="harvest1.php">
                       <i class="fa fa-archive fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลการเก็บเกี่ยว
                        </span>
                    </a>
                </li>
                <li>
                   <a href="sell_pro1.php">
                        <i class="fa fa-dollar  fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลการขายผลผลิต
                        </span>
                    </a>
                    </li>

                </li>
                <li class="has-subnav">
                    <a href="account.php">
                       <i class="fa fa-credit-card fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลบัญชี
                        </span>
                    </a>
                   
                </li>
                <li>
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
                </li>
                    <li>
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
            <div class="mx-auto" style="width: 330px;">
            <h3>ข้อมูลการปลูกพืช</h3>
  </div>
</head>
<body>


<nav aria-label="breadcrumb">
   <ol class="breadcrumb bg-light">
<div class="container">
  <div class ="row">
    <div class="col-sm-12">
<table class="table tabel-striped table-bordered table-sm">
  <br><br>
    <thead class="thead-dark text-center" >
    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

</style>
<br><br>
      <tr>
      <th scope ="col" width = "12%" >รหัสการปลูก</th>
      <th scope ="col" width = "12%" >รหัสผู้ใช้งาน</th>
      <th scope ="col" width = "12%" >รหัสพันธุ์พืช</th>
      <th scope ="col" width = "10%" >ชื่อพันธุ์พืช</th>
      <th scope ="col"width = "12%">จำนวนที่ปลูก</th>
      <th scope ="col"width = "12%">วันที่ปลูก</th>
      <th scope ="col"width = "12%">พื้นที่แปลง</th>
      <!--<th scope ="col"width = "13%">จัดการ</th>-->
      </tr>
    </thead>
    <?php
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once 'connect.php';
                            $stmt = $conn->prepare("SELECT* FROM grow_v");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $k) {
                            ?>
                            <tr>
                            <tbody class= "text-center">
      <tr>
        <td scope ="row"><?= $k['id']; ?></td>
        <td scope ="row"><?= $k['id_g']; ?></td>
        <td scope ="row"><?= $k['p_id']; ?></td>
        <td scope ="row"><?= $k['p_name']; ?></td>
        <td scope ="row"><?= $k['amount']; ?></td>
        <td scope ="row"><?= $k['date']; ?></td>
        <td scope ="row"><?= $k['zone']; ?>
        </td>
      
        
        </td>

      </tr>
   <?php
    }
    ?>
    </tbody>
  </table>
  </di>
       
  </ol>
                </nav>
            
    </div>
  </div>
</div>
</div>


  </div>
  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <a href="admin_page.php?id=" class="btn btn-success btn-sm">กลับหน้าหลัก</a> 
                &nbsp; &nbsp;&nbsp; &nbsp;
                <a href="assign.php?id=" class="btn btn-secondary btn-sm">หน้าที่ผ่านมา</a>
                &nbsp; &nbsp;&nbsp; &nbsp;
                <a href="harvest1.php?id=" class="btn btn-info btn-sm">หน้าถัดไป</a>
                &nbsp; &nbsp;&nbsp; &nbsp;
</body>
</html>


