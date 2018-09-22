<?php 
$folder_layer=2;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../header.php");


if($logged===true){
	
}else{
	header("location:/master/login");
	die();
}



?>

	<main>
		<header>
			<h1>
				Master Panel
			</h1>
		</header>
		<div>
			
			
		</div>
	</main>
</body>