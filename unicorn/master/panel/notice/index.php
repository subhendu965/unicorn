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
<style>
	#main_area{
		max-width:80%;
		margin:20px auto;
	}
</style>

<div id="main_area">
<h1>Manage Notice</h1>
	<a href="/master/panel/notice/make_notice"><div>Create Notice</div></a>
	<a href="/master/panel/notice/view_notice"><div>View Notices</div></a>
</div>
