<?php 
$folder_layer=1;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("header.php");


if($logged===true){
	
}else{
	header("location:/admin/login");
	die();
}


header("location:/admin/panel");
?>

	