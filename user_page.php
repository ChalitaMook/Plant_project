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
  <link rel="stylesheet" href="/lib/w3.css">
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
body {
  margin:0 auto;
  width:800px;
}
.landing{
  background-image: url('https://cdn.pixabay.com/photo/2020/08/04/22/19/veggies-5463924_960_720.png');
background-position:  right top;
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
        <br><br>
            <h5 class="text-center">สวัสดีคุณ <?= $_SESSION['user_first'];?>
            <h5>ยินดีต้อนรับ</h5>
            <h5>เข้าสู่ระบบบริหารจัดการโครงการแปลงผักเพื่อชุมชน</h5>
          
          </h5>
  </div>
  </div>
    <!-- Collapsible wrapper -->
    
      <!-- Left links -->
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
                   
                </li>
                <li>
                    <a href="work_s.php">
                        <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            ข้อมูลตารางการทำงานประจำวัน
                        </span>
                    </a>
                </li>
                <!-- <li>
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
                </li> -->
                
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
    <br><br><br>
    <div class="gallery-scroll">
    <div class="gallery">
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416310980_122122141196096948_2737449360276197723_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHrvJX-tAl-9i4jQY8qU_uNGDKyQorJSB4YMrJCislIHlHsUEQkT6FFgc19POfQEZ2lgssMcH_El2ukHmXo5b9H&_nc_ohc=tZcGcJjTWq8Ab61ynVU&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfAHFo1_Y-rxh37xz7e7y_ZB4KFmptvboAR_a4NyevO1Ww&oe=6619F577" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416385379_122122140968096948_5475425652559179692_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGWlOYmHShK-_wnA68kf1oAnCFlN9UbXRicIWU31RtdGFx0yCvG1lyOwDmOElCNt-H7v4M6W-c8ZYfCswQ4WegO&_nc_ohc=u1bAtfN14QgAb5ywGXb&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfCnrzXT6sPb3nXAczTo3pbuC6ljhspY86Gw1K440gmYLQ&oe=6619D273" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416346976_122122141220096948_8440962359255386633_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFzvHzvTUkQLBj6IFYtnxUnsFcQIahbQnWwVxAhqFtCdcCWkiJx3XqxIMdO0XGhbwY6-uelBj726fofu9vt4M5B&_nc_ohc=wgl2j5liVYcAb40r_Ep&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfBxfYbiuhL0rHVvxUTVEYnRL9z7bICcDWW-UoBTcl5Daw&oe=6619E192" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416350493_122122141136096948_5003003544617921967_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeENDPkSxJsxt7KCmLthrevk6Cj5B0IdzzHoKPkHQh3PMfWyARMc4Dm954cHq2rL9WSFa65BxsXOPjmKCh52V9sT&_nc_ohc=eu0-ZJK-JpgAb78NNiN&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfA8ZSAcffb9HCCv5Q-eqFNVN0YNfS3DypnS1ZXGHlTuJw&oe=6619E397" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/418476732_122122141052096948_58468477088178969_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHVhilQIt7wWqpK7ST8tPo6rClogmbj30KsKWiCZuPfQppaze27996uaH_NOYY-ZWUThODTzn4JMCVz82ZcjqG5&_nc_ohc=FMLyLLB52PAAb58ydeJ&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfAcY5eohCggHOKRTs6hNA1B01w27aXGdWsYSjUtSS5KdA&oe=6619E58A" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416324076_122122140884096948_6700708339481023688_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHLDmAd5WTQOShAsdNPTTS1RclAChkMBUNFyUAKGQwFQ5CKq0eTn7pfSWmHlEHk006wwncA7ovTilqmB-1ervgm&_nc_ohc=fnFAAbWIy2MAb66rgV9&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfAq0L27tqv5_CkTrxcqlNoYf8nkNly6WixTIOIYiCPZfw&oe=6619EB70" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/418450643_122122141388096948_2666596064701777016_n.jpg?stp=cp6_dst-jpg&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHOuK76qnjwsPhtv-1LcuGISJzcVt8w1FhInNxW3zDUWAZCRJFiTwCryR0lBV4Rm3142gRv_lsbVmS1oU6TQAnJ&_nc_ohc=86FbvJrJoc4Ab6lf7l_&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfAu15IDgBHPjl6vFwUkAwLPAOGr8ZQ0gUQDsjW4Zc2leA&oe=6619F7E6" alt="Image" />
      </div>
      <div class="item">
        <img src="https://scontent.fkkc2-1.fna.fbcdn.net/v/t39.30808-6/416310567_122122140902096948_1879108852356752422_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGqOBkcJhDF0y5VRxJ4O9bkXqFWBuKHyy5eoVYG4ofLLp708gf3IbCrdFQ-p1xy9IKonBaULX20Bbk9vAzxbsKo&_nc_ohc=g3Uds7aHHJcAb53Q9Lc&_nc_ht=scontent.fkkc2-1.fna&oh=00_AfCltGDqdJmMvawKmdMgANejstP2WYSc-25ViPIgkXXRCQ&oe=6619FA43" alt="Image" />
      </div>
    </div>
  </div>
</div>
</div>
</div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
   
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
    
          </body>
</html>
          
        

