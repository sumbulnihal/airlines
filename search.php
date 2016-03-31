<?php 
require_once 'db.php';

if (isset($_GET['source']) && isset($_GET['destni'])) {
   
 $abc=$_GET['source'];	$efg=$_GET['destni'];
 $sql = "SELECT * FROM route WHERE `route`.`route` like '".$abc."' and destintion='".$efg."'";
   $result=mysql_query($sql);
  

  // $rows = mysql_fetch_array($result);


if(mysql_num_rows($result) == 0)
		{
		echo '<td colspan="6">'."Sorry at this time no flight is available for that route!Further information please contact us ".'<td>';
		}
		else{
    while ( $rows = mysql_fetch_array($result)) {
		
       
		echo "<tr>";
				echo "<td>".date("Y/m/d")."</td>";
				echo "<td>".$rows['type']."</td>";
				echo "<td>".$rows['route']."</td>";
				 echo "<td>".$rows['destintion']."</td>";
            echo "<td>".$rows['time']."</td>";
            echo "<td>".$rows['dp_time']."</td>";
         
        echo "</tr>";
    }
}
}
else{
echo "Sytem Failuer Issue Contact webmaster";
}
?>