<?php 
$folder_layer=4;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../../header.php");


if($logged===true){
	
}else{
	header("location:/master/login");
	die();
}

if(isset($_POST['submit'])){
	if(isset($_POST['title']) && !empty(trim($_POST['title'])) && isset($_POST['target']) && !empty(trim($_POST['target'])) && isset($_POST['message']) && !empty(trim($_POST['message']))){
		do{
			$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
			$q1="SELECT id FROM master_notification WHERE id='".$id."' LIMIT 1";
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
		
		$query="INSERT INTO master_notification SET id='".$id."',title='".mysqli_real_escape_string($db,$_POST['title'])."',message='".mysqli_real_escape_string($db,$_POST['message'])."',target='".$_POST['target']."'";
		if(mysqli_query($db,$query)){
			echo "<h1 style='background:gold; font-size:20px; padding:10px; color:blue;'>Notice has been posted.</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Something Went Wrong. Try again!</h1>";
		}
	
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Please Fill all the fields</h1>";
	}
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
	Make a Notice
</h1>
<br>
<label><div>
Target: <input type="radio" name="target" value="admin" />Admin <input type="radio" name="target" value="user" />User
</div></label>

<label><div>
Title:
<input type="text" name="title" hb_code='input'>
</div></label>


<label><div>
Message:
<textarea name="message" hb_code='input'></textarea>
</div></label>



<label><div>
<input type="submit" value="Post" name="submit">
</div></label>
</form>

</body>
</html>