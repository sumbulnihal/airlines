<?php
include("includes/header.php");

 
?>


<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<p style="position: relative; left: 500px;top: 63px;"><strong>Print and present this details upon boarding</strong> <br><br>
<a href="javascript:Clickheretoprint()">Print</a></p>
<div id="print_content" style="width: 400px; position: relative; left: 500px;top: 63px;">
<strong><u>Ticket Reservation Details</u></strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysql_query("SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysql_fetch_array($result))
	{
		echo 'Transaction Number: <b>'.$row['transactionum'].'</b><br>';
		echo 'Name: <b>'.$row['fname'].' '.$row['lname'].'</b><br>';
		echo 'Address: <b>'.$row['address'].'</b><br>';
		echo 'Contact: <b>'.$row['contact'].'</b><br>';
		echo 'Payable: <b>RS'.$row['payable'].'</b><br>';
	}
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Route : ';
		$resulta = mysql_query("SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysql_fetch_array($resulta))
			{
			echo '<b>'.$rowa['route'].'</b>';
			echo $time='<b>'.$rowa['time'].'</b><br>';
			}
		echo 'Time of Departure: '.$time;
		echo '<br>';
		echo 'Seat Number: <strong style="color:red;font-size:16pt;">'.$setnum.'</strong><br>';
		echo 'Date Of Travel: <b>'.$rows['date'].'</b><br>';
		
	}
?>

</div><p style="position: relative; left: 500px;top: 63px;" ><a href="index.php">Home</a></p>
