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

if(isset($_GET['name']) && !empty($_GET['name'])){
	$query="DELETE FROM route_details WHERE name='".mysqli_real_escape_string($db,$_GET['name'])."'";
	if(mysqli_query($db,$query)){
		$query="DELETE FROM routes WHERE name='".mysqli_real_escape_string($db,$_GET['name'])."'";
		if(mysqli_query($db,$query)){
			header("location:index.php");
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to delete in P2</h1>";
		}
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to delete</h1>".mysqli_error($db);
	}
}
	
?>