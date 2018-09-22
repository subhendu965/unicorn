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


if(isset($_POST['submit'])){
	if(isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['phone']) && !empty(trim($_POST['phone']))){
		////generate code//////////
		do{
			$code=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
			$q1="SELECT code FROM create_admin WHERE code='".$code."' LIMIT 1";
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
		
		////////check already email exist//////////
		$q1="SELECT email FROM create_admin WHERE email='".mysqli_real_escape_string($db,$_POST['email'])."' LIMIT 1";
		if($rp=mysqli_query($db,$q1)){
			if($rpp=mysqli_fetch_array($rp,MYSQLI_BOTH)){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Email already registered.</h1>";
			}else{
				
			}
		}else{
			
		}
		////////check already phone exist//////////
		$q1="SELECT phone FROM create_admin WHERE phone='".mysqli_real_escape_string($db,$_POST['phone'])."' LIMIT 1";
		if($rp=mysqli_query($db,$q1)){
			if($rpp=mysqli_fetch_array($rp,MYSQLI_BOTH)){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Phone already registered.</h1>";
			}else{
				
			}
		}else{
			
		}
		
		/////////////reister now////////////////
		$query="INSERT INTO create_admin SET email='".mysqli_real_escape_string($db,$_POST['email'])."',phone='".mysqli_real_escape_string($db,$_POST['phone'])."',code='".$code."'";
		if(mysqli_query($db,$query)){
			echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>Admin Created!<br> Code -> ".$code."</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to craete new admin. Try again.</h1>";
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


<form name="create_form" method="post" action="create_admin.php">
<h1>
	Create Your Admin
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
<input type="submit" value="Create Admin" name="submit">
</div></label>
</form>

</body>
</html>