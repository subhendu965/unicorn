<?php 
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");


if($logged===true){
	
}else{
	header("location:/admin/login");
	die();
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

?>
<style>
	#main_area{
		margin:20px auto;
		max-width:100%;
	}
	#main_inner{
		text-align: -webkit-center;
		text-align: -moz-center;
		text-align: -ms-center;
		text-align: -o-center;
	}
	#main_inner .routes{
		max-width:70%;
		border:1px solid black;
		margin:10px;
		text-align:left;
	}
	#main_inner .rn52{
		display:block;
				
	}
	#main_inner .route_header{
		background:#57a;
		color:white;
	}
	#main_inner .route_header_items{
		display:inline-block;
		padding:10px 20px;
		
		
	}
	#main_inner .stops_header{
		background:#acf;
		padding:10px;
	}
	#main_inner .stops_details{
		padding:10px;
		padding-left:30px;
	}
	#main_inner .stops_name{
		padding:10px;
		margin:5px;
		background:#ff6;
	}
	#main_inner .controls{
		float:right;
		padding:10px;
	}
	#main_inner .controls a{
		color:white;
	}
	
	#main_inner .schedule_infos{
		padding:10px;
		background:#eb1;
	}
	
	#main_area #depot_action{
		margin:20px auto;
		max-width:90%;
	}
	
	#main_area .schedule_row{
		padding:5px;
		border-bottom:1px solid black;
	}
	#main_area .schedule_header{
		background:#2ea;
	}
	#main_area .schedule_row .time{
		float:right;
	}
</style>
<div id="main_area">
<div id="main_inner">
	<div>
		<?php
			$query="SELECT * FROM routes";
			if($rows=mysqli_query($db,$query)){
				while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
					echo "<div class='routes'>";
					
						echo "<div class='route_header rn52'>";
							echo "<div class='route_header_items'>".$row['name']."</div>";
							echo "<div class='route_header_items'>From: ".idToStop($row['source'])."</div>";
							echo "<div class='route_header_items'>To: ".idToStop($row['destination'])."</div>";
							
							echo "<div class='controls'>
									<a href='edit.php?name=".$row['name']."'>Edit</a>
									<a href='delete.php?name=".$row['name']."'>Delete</a>
							</div>";
						echo "</div>";
					
						echo "<div class='route_shedule rn52'>";
							$et=1;
							$qq="SELECT * FROM day_schedule WHERE route='".$row['name']."'";
							if($rpps=mysqli_query($db,$qq)){
								while($rpp=mysqli_fetch_array($rpps,MYSQLI_BOTH)){
									echo "<div class='schedules'>";
										echo "<div class='schedule_header'>Schedule ".$et."</div>";
											$sq="SELECT * FROM time_schedule WHERE schedule_id='".$rpp['id']."'";
											if($dews=mysqli_query($db,$sq)){
												while($dew=mysqli_fetch_array($dews,MYSQLI_BOTH)){
													echo "<div class='schedule_row'><div class='time'>".$dew['time']."</div><div class='stop'>".idToStop($dew['stop_id'])."</div></div>";
												}
											}
									
										echo "<div>";
										echo "Run On Weekdays: ";
										if($rpp['sunday']==1){
											echo "Sunday, ";
										}
										if($rpp['monday']==1){
											echo "Monday, ";
										}
										if($rpp['tuesday']==1){
											echo "Tuesday, ";
										}
										if($rpp['wednesday']==1){
											echo "Wednesday, ";
										}
										if($rpp['thursday']==1){
											echo "Thursday, ";
										}
										if($rpp['friday']==1){
											echo "Friday, ";
										}
										if($rpp['saturday']==1){
											echo "Saturday, ";
										}
										echo "</div>";
									echo "</div>";
									$et++;
								}
							}
							
						echo "</div>";
					
					echo "</div>";
				}
			}
		?>
		<div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		
		<div>
			
		</div>
	</div>
	
	<div id="depot_action">
		<a href="add.php">Add Route</a>
	</div>

</div>
</div>