
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
/*$database = "project_ang";

$conn = new mysqli($servername,$username,$password,$database)
*/

try {
  $conn = new PDO("mysql:host=$servername;dbname=project_ang", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

    
    if (!$conn) {
      echo "Connection failed!";
      exit();
    }
?>
