<?php 
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");


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
			<div id="about_admin">
				
				<div>
					<a href="create_admin.php">
						<div>Create Admin</div>
					</a>
				</div>
				
				<div>
					<a href="view_admin_requests.php">
						<div>View Admin Requests</div>
					</a>
				</div>
			</div>
			
		</div>
	</main>
</body>

