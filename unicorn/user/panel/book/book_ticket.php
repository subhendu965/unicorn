<?php
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");

if($logged===true){
	
}else{
	header("location:/user/login");
}




function idToStop($id){
	global $db;
	$query="SELECT stop FROM stop WHERE id='".$id."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			return $row['stop'];
		}
	}
}

if(isset($_POST['submit'])){
	
	

	$query="SELECT id FROM fare_chart WHERE route='".mysqli_real_escape_string($db,$_POST['route'])."' AND vehicle='".mysqli_real_escape_string($db,$_POST['vehicle'])."'";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			$query2="SELECT fare FROM fare_chart_details WHERE ((source='".$_POST['src']."' AND destination='".$_POST['dest']."') OR (source='".$_POST['dest']."' OR destination='".$_POST['src']."')) AND id='".$row['id']."'";
			if($rows2=mysqli_query($db,$query2)){
				if($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
					///////////////////////////////////////////////////////////////
					do{
						$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,15);
						$q1="SELECT id FROM tick_history WHERE id='".$id."' LIMIT 1";
						if($rp=mysqli_query($db,$q1)){
							if($rpp=mysqli_fetch_array($rp,MYSQLI_BOTH)){
								continue;
							}else{
								break;
							}
						}else{
							break;
						}
					}while(1);
					$id="UTK18".$id;
					$final_query="INSERT INTO ticket_history SET route='".mysqli_real_escape_string($db,$_POST['route'])."',";
					$final_query.="schedule='".mysqli_real_escape_string($db,$_POST['schedule'])."',";
					$final_query.="id='".$id."',";
					$final_query.="vehicle='".mysqli_real_escape_string($db,$_POST['vehicle'])."',";
					$final_query.="source='".mysqli_real_escape_string($db,$_POST['src'])."',";
					$final_query.="destination='".mysqli_real_escape_string($db,$_POST['dest'])."',";
					$final_query.="person='".mysqli_real_escape_string($db,$_POST['person'])."',";
					$final_query.="amount='".($row2['fare']*(int)($_POST['person']))."',";
					$final_query.="date_of_journey='".mysqli_real_escape_string($db,$_POST['date'])."',";
					$final_query.="depart_time='".mysqli_real_escape_string($db,$_POST['dtime'])."',";
					$final_query.="username='".mysqli_real_escape_string($db,$_SESSION['username'])."',";
					$final_query.="arrival_time='".mysqli_real_escape_string($db,$_POST['atime'])."'";
					
					if(mysqli_query($db,$final_query)){
						header("location:view_ticket.php?id=".$id);
					}else{
						echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to book ticket. Try agaain later.</h1>";
						die();
					}
					
					//////////////////////////////////////////////////////////////////
				}else{
					///////////////////////////////////A Message should also be sent to admin automatically regarding this/////////////////////////////
					echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Cntact with admin with code NFC".$_POST['route']." (".$row['id'].")</h1>";
					die();
				}
			}
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to book ticket. Try agaain later.</h1>";
			die();
		}
	}
	//print_r($_POST);
}


?>


<style>
form[name=create_form]{
	width:60%;
	margin:20px auto;
	font-size:20px;
}
form[name=create_form] label>div{
	clear:both;
}
form[name=create_form] [hb_code='input']{
	width:40%;
	border:1px solid #57a;
	font-size:20px;
	padding:5px 8px;
	margin:8px;
	float:right;
	background:white;
	box-shadow:black 0px 0px 1px;
	outline:none;
	transition:border 0.3s, background 0.3s, box-shadow 0.3s;

}
form[name=create_form] [hb_code='input']:hover{
	background:rgba(20,150,220,0.07);
	border-color: black;
	box-shadow:#57a 0px 0px 5px;
}

form[name=create_form] #days{
	display:none;
}

</style>


<form name="create_form" method="post" action="book_ticket.php">
<h1>
	Book A Ticket
</h1>

<?php
$query="SELECT * FROM vehicles WHERE id='".mysqli_real_escape_string($db,$_GET['vehicle'])."'";
if($rows=mysqli_query($db,$query)){
	if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
		
	}
}
$query="SELECT * FROM routes WHERE name='".mysqli_real_escape_string($db,$_GET['route'])."'";
if($rows=mysqli_query($db,$query)){
	if($edr=mysqli_fetch_array($rows,MYSQLI_BOTH)){
		if($edr['ac']==1){
			$edr['ac']="Yes";
		}else{
			$edr['ac']="No";
		}
				
		if($edr['nonstop']==1){
			$edr['nonstop']="Yes";
		}else{
			$edr['nonstop']="No";
		}
		
		
		if($edr['standing']==1){
			$edr['standing']="Yes";
		}else{
			$edr['standing']="No";
		}		
		
	}
}
?>
<div>
	<div id='details'>
		<h3>Details</h3>
		<div>Route: <?php echo $_GET['route']; ?></div>
		<div>Source: <?php echo idToStop($_GET['src']); ?></div>
		<div>Destination:  <?php echo idToStop($_GET['dest']); ?></div>
		<div>Departure: <?php echo urldecode($_GET['dtime']); ?></div>
		<div>Arrival: <?php echo urldecode($_GET['atime']); ?></div>
		<div>Date: <?php echo date("d-M-Y (l)",strtotime($_GET['date'])); ?></div>
		<div>AC: <?php echo $edr['ac']; ?></div>
		<div>Standing: <?php echo $edr['standing']; ?></div>
		<div>Nonstop: <?php echo $edr['nonstop']; ?></div>
		<div>Vehicle: <?php echo $row['type'].", ".$row['manufacturer']."-".$row['model']." (".$row['car_number'].")"; ?></div>
	</div>
	
	<div id="fare">
	<h3>Fare</h3>
		Fare:
		Persons: <input type="number" hb_code="input" name="person" value="1" max="10" min="1">
	</div>
	<br>
	<?php
		foreach($_GET as $key=>$var){
			echo "<input type='hidden' name='".$key."' value='".$var."'>";
		}
	?>
	
	<div id="confirm">
		<input type="submit" value="Book Now" name="submit"  />
	</div>
</div>
<label><div>

</div></label>

</form>