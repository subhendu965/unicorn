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

if(isset($_GET['id']) && !empty(isset($_GET['id']))){
	$query="DELETE FROM depot WHERE id='".$_GET['id']."' LIMIT 1";
	if(mysqli_query($db,$query)){
		header("location:index.php");
	}else{
		echo "<h1 style='color:red;'>Unable To Delete. Try again!</h1>".mysqli_error($db);
	}
}else{
	header("location:index.php");
}

?>