
<div class="main">
  <section id="content">
    <article class="col1">
      <div class="pad_1">
        <h2>Your Flight Planner</h2>
		<script>
		function trip_selection() {
	 document.getElementById("arrival").style.display = "block";
				}
		function trip_selection1(){
		 document.getElementById("arrival").style.display = "none";
		
		}
		$( document ).ready(function() {
 document.getElementById("arrival").style.display = "none";
});
		
		</script>
        <form id="form_1" action="selectset.php" method="post">
          <div class="wrapper pad_bot1">
            <div class="radio marg_right1">
              <input type="radio" name="trip" value="0"  onClick="trip_selection();" >
              Round Trip
              <input type="radio" name="trip" value="1" onClick="trip_selection1();"checked>
            Single Trip
          </div>
          <div class="wrapper"> Leaving From:
            <div class="bg">
			<select style="width:100%;" name="from">
			<?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'];
								echo '</option>';
							}
						?>
			
			</select>
              
            </div>
          </div>
          <div class="wrapper"> Going To:
            <div class="bg">
             <select style="width:100%;" name="to">
			<?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'];
								echo '</option>';
							}
						?>
			 
			 </select>
            </div>
          </div>
		   <div class="wrapper"> Plane:
            <div class="bg">
             <select style="width:100%;" name="plane_name">
			 <?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['type'];
								echo '</option>';
							}
						?>
			 </select>
            </div>
          </div>     Departure Date and Time:
         
                <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date_depart" id="sd" value="" maxlength="10" readonly="readonly"   style="width: 165px;  border: 3px double #CCCCCC; padding:5px 10px;" />
             
            <div id="arrival">Arrival Date and Time:
		  
            
         <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date_arive" id="sd1" value="" maxlength="10" readonly="readonly"   style="width: 165px;  border: 3px double #CCCCCC; padding:5px 10px;" />
              </div>
         
          <div class="wrapper">
            <p>Passenger(s):</p>
            <div class="bg left">
              <input type="text" class="input input2"  name="nop" required>
            </div><div>
			
           <input type="submit" class="mybutton" value="GO"/>
		   
        </form>
      
      </div>
    </article>
	
	
	
	
    <article class="col2 pad_left1">
	<br><br><br>

<form method="get">	

		<h2> Search Flight</h2>
	<label for="name">From</label>
	
	 
	 <select style="width:50%;" name="source" id="source">
			 <?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['route'].'">';
								echo $row['route'];
								echo '</option>';
							}
						?>
			 </select><br><br>
		<label for="name">To</label>
	&nbsp;&nbsp;&nbsp; <select style="width:50%;" name="destni" id="destni">
			 <?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['route'].'">';
								echo $row['route'];
								echo '</option>';
							}
						?>
			 </select>
	
	
	
&nbsp;&nbsp;	<a href="javascript:makeAjaxRequest()"class="btnSearch">Search</a>	
</form>

<script>
$('.btnSearch').click(function(){
    // code goes here !
	makeAjaxRequest();
});
 
	
	
	function makeAjaxRequest() { 

    $.ajax({
        url: 'search.php',
        type: 'get',
        data: {source: $('#source').val(),
				destni:$('#destni').val()},
        success: function(response) {
		
            $('table#resultTable tbody').html(response);
        }
    });
}
	
</script>

<style>
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }


</style><br><br>
<div class="datagrid">
<table id="resultTable"  >
    <thead>
        <tr>
            <th>Date</th>
            <th>Flight Name</th>
            <th>Source</th>
            <th>Destination</th>
			<th>Arival Time</th>
			<th>Departure Time</th>
			
        </tr>
    </thead>
    <tbody></tbody>
</table></div>
	
   
    </article>
  </section>
</div>