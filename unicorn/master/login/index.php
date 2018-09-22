<?php
$folder_layer=2;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../header.php");

if($logged===true){
	header("location:/master/panel");
	die("logout first.");
}else{
	
}

if(isset($_POST['submit'])){
	$query="SELECT username,password,name FROM master WHERE username='".mysqli_real_escape_string($db,$_POST['username'])."' AND password='".mysqli_real_escape_string($db,$_POST['password'])."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			if($row['username']==$_POST['username'] && $row['password']==$_POST['password']){
				$_SESSION['logged']=true;
				$_SESSION['log_type']="master";
				$_SESSION['login_name']=$row['name'];
				header("location:/master/panel");
			}else{
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to log in. Incorrect Credetials.</h1>";
			}
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to log in. Incorrect Credetials.</h1>";
		}
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to log in. Incorrect Credetials.</h1>";
	}
}else{
	
}
?>
<style>

form[name=create_form]{
	width:60%;
	margin:20px auto;
	font-size:20px;
}
form[name=create_form]>label>div{
	clear:both;
}
form[name=create_form] [hb_code='input']{
	width:40%;
	border:1px solid #57a;
	font-size:20px;
	padding:5px 8px;
	margin:8px;
	float:right;
	background:white;
	box-shadow:black 0px 0px 1px;
	outline:none;
	transition:border 0.3s, background 0.3s, box-shadow 0.3s;

}
form[name=create_form] [hb_code='input']:hover{
	background:rgba(20,150,220,0.07);
	border-color: black;
	box-shadow:#57a 0px 0px 5px;
}
</style>

<form name="create_form" method="post" action="index.php">
<div style="font-size:30px">
	Login as Master
</div>
<br>
<label><div>
Username: <input type="text" name="username" hb_code='input' />
</div></label>

<label><div>
Password: 
<input type="password" name="password" hb_code='input'>
</div></label>


<label><div>
<input type="submit" value="Log In" name="submit">
</div></label>
</form>
