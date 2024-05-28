<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>รายงานข้อมูลจัดตารางเวร</title>
        <style type="text/css">
                input[type="date"]::-webkit-datetime-edit, 
                input[type="date"]::-webkit-inner-spin-button, 
                input[type="date"]::-webkit-clear-button {
                color: #fff;
                position: relative;
                }
                input[type="date"]::-webkit-datetime-edit-year-field{
                position: absolute !important;
                border-left:1px solid #8c8c8c;
                padding: 2px;
                color:red;
                left: 56px;
                }
                input[type="date"]::-webkit-datetime-edit-month-field{
                position: absolute !important;
                border-left:1px solid #8c8c8c;
                padding: 2px;
                color:red;
                left: 26px;
                }
                input[type="date"]::-webkit-datetime-edit-day-field{
                position: absolute !important;
                color:red;
                padding: 2px;
                left: 4px;
                }
                /* ตัวอย่าง css จาก  : https://stackoverflow.com/questions/7372038/is-there-any-way-to-change-input-type-date-format */
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h4>รายงานข้อมูลจัดตารางเวร</h4>
                    <form action="" method="get">
                        <font color="red">กรุณาเลือกวันที่ ที่ท่านต้องการ</font>
                        <input type="date" name="q"  data-date-format="dd-mm-Y"  class="form-control" >
                         <br>
 
                       
                        <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                       
                    </form>
                    <br>
                    <a class="btn btn-info" href="report_t.php" role="button">รายงาน</a>
                    <?php
                    //ถ้ามีการส่ง $_GET['q'] 
                          if (isset($_GET['q'])){ 
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once 'connect.php';
                            //ประกาศตัวแปรรับค่าจากฟอร์ม
                            $stmt = $conn->prepare("SELECT user.user_first,p_area.area_name,assign.ass_date,
                            assign.ass_details,assign.ass_status,assign.amount FROM assign 
                            JOIN user ON assign.user_id = user.id
                            JOIN p_area ON assign.area_id = p_area.area_id
                            WHERE assign.ass_date=? ");
                             $stmt->execute([$_GET['q']]);
                            $stmt->execute();
                            $result = $stmt->fetchAll(); //แสดงข้อมูลทั้งหมด
                            //ถ้าเจอข้อมูลมากกว่า 0
                            if($stmt->rowCount() > 0) {
                      ?>
                      <br>
                    <h3>รายการวันที่ :  <?= date('d/m/Y',strtotime($_GET['q']));?></h3>
                    <br>
                    <h4 class="btn btn-success">จำนวนสถานะ:เสร็จสิ้น : มั่ว</h4>
                    <br>
                    <h4 class="btn btn-warning">จำนวนสถานะ:กำลังดำเนินการ : มั่ว</h4>
                    <br>
                    <h4 class="btn btn-danger">จำนวนสถานะ:ยกเลิก : มั่ว</h4>

 
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="12%">คนเข้าเวร</th>
                                <th width="20%">โซน</th>
                                <th width="20%" class="text-center">วันที่</th>
                                <th width="35%">รายละเอียดงาน</th>
                                <th width="55%">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
 
                           <?php
                           //ประกาศตัวแปรแสดงลำดับ
                           $i=1;  
                           //ประกาศตัวแปรผลรวม
                           
                           foreach($result as $row)  {
                           
                            ?>
                            <tr>
                                <td><?= $row['user_first'];?></td>
                                <td><?= $row['area_name'];?></td>
                                <td class="text-center"><?= date('d/m/Y',strtotime($row['ass_date']));?></td>
                                <td><?= $row['ass_details'];?></td>
                                <td><?= $row['ass_status'];?></td>
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
                    </table>
                    <br>
                  <?php } // if ($stmt->rowCount() > 0) {
                  else{
                    echo '<center> -ไม่พบข้อมูล !! </center>';
                    }
 
                  } //isset ?>
                  
 
                    
                </div>
                
            </div>
        </div>
    </body>
</html>