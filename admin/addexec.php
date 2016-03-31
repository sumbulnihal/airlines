<?php
include('../db.php');
$type=$_POST['type'];
$route=$_POST['route'];
$droute=$_POST['droute'];
$price=$_POST['price'];
$seat=$_POST['seat'];
$time=$_POST['time'];
$dtime=$_POST['dtime'];
$update=mysql_query("INSERT INTO route (type, price, numseats, route, time,destintion,dp_time)
VALUES
('$type','$price','$seat','$route','$time','$droute','$dtime')");
header("location: route.php");
?>
