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
if(isset($_GET['id']) && !empty($_GET['id'])){
	
}else{
	header("location:view_vehicles.php");
}

if(isset($_POST['submit']) && isset($_SESSION['admin']['notification_edit_id']) && !empty($_SESSION['admin']['notification_edit_id'])){
	if(isset($_POST['type']) && !empty(trim($_POST['type'])) && isset($_POST['description']) && !empty(trim($_POST['description'])) && isset($_POST['manufacturer']) && !empty(trim($_POST['manufacturer']))  && isset($_POST['model']) && !empty(trim($_POST['model']))){
		
		
		$query="UPDATE vehicles SET type='".mysqli_real_escape_string($db,$_POST['type'])."',description='".mysqli_real_escape_string($db,$_POST['description'])."',manufacturer='".$_POST['manufacturer']."',model='".$_POST['model']."' WHERE id='".$_SESSION['admin']['notification_edit_id']."' LIMIT 1";
		if(mysqli_query($db,$query)){
			unset($_SESSION['admin']['notification_edit_id']);
			header("location:view_vehicles.php");
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
	$query="SELECT * FROM vehicles WHERE id='".mysqli_real_escape_string($db,$_GET['id'])."' LIMIT 1";
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
	Edit Vehicle
</h1>
<br>
<label><div>
Vehicle type: <select name="type" hb_code='input' value="<?php echo $row['type']; ?>"  >
	<option value="bus">
	Bus
	</option>

	<option value="luxary_bus">
	Luxary Bus
	</option>

	<option value="sedan">
	Sedan
	</option>

	<option value="hatchback">
	Hatchback
	</option>

	<option value="suv">
	SUV
	</option>

	<option value="van">
	Van
	</option>

	<option value="autorickshaw">
	Autorickshaw
	</option>

</select>
</div></label>

<label><div>
Description: 
<textarea name="description" hb_code='input' ><?php echo $row['description']; ?></textarea>
</div></label>

<label><div>
Manufacturer: <input type="text" name="manufacturer" hb_code='input' value="<?php echo $row['manufacturer']; ?>" />
</div></label>


<label><div>
Model: <input type="text" name="model" hb_code='input' value="<?php echo $row['model']; ?>" />
</div></label>

<label><div>
No of seats: <input type="Number" name="seats" hb_code='input' value="<?php echo $row['seats']; ?>"  />
</div></label>


<label><div>
Car Number: <input type="text" name="car_number" hb_code='input' value="<?php echo $row['car_number']; ?>"  />
</div></label>

<label><div>
<input type="submit" value="Edit Vehicle Type" name="submit">
</div></label>
</form>


</body>
</html>
