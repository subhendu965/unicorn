<?php 
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


if(isset($rootpath)){
	require_once($rootpath."init.php");
}else{
	require_once("../init.php");
}

$logged=false;
if(isset($_SESSION['logged']) && $_SESSION['log_type']=="admin"){
	$logged=true;
}else{
	$logged=false;
	
}

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

echo "<label><div>";
echo "<div class='row_54g' id='column_title'>";
echo "<div class='column_78k' id='row_title'>-</div>";

$qug="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
	if($rors=mysqli_query($db,$qug)){
		while($ror=mysqli_fetch_array($rors,MYSQLI_BOTH)){
					
			echo "
			<div class='column_78k'>";
				echo idToStop($ror['stop_id']);
			echo "</div>";
		}
	}
echo "</div>";
	
$i=0;
$j=0;
	$query2="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
	if($rows2=mysqli_query($db,$query2)){
		while($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
			$j=0;
			echo "<div class='row_54g'>";
			echo "<div class='column_78k' id='row_title'>".idToStop($row2['stop_id'])."</div>";
			$qug="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
			if($rors=mysqli_query($db,$qug)){
				while($ror=mysqli_fetch_array($rors,MYSQLI_BOTH)){
					
					echo "<div class='column_78k'>";
						if($j>=$i){
							echo " - ";
						}else{
							echo "<input type='number' name='".$row2['stop_id']."_".$ror['stop_id']."'  title='".idToStop($row2['stop_id'])."-".idToStop($ror['stop_id'])."'/>";
						}
						
					echo "</div>";
					
					$j++;
				}
			}
			
			echo "</div>";
			
			$i++;
		}
	}
echo "</div></label>";
?>