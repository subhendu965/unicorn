<?php
$folder_layer=2;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../header.php");

if($logged===true){
?>

<style>
#main{
	width:75%;
	margin:20px auto;
}
#main #master_list{
	float:right;
}

#main #me{
	float:left;
	padding:20px;
	background:rgba(0,0,0,0.01);
	box-shadow:rgba(0,0,0,0.2) 0px 0px 5px 5px;
	width:50%;
}
</style>

<div id="main">
	
	<div id="me">
		<div>
			<h1><?php echo $_SESSION['login_name'] ?></h1>
		</div>
		<div>
		</div>
		<div>
			<a href="/user/login/logout.php"><div>Log Out</div></a>
		</div>
	</div>
</div>
<?php
}else{
	die("<div style='width:60%; margin:20px auto;text-align:center;'><a href='/user/login'>login Please first.</a></div>");
}

