<?php
session_start();
?>
<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "project";


$conn = mysqli_connect($serverName, $userName , $userPassword, $dbName);
$sql = "SELECT SUM(amount_s) as total FROM sell_pro";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$total_sell_pro = $row['total'];

echo "Total revenue: " . number_format($total_sell_pro, 2) . " THB";
?>