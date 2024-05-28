<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
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
  <title>ยินดีต้อนรับ</title>
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
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}

.landing{
  background-image: url('https://cdn.pixabay.com/photo/2020/08/04/22/19/veggies-5463924_960_720.png');
background-position: center;
background-size: cover;
background-repeat: no-repeat;
}
.gallery-wrapper {
  background-color: #dbdbdb;
  box-sizing: border-box;
  height: 195px;
  overflow: hidden;
}

.gallery-scroll {
  box-sizing: border-box;
  height: 195px;
  overflow-x: auto;
  overflow-y: hidden;
}

.gallery {
  background-color: #dbdbdb;
  display: flex;
  box-sizing: border-box;
  width: max-content;
  height: 180px;
  padding: 0px 8px;
}

.item {
  box-sizing: border-box;
  height: 100%;
  padding: 16px 8px;
}

.item img {
  display: block;
  height: 100%;
}

</style>
<body style="background-color:#F5F5F5">
<body>
<div class="landing">
<div class = "container">
        <div class="col py-3 text-center ">
        <br><br>  <br><br><br><br><br><br><br>
            <h5 class="text-center">สวัสดีคุณ <?= $_SESSION['user_first'];?>
            <h5>ยินดีต้อนรับ</h5>
            <h5>เข้าสู่ระบบบริหารจัดการโครงการแปลงผักเพื่อชุมชน</h5>
          
          </h5>
          </div>
    
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
                            ข้อมูลพื้นที่โซน
                        </span>
                    </a>
                    
                    <!--<li class="has-subnav">
                    <a href="account.php">
                       <i class="fa fa-credit-card fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลบัญชี
                        </span>
                    </a>
                   
                </li>-->

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
        <br><br><br><br><br><br><br><br><br><br><br><br>
       <!-- <div class="gallery-wrapper">
  <div class="gallery-scroll">
    <div class="gallery">
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416352459_122122141328096948_7084075714268791099_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeFheM48uvRBSCIudHkX38-Kw-OPGvaVn8_D448a9pWfz78a8Cqv8RJvWvUVHa7mjY1I3sWvUsnbs7w6aonwnMS1&_nc_ohc=xTCjs6mBgH4AX9Nly7N&_nc_ht=scontent-bkk1-1.xx&oh=00_AfDHayEMa9vuxmSdcqljOYWmQt6N7Q4ZwY0j5Hp3EYjigg&oe=65B3DDF5" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416385379_122122140968096948_5475425652559179692_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeGWlOYmHShK-_wnA68kf1oAnCFlN9UbXRicIWU31RtdGFx0yCvG1lyOwDmOElCNt-H7v4M6W-c8ZYfCswQ4WegO&_nc_ohc=9sv5aMn4JDoAX9QXVE8&_nc_ht=scontent-bkk1-1.xx&oh=00_AfDJ8PTAO9_R4SsE2QItJ1avnvg4HwhRkDasnNnmjyJrVg&oe=65B36DF3" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416350493_122122141136096948_5003003544617921967_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeENDPkSxJsxt7KCmLthrevk6Cj5B0IdzzHoKPkHQh3PMfWyARMc4Dm954cHq2rL9WSFa65BxsXOPjmKCh52V9sT&_nc_ohc=VQa_zlBEkUcAX8y-Q0B&_nc_ht=scontent-bkk1-1.xx&oh=00_AfBoofNI1EoKmVwjdfmiHNqPA8wr3aQurtOIMXP6crTcKA&oe=65B3B757" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/418450643_122122141388096948_2666596064701777016_n.jpg?stp=cp6_dst-jpg&_nc_cat=100&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeHOuK76qnjwsPhtv-1LcuGISJzcVt8w1FhInNxW3zDUWAZCRJFiTwCryR0lBV4Rm3142gRv_lsbVmS1oU6TQAnJ&_nc_ohc=Efa0HMX-UBYAX-KvZWj&_nc_ht=scontent-bkk1-1.xx&oh=00_AfCt7pXOGjOzZPcUyyf8jnlgOwTcufWemSg51_7mJSn7Mw&oe=65B43C26" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416346976_122122141220096948_8440962359255386633_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeFzvHzvTUkQLBj6IFYtnxUnsFcQIahbQnWwVxAhqFtCdcCWkiJx3XqxIMdO0XGhbwY6-uelBj726fofu9vt4M5B&_nc_ohc=yF9ve8L12roAX_9WJ3_&_nc_ht=scontent-bkk1-1.xx&oh=00_AfBgdd6k8g9As4lpMflr95NdvbQCtfhZGwn08TSaNY_E7Q&oe=65B4CE92" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416310567_122122140902096948_1879108852356752422_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeGqOBkcJhDF0y5VRxJ4O9bkXqFWBuKHyy5eoVYG4ofLLp708gf3IbCrdFQ-p1xy9IKonBaULX20Bbk9vAzxbsKo&_nc_ohc=WLSgqPGgx1gAX9Y6yYo&_nc_ht=scontent-bkk1-1.xx&oh=00_AfAFbRPGz0suaxckjJZJ0nkN4Lcl9j7BAIRBY4ZAOmOhyA&oe=65B395C3" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416324076_122122140884096948_6700708339481023688_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeHLDmAd5WTQOShAsdNPTTS1RclAChkMBUNFyUAKGQwFQ5CKq0eTn7pfSWmHlEHk006wwncA7ovTilqmB-1ervgm&_nc_ohc=vdDDVMx6z68AX_Jr2XO&_nc_ht=scontent-bkk1-1.xx&oh=00_AfAHc9lv02s2yElX4SKppDi38ypkLqN5GjlBxcHkjKPbiA&oe=65B3BF30" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/416323909_122122141274096948_6423380840243209686_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeEgD9dO_xbzDAjIM_ZTa4zKHS8Zu2L7wUgdLxm7YvvBSAyInBSH8Gvn42d4IodBijYIPfwJ-8Y2vNG0cSfQqe-S&_nc_ohc=37gheg9DL0MAX9GJg_x&_nc_ht=scontent-bkk1-1.xx&oh=00_AfCX2cDLsaHCOGtXZxiNVTJagmi17IDRd8vmENcZgVJdGg&oe=65B4226C" alt="Image" />
      </div>-->
    </div>
  </div>
</div>
    </div>
  </div>
</div>
</div>
</div>
        
    </body>
</html>

