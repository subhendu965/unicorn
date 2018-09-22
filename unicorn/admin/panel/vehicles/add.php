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
			$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
			$q1="SELECT id FROM vehicles WHERE id='".$id."' LIMIT 1";
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
		$q1="SELECT manufacturer,model FROM vehicles WHERE manufacturer='".mysqli_real_escape_string($db,$_POST['manufacturer'])."' AND model='".mysqli_real_escape_string($db,$_POST['model'])."'  LIMIT 1";
		if($rp=mysqli_query($db,$q1)){
			if($rpp=mysqli_fetch_array($rp,MYSQLI_BOTH)){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Manufacturer and Model already exists.</h1>";
			}else{
				
			}
		}else{
			
		}
		
		
		/////////////reister now////////////////
		$query="INSERT INTO vehicles SET type='".mysqli_real_escape_string($db,$_POST['type'])."',description='".mysqli_real_escape_string($db,$_POST['description'])."',manufacturer='".mysqli_real_escape_string($db,$_POST['manufacturer'])."',model='".mysqli_real_escape_string($db,$_POST['model'])."',seats='".mysqli_real_escape_string($db,$_POST['seats'])."',car_number='".mysqli_real_escape_string($db,$_POST['car_number'])."',id='".$id."'";
		if(mysqli_query($db,$query)){
			echo "<h1 style='background:gold; font-size:20px; padding:10px; color:blue;'>Vehicle type added.</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to craete new Vehicle. Try again.</h1>".mysqli_error($db);
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


<form name="create_form" method="post" action="add.php">
<h1>
	Make a new Vehicle
</h1>
<br>
<label><div>
Vehicle type: 
<select name="type" hb_code='input' >
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
<textarea name="description" hb_code='input'></textarea>
</div></label>

<label><div>
Manufacturer: <input type="text" name="manufacturer" hb_code='input' />
</div></label>


<label><div>
Model: <input type="text" name="model" hb_code='input' />
</div></label>

<label><div>
No of seats: <input type="Number" name="seats" hb_code='input' />
</div></label>


<label><div>
Car Number: <input type="text" name="car_number" hb_code='input' />
</div></label>

<label><div>
<input type="submit" value="Create Vehicle" name="submit">
</div></label>
</form>

</body>
</html>