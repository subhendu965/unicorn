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
	
	#main_inner .route_infos{
		padding:10px;
		background:#eb1;
	}
	
	#main_area #depot_action{
		margin:20px auto;
		max-width:90%;
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
					
						echo "<div class='route_stops rn52'>";
							echo "<div class='stops_header'>Stops</div>";
							echo "<div class='stops_details'>";
							
								$query2="SELECT * FROM route_details WHERE name='".$row['name']."'";
								if($rows2=mysqli_query($db,$query2)){
									while($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
										echo "<div class='stops_name'>".idToStop($row2['stop_id'])."</div>";
									}
								}
							
							echo "</div>";
							
						echo "</div>";
						
						echo "<div class='route_infos rn52'>";
							echo "<div>AC Bus: ".$row['ac']."</div>";
							echo "<div>Non stop:  ".$row['nonstop']."</div>";
							echo "<div>Standing allowed:  ".$row['standing']."</div>";
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