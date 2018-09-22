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


function idToStop($id){
	global $db;
	$query="SELECT stop FROM stop WHERE id='".$id."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			return $row['stop'];
		}
	}
}

if(isset($_POST['submit'])){
	do{
			$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
			$q1="SELECT id FROM day_schedule WHERE id='".$id."' LIMIT 1";
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

		if(isset($_POST['daytype'])){
			$_POST['daytype']="everyday";
			
			$_POST['sunday']=1;
			$_POST['monday']=1;
			$_POST['tuesday']=1;
			$_POST['wednesday']=1;
			$_POST['thursday']=1;
			$_POST['friday']=1;
			$_POST['saturday']=1;
			
			
		}else{
			$_POST['daytype']="someday";
			
			
			if(isset($_POST['sunday'])){
				$_POST['sunday']=1;
			}else{
				$_POST['sunday']=0;
			}
			
			if(isset($_POST['monday'])){
				$_POST['monday']=1;
			}else{
				$_POST['monday']=0;
			}
			
			if(isset($_POST['tuesday'])){
				$_POST['tuesday']=1;
			}else{
				$_POST['tuesday']=0;
			}
			
			if(isset($_POST['wednesday'])){
				$_POST['wednesday']=1;
			}else{
				$_POST['wednesday']=0;
			}
			
			if(isset($_POST['thursday'])){
				$_POST['thursday']=1;
			}else{
				$_POST['thursday']=0;
			}
			
			if(isset($_POST['friday'])){
				$_POST['friday']=1;
			}else{
				$_POST['friday']=0;
			}
			
			if(isset($_POST['saturday'])){
				$_POST['saturday']=1;
			}else{
				$_POST['saturday']=0;
			}
		}

		$flag=true;

		$query="INSERT INTO day_schedule SET route='".mysqli_real_escape_string($db,$_POST['route'])."',";
		$query.="vehicle='".mysqli_real_escape_string($db,$_POST['vehicle'])."',";
		$query.="daytype='".mysqli_real_escape_string($db,$_POST['daytype'])."',";
		$query.="sunday='".mysqli_real_escape_string($db,$_POST['sunday'])."',";
		$query.="monday='".mysqli_real_escape_string($db,$_POST['monday'])."',";
		$query.="tuesday='".mysqli_real_escape_string($db,$_POST['tuesday'])."',";
		$query.="wednesday='".mysqli_real_escape_string($db,$_POST['wednesday'])."',";
		$query.="thursday='".mysqli_real_escape_string($db,$_POST['thursday'])."',";
		$query.="friday='".mysqli_real_escape_string($db,$_POST['friday'])."',";
		$query.="saturday='".mysqli_real_escape_string($db,$_POST['saturday'])."',";
		$query.="id='".$id."'";
		if(mysqli_query($db,$query)){
			$query2="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
			if($rows2=mysqli_query($db,$query2)){
				while($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
					$qq="INSERT INTO time_schedule SET schedule_id='".$id."', ";
					$qq.="stop_id='".$row2['stop_id']."',";
					$qq.="time='".mysqli_real_escape_string($db,$_POST[$row2['stop_id']])."'";
					
					if(mysqli_query($db,$qq)){
						$flag=$flag && true;
					}else{
						echo $mysqli_error($db);
						$flag=$flag && false;
					}
				}
			}
		}else{
			$flag=$flag && false;
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to add Schedule. Try again.</h1>".mysqli_error($db);
		}
		
		if($flag){
			echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>Schedule added.</h1>";
		}else{
			
		}
}

?>



<style>
form[name=create_form]{
	width:60%;
	margin:20px auto;
	font-size:20px;
}
form[name=create_form] label>div{
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

form[name=create_form] #days{
	display:none;
}
</style>


<form name="create_form" method="post" action="add.php">
<h1>
	Make a Schedule
</h1>
<br>

<label><div>
Route: <select name="route" hb_code='input' onchange="routeChanged(this)">
<option value="NULL">-- SELECT -- </option>
<?php 
	$query="SELECT name FROM routes";
	if($rows=mysqli_query($db,$query)){
		while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			echo "<option value='".$row['name']."'>".$row['name']."</option>";
		}
	}
 ?>
</select>
<a href="/admin/panel/routes" target="_blanck" style="float:right">Routes</a>
</div></label>

<label><div>
Vehicle: <select name="vehicle" hb_code='input'>
<option value="NULL">-- SELECT -- </option>
<?php 
	$query="SELECT * FROM vehicles";
	if($rows=mysqli_query($db,$query)){
		while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			echo "<option value='".$row['id']."'>".$row['type']." : ".$row['id']."</option>";
		}
	}
 ?>
</select>
<a href="/admin/panel/vehicles" target="_blanck" style="float:right">Vehicles</a>
</div></label>

<label><div>
Day: <input type="checkbox" name="daytype" onchange="everyDayChanged(this)" checked /> Everyday
</div></label>
<br>
<div id="days">

<label><div>
<input type="checkbox" name="sunday" /> Sunday
</div></label>

<label><div>
<input type="checkbox" name="monday" /> Monday
</div></label>

<label><div>
<input type="checkbox" name="tuesday" /> Tuesday
</div></label>

<label><div>
<input type="checkbox" name="wednesday" /> Wednesday
</div></label>

<label><div>
<input type="checkbox" name="thursday" /> Thursday
</div></label>

<label><div>
<input type="checkbox" name="friday" /> Friday
</div></label>

<label><div>
<input type="checkbox" name="saturday" /> Saturday
</div></label>

</div>
<br>


<div id="schedular">

</div>



<label><div>
<input type="submit" value="Create Schedule" name="submit">
</div></label>
</form>

</body>
<script>
function routeChanged(route){
	request=new XMLHttpRequest();
	request.open("POST","fetchStops.php",false);
	request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	request.onreadystatechange=chg;
	
	request.send("route="+route.value);

}

function chg(){
	if(request.status==200 && request.readyState==4){
		//alert(request.responseText);
		document.querySelector("#schedular").innerHTML=request.responseText;
	}
}
function everyDayChanged(obj){
	if(document.create_form.daytype.checked){
		document.querySelector("form[name=create_form] #days").style.display="none";
	}else{
		document.querySelector("form[name=create_form] #days").style.display="block";
	}
}
</script>
</html>