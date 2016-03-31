<?php
include('db.php');
function createRandomPassword() {
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}
$confirmation = createRandomPassword();
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$contact_no=$_POST['contact'];

$trip_type=$_POST['type_r'];
$from=$_POST['busnum'];$busnum=$_POST['busnum'];
$to=$_POST['routto'];
$depart_date=$_POST['date'];
$no_ofp=$_POST['qty'];
$plane=$_POST['planes_nam'];
$setnum=$_POST['setnum'];
$arive_date=$_POST['date_arived'];

//price calculate

 $result = mysql_query("SELECT * FROM route WHERE id='$busnum'");
while($row = mysql_fetch_array($result))
	 {
	$price=$row['price'];
	 }
	 $payable=$no_ofp*$price;
mysql_query("INSERT INTO customer (fname, lname, address, contact, bus, transactionum, payable, setnumber,rot_type,destination) VALUES ('$fname', '$lname', '$address', '$contact_no', '$plane', '$confirmation','$price','$setnum','$trip_type','$to')");
mysql_query("INSERT INTO reserve (date, bus, seat_reserve, transactionnum, seat,arrival)
VALUES ('$depart_date', '$plane', '$no_ofp', '$confirmation','$setnum','$arive_date')");
header("location: print.php?id=$confirmation&setnum=$setnum");
?>