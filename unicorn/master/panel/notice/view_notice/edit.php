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
if(isset($_GET['id']) && !empty($_GET['id'])){
	
}else{
	header("location:index.php");
}

if(isset($_POST['submit']) && isset($_SESSION['master']['notification_edit_id']) && !empty($_SESSION['master']['notification_edit_id'])){
	if(isset($_POST['title']) && !empty(trim($_POST['title'])) && isset($_POST['target']) && !empty(trim($_POST['target'])) && isset($_POST['message']) && !empty(trim($_POST['message']))){
		
		
		$query="UPDATE master_notification SET title='".mysqli_real_escape_string($db,$_POST['title'])."',message='".mysqli_real_escape_string($db,$_POST['message'])."',target='".$_POST['target']."' WHERE id='".$_SESSION['master']['notification_edit_id']."' LIMIT 1";
		if(mysqli_query($db,$query)){
			unset($_SESSION['master']['notification_edit_id']);
			header("location:index.php");
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to edit. Try After sometime.</h1>";
		}
	
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to edit. Try After sometime.</h1>";
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

<?php
	$query="SELECT * FROM master_notification WHERE id='".mysqli_real_escape_string($db,$_GET['id'])."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			if($row['id']==$_GET['id']){
				$_SESSION['master']['notification_edit_id']=$row['id'];
			}else{
				echo "<h1 style='color:red'>Unable to get data.</h1>";
			}
		}else{
			echo "<h1 style='color:red'>Unable to get data.</h1>";
		}
	}else{
		echo "<h1 style='color:red'>Unable to get data.</h1>";
	}

?>

<form name="create_form" method="post" action="edit.php">
<h1>
	Edit a Notice
</h1>
<br>
<label><div>
Target: <input type="radio" name="target" value="admin" <?php if($row['target']=='admin'){ echo "checked=true";} ?> />Admin <input type="radio" name="target" value="user"  <?php if($row['target']=='user'){ echo "checked=true";} ?> />User
</div></label>

<label><div>
Title:
<input type="text" name="title" hb_code='input'  value="<?php echo $row['title'];  ?>" />
</div></label>


<label><div>
Message:
<textarea name="message" hb_code='input'><?php echo $row['message'];  ?></textarea>
</div></label>



<label><div>
<input type="submit" value="Post" name="submit">
</div></label>
</form>

</body>
</html>