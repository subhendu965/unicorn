<?php 
$folder_layer=1;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("header.php");


if($logged===true){
	
}else{
	header("location:/user/login");
	die();
}


header("location:/user/panel");
?>

	