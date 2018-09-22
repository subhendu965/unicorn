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

if(isset($_POST['submit'])){
	do{
			$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,5);
			$q1="SELECT id FROM stop WHERE id='".$id."' LIMIT 1";
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

		$query="INSERT INTO stop SET stop='".mysqli_real_escape_string($db,$_POST['stop'])."',";
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
		$query.="no_of_quarter='".mysqli_real_escape_string($db,$_POST['no_of_quarter'])."',";
		$query.="id='".$id."'";
		if(mysqli_query($db,$query)){
			echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>Stop Added<br></h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to add stop. Try again.</h1>";
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


<form name="create_form" method="post" action="add.php">
<h1>
	Make a new Stop
</h1>
<br>
<label><div>
Stop: <input type="text" name="stop" hb_code='input' />
</div></label>

<label><div>
Address: 
<textarea name="address" hb_code='input'></textarea>
</div></label>

<label><div>
Type of Stop: 
<select name="type" hb_code='input'>
	<option value="small">Small</option>
	<option value="standard">Standard</option>
	<option value="big">Big</option>

</select>
</div></label>

<label><div>
passenger Capacity: <input type="number" name="passenger_capacity" hb_code='input' />
</div></label>

<label><div>
Vehicle Capacity: <input type="number" name="vehicle_capacity" hb_code='input' />
</div></label>

<label><div>
Number of quarter: <input type="number" name="no_of_quarter" hb_code='input' />
</div></label>

<label><div>
Number of employee: <input type="number" name="no_of_employee" hb_code='input' />
</div></label>
<br>
<br>


<label><div> 
<input type="checkbox" name="shop" hb_code='input_chk' /> Some shops are available for shoping necessary comodities.
</div></label>


<label><div>
<input type="checkbox" name="restaurant" hb_code='input_chk' /> Restaurants are available.
</div></label>

<label><div>
<input type="checkbox" name="guest_room" hb_code='input_chk' /> Guest rooms are available.
</div></label>

<label><div>
<input type="checkbox" name="free_wifi" hb_code='input_chk' /> Free Wifi is available.
</div></label>

<label><div>
<input type="checkbox" name="toilet" hb_code='input_chk' /> Toilets are available.
</div></label>

<label><div>
<input type="checkbox" name="carshed" hb_code='input_chk' /> Carshed is available.
</div></label>


<br>
<label><div>
Remark: 
<textarea name="remark" hb_code='input'></textarea>
</div></label>

<label><div>
<input type="submit" value="Create Stop" name="submit">
</div></label>
</form>

</body>
</html>