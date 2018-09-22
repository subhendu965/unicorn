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

if(isset($_SESSION['create_admin']['email']) && isset($_SESSION['create_admin']['phone']) && $_SESSION['create_admin']['scc']=="Mj69P"){
	
	
if(isset($_POST['submit'])){
		if(isset($_POST['name']) && !empty(trim($_POST['name'])) && isset($_POST['password']) && !empty(trim($_POST['password'])) && isset($_POST['address']) && !empty(trim($_POST['address']))){
				
				do{
					$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
					$q1="SELECT id FROM create_admin WHERE id='".$id."' LIMIT 1";
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
				
				$query="INSERT INTO admins SET id='".mysqli_real_escape_string($db,$id)."',";
				$query.="phone='".mysqli_real_escape_string($db,$_SESSION['create_admin']['phone'])."',";
				$query.="email='".mysqli_real_escape_string($db,$_SESSION['create_admin']['email'])."',";
				$query.="name='".mysqli_real_escape_string($db,$_POST['name'])."',";
				$query.="address='".mysqli_real_escape_string($db,$_POST['address'])."',";
				$query.="password='".mysqli_real_escape_string($db,$_POST['password'])."'";
				
				if(mysqli_query($db,$query)){
					unset($_SESSION['create_admin']);
					showconfirm($id,$_POST['name']);
					die();
				}else{
					echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Problem CD556. Please Contact to master</h1>".$mysqli_error($db);
				}
				
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Submit Correctly with all fields</h1>";
		}
}else{
	echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Submit Correctly with all fields</h1>";
}
		

}else{
	header("location:/admin/create_admin");
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


<form name="create_form" method="post" action="enroll.php">
<h1>
	Enroll As Admin
</h1>
<br>
<label><div>
Email: <input type="email" name="email" disabled value="<?php echo $_SESSION['create_admin']['email'] ?>" hb_code='input' />
</div></label>

<label><div>
Phone: 
<input type="number" name="phone" disabled value="<?php echo $_SESSION['create_admin']['phone'] ?>" hb_code='input' />
</div></label>


<label><div>
Name: 
<input type="text" name="name" placeholder="Name" hb_code='input' />
</div></label>

<label><div>
Address: 
<textarea name="address" placeholder="Address" hb_code='input' /></textarea>
</div></label>

<label><div>
Choose Password: 
<input type="password" name="password" placeholder="Password" hb_code='input' />
</div></label>


<label><div>
<input type="submit" value="Enroll Now" name="submit">
</div></label>
</form>

</body>
</html>

<?php
function showconfirm($id,$name){
	require_once("../header.php");
?>
<style>
#conf{
		width:60%;
		margin:20px auto;
		border:1px solid black;
		background:rgba(0,0,0,0.1);
		border-radius:5px;
		font-size:18px;
		padding:15px;
	}
</style>
	<div id="conf">
	
		<div>Hello, <?php echo $name; ?> </div>
		<div>
		Your Admin Enrollment has been completed.
		</div>
		<div>
			<h2>ID:<?php echo $id; ?></h2>
		</div>
		
		<a href="/admin/login">Log in as Admin</a>
	</div>
<?php
}

?>