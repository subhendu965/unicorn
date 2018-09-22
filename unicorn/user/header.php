
<?php
if(isset($rootpath)){
	require_once($rootpath."init.php");
}else{
	require_once("../init.php");
}

$logged=false;
if(isset($_SESSION['logged']) && $_SESSION['log_type']=="user"){
	$logged=true;
}else{
	$logged=false;
	
}
?>


<html>
<head>
<title>Unicorn</title>
</head>
<body>

<style>
body{
	padding:0px;
	margin:0px;
	font-family:ubuntu,tahoma;
}
#header{
	background:rgb(0,111,157);
	color:white;
	box-shadow:rgba(160,160,160,0.6) 0px 3px 4px;
}
</style>


<?php
if($logged===true){

?>

<div id="header">

<style>

#identity{
	float:right;
	padding:10px;
	font-size:18px;
}

#header .header_items{
	display:inline-block;
	padding:10px;
	font-size:18px;
	cursor:pointer;
	transition:background 0.3s;
}
#header .header_items:hover{
	background:rgba(0,0,0,0.25);
}

#header a{
	color:white;
	text-decoration:none;
}


</style>
	
	<div id="identity">
		<a href="/user/profile"><?php echo $_SESSION['login_name']; ?></a>
	</div>
	<div>
		<a href="/user/panel/book"><div class="header_items">Book ticket</div></a>
		
	</div>
	
</div>

<?php
}else{
?>


<div id="header">
<div style="padding:10px;font-size:20px;background:gold;color:blue;">Log In please.</div>
	
</div>

<?php
}
?>