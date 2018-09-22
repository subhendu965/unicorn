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


if($logged===true){
	header("location:/admin/panel");
	die();
}else{
	
}



if(isset($_POST['submit'])){
	if(isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['phone']) && !empty(trim($_POST['phone']))){
		$query="SELECT * FROM create_admin WHERE phone='".mysqli_real_escape_string($db,trim($_POST['phone']))."' AND email='".mysqli_real_escape_string($db,trim($_POST['email']))."' AND email NOT IN (SELECT email FROM admins) AND phone NOT IN (SELECT phone FROM admins) LIMIT 1";
		if($rows=mysqli_query($db,$query)){
			if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
				if($row['phone']==trim($_POST['phone']) && $row['email']==trim($_POST['email'])){
					$_SESSION['create_admin']['email']=$row['email'];
					$_SESSION['create_admin']['phone']=$row['phone'];
					$_SESSION['create_admin']['scc']="Mj69P";
					header("location:/admin/create_admin/enroll.php");
				}else{
					echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Data is invalid. Please verify or Contact to master</h1>";
				}
			}else{
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Data is invalid. Please verify or Contact to master</h1>";
			}
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Data is invalid. Please verify or Contact to master</h1>";
		}
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Please provide both email and phone.</h1>";
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
<h1>
	Enroll As Admin
</h1>
<br>
<label><div>
Email: <input type="email" name="email" hb_code='input' />
</div></label>

<label><div>
Phone: 
<input type="number" name="phone" hb_code='input'>
</div></label>


<label><div>
<input type="submit" value="Enroll Now" name="submit">
</div></label>
</form>

</body>
</html>