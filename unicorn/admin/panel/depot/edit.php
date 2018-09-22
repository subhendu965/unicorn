<?php 
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");


if($logged===true){
	
}else{
	header("location:/admin/login");
	die();
}

if(isset($_POST['submit']) && isset($_SESSION['admin']['notification_edit_id']) && !empty($_SESSION['admin']['notification_edit_id'])){
	

		if(isset($_POST['shop'])){
			$_POST['shop']=1;
		}else{
			$_POST['shop']=0;
		}

		if(isset($_POST['restaurant'])){
			$_POST['restaurant']=1;
		}else{
			$_POST['restaurant']=0;
		}

		if(isset($_POST['guest_room'])){
			$_POST['guest_room']=1;
		}else{
			$_POST['guest_room']=0;
		}

		if(isset($_POST['toilet'])){
			$_POST['toilet']=1;
		}else{
			$_POST['toilet']=0;
		}

		if(isset($_POST['free_wifi'])){
			$_POST['free_wifi']=1;
		}else{
			$_POST['free_wifi']=0;
		}

		if(isset($_POST['carshed'])){
			$_POST['carshed']=1;
		}else{
			$_POST['carshed']=0;
		}

		$query="UPDATE depot SET depot='".mysqli_real_escape_string($db,$_POST['depot'])."',";
		$query.="address='".mysqli_real_escape_string($db,$_POST['address'])."',";
		$query.="type='".mysqli_real_escape_string($db,$_POST['type'])."',";
		$query.="remark='".mysqli_real_escape_string($db,$_POST['remark'])."',";
		$query.="passenger_capacity='".mysqli_real_escape_string($db,$_POST['passenger_capacity'])."',";
		$query.="vehicle_capacity='".mysqli_real_escape_string($db,$_POST['vehicle_capacity'])."',";
		$query.="shop='".mysqli_real_escape_string($db,$_POST['shop'])."',";
		$query.="restaurant='".mysqli_real_escape_string($db,$_POST['restaurant'])."',";
		$query.="guest_room='".mysqli_real_escape_string($db,$_POST['guest_room'])."',";
		$query.="toilet='".mysqli_real_escape_string($db,$_POST['toilet'])."',";
		$query.="free_wifi='".mysqli_real_escape_string($db,$_POST['free_wifi'])."',";
		$query.="carshed='".mysqli_real_escape_string($db,$_POST['carshed'])."',";
		$query.="no_of_employee='".mysqli_real_escape_string($db,$_POST['no_of_employee'])."',";
		$query.="no_of_quarter='".mysqli_real_escape_string($db,$_POST['no_of_quarter'])."' ";
		$query.="WHERE id='".$_SESSION['admin']['notification_edit_id']."'";
		if(mysqli_query($db,$query)){
			
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to edit. Try After sometime.</h1>";
		}

		$query="UPDATE stop SET depot='".mysqli_real_escape_string($db,$_POST['depot'])."',";
		$query.="address='".mysqli_real_escape_string($db,$_POST['address'])."',";
		$query.="type='".mysqli_real_escape_string($db,$_POST['type'])."',";
		$query.="remark='".mysqli_real_escape_string($db,$_POST['remark'])."',";
		$query.="passenger_capacity='".mysqli_real_escape_string($db,$_POST['passenger_capacity'])."',";
		$query.="vehicle_capacity='".mysqli_real_escape_string($db,$_POST['vehicle_capacity'])."',";
		$query.="shop='".mysqli_real_escape_string($db,$_POST['shop'])."',";
		$query.="restaurant='".mysqli_real_escape_string($db,$_POST['restaurant'])."',";
		$query.="guest_room='".mysqli_real_escape_string($db,$_POST['guest_room'])."',";
		$query.="toilet='".mysqli_real_escape_string($db,$_POST['toilet'])."',";
		$query.="free_wifi='".mysqli_real_escape_string($db,$_POST['free_wifi'])."',";
		$query.="carshed='".mysqli_real_escape_string($db,$_POST['carshed'])."',";
		$query.="no_of_employee='".mysqli_real_escape_string($db,$_POST['no_of_employee'])."',";
		$query.="no_of_quarter='".mysqli_real_escape_string($db,$_POST['no_of_quarter'])."' ";
		$query.="WHERE id='".$_SESSION['admin']['notification_edit_id']."'";
		if(mysqli_query($db,$query)){
			unset($_SESSION['admin']['notification_edit_id']);
			header("location:index.php");
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
	$query="SELECT * FROM depot WHERE id='".mysqli_real_escape_string($db,$_GET['id'])."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			if($row['id']==$_GET['id']){
				$_SESSION['admin']['notification_edit_id']=$row['id'];
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
	Edit a Depot
</h1>
<br>
<label><div>
Depot: <input type="text" name="depot" hb_code='input' value="<?php echo $row['depot']; ?>" />
</div></label>

<label><div>
Address: 
<textarea name="address" hb_code='input'><?php echo $row['address']; ?></textarea>
</div></label>

<label><div>
Type of depot: 
<select name="type" hb_code='input'>
	<option value="small" <?php if($row['type']=="small"){echo "selected"; } ?>>Small</option>
	<option value="standard" <?php if($row['type']=="standard"){echo "selected"; } ?>>Standard</option>
	<option value="big" <?php if($row['type']=="big"){echo "selected"; } ?>>Big</option>

</select>
</div></label>

<label><div>
passenger Capacity: <input type="number" name="passenger_capacity" hb_code='input' value="<?php echo $row['passenger_capacity']; ?>" />
</div></label>

<label><div>
Vehicle Capacity: <input type="number" name="vehicle_capacity" hb_code='input' value="<?php echo $row['vehicle_capacity']; ?>" />
</div></label>

<label><div>
Number of quarter: <input type="number" name="no_of_quarter" hb_code='input' value="<?php echo $row['no_of_quarter']; ?>" />
</div></label>

<label><div>
Number of employee: <input type="number" name="no_of_employee" hb_code='input' value="<?php echo $row['no_of_employee']; ?>" />
</div></label>
<br>
<br>


<label><div> 
<input type="checkbox" name="shop" hb_code='input_chk' <?php if($row['shop']==1){echo "checked";} ?> /> Some shops are available for shoping necessary comodities.
</div></label>


<label><div>
<input type="checkbox" name="restaurant" hb_code='input_chk' <?php if($row['restaurant']==1){echo "checked";} ?> /> Restaurants are available.
</div></label>

<label><div>
<input type="checkbox" name="guest_room" hb_code='input_chk' <?php if($row['guest_room']==1){echo "checked";} ?> /> Guest rooms are available.
</div></label>

<label><div>
<input type="checkbox" name="free_wifi" hb_code='input_chk' <?php if($row['free_wifi']==1){echo "checked";} ?> /> Free Wifi is available.
</div></label>

<label><div>
<input type="checkbox" name="toilet" hb_code='input_chk' <?php if($row['toilet']==1){echo "checked";} ?> /> Toilets are available.
</div></label>

<label><div>
<input type="checkbox" name="carshed" hb_code='input_chk' <?php if($row['carshed']==1){echo "checked";} ?> /> Carshed is available.
</div></label>


<br>
<label><div>
Remark: 
<textarea name="remark" hb_code='input'><?php echo $row['remark']; ?></textarea>
</div></label>

<label><div>
<input type="submit" value="Create Depot" name="submit" >
</div></label>
</form>

</body>
</html>