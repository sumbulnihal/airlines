<article class="col1">
      <div class="pad_1">
        <h2>Your Flight Planner</h2>
		
        <form id="form_1" action="selectset.php" method="post">
          <div class="wrapper pad_bot1">
            <div class="radio marg_right1">
              <input type="radio" name="trip" value="0" checked>
              Round Trip
              <input type="radio" name="trip" value="1">
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
          </div>
          <div class="wrapper"> Departure Date and Time:
		  
            <div class="wrapper">
              <div class="bg left">
                <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date_depart" id="sd" value="" maxlength="10" readonly="readonly"   style="width: 165px;  border: 3px double #CCCCCC; padding:5px 10px;" />
              </div>
              
            </div>
          </div>
         
          <div class="wrapper">
            <p>Passenger(s):</p>
            <div class="bg left">
              <input type="text" class="input input2"  name="nop" required>
            </div><div>
			
           <input type="submit" class="mybutton" value="GO"/>
		   
        </form>
        <h2>Recent News</h2>
     
      </div>
    </article>