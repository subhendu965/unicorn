<?php
$folder_layer=2;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../header.php");

if($logged===true){
	die("logout first.");
}else{
	
}


if(isset($_POST['submit'])){
	
	do{
		$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
		$q1="SELECT id FROM users WHERE id='".$id."' LIMIT 1";
		if($rp=mysqli_query($db,$q1)){
			if($rpp=mysqli_fetch_array($rp,MYSQLI_BOTH)){
				continue;
			}else{
				break;
			}
		}else{
			break;
		}
	}while(1);
				
	$query="INSERT INTO users SET email='".mysqli_real_escape_string($db,$_POST['email'])."',";
	$query.="id='".$id."',";
	$query.="name='".mysqli_real_escape_string($db,$_POST['name'])."',";
	$query.="address='".mysqli_real_escape_string($db,$_POST['address'])."',";
	$query.="phone='".mysqli_real_escape_string($db,$_POST['phone'])."',";
	$query.="password='".mysqli_real_escape_string($db,$_POST['password'])."'";
	
	if(mysqli_query($db,$query)){
		echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>You are registered now.</h1>
		<h3>You will be redirected to login page within <span id='frtu'>5</span> seconds</h3><a href='/user/login'>Log in now</a>";
		echo "<script>
		tm=4;
		aa=setInterval(function (){document.querySelector('#frtu').innerText=tm; tm--; if(tm<=0){window.location='/user/login'}},1000);
		</script>";
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to Create User. Please try again later.</h1>";
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

<form name="create_form" method="post" action="register.php">
<div style="font-size:30px">
	Register as user
</div>

<br>
<label><div>
Name: <input type="text" name="name" hb_code='input' />
</div></label>

<label><div>
Address: <textarea type="address" name="address" hb_code='input' ></textarea>
</div></label>

<label><div>
Phone: <input type="number" name="phone" hb_code='input' />
</div></label>


<label><div>
Email: <input type="email" name="email" hb_code='input' />
</div></label>

<label><div>
Password: 
<input type="password" name="password" hb_code='input'>
</div></label>


<label><div>
<input type="submit" value="Log In" name="submit">
</div></label>

	
</form>


