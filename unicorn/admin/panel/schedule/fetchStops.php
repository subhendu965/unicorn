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

	$query2="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
	if($rows2=mysqli_query($db,$query2)){
		while($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
			echo "<label><div>";
			echo idToStop($row2['stop_id']).":";
			echo "<input type='time' name='".$row2['stop_id']."' hb_code='input'>";
			echo "</div></label>";
		}
	}
?>