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
			$q1="SELECT id FROM fare_chart WHERE id='".$id."' LIMIT 1";
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

		
		$flag=true;

		$query="INSERT INTO fare_chart SET route='".mysqli_real_escape_string($db,$_POST['route'])."',";
		$query.="vehicle='".mysqli_real_escape_string($db,$_POST['vehicle'])."',";
		$query.="id='".$id."'";
		if(mysqli_query($db,$query)){
				
			$i=0;
			$j=0;
			
			$query2="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
			if($rows2=mysqli_query($db,$query2)){
				while($row2=mysqli_fetch_array($rows2,MYSQLI_BOTH)){
					$j=0;
					
					$qug="SELECT stop_id FROM route_details WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."'";
					if($rors=mysqli_query($db,$qug)){
						while($ror=mysqli_fetch_array($rors,MYSQLI_BOTH)){
							
						
								if($j>=$i){
									
								}else{
									$fare=mysqli_real_escape_string($db,$_POST[$row2['stop_id']."_".$ror['stop_id']]);
									
									$fq="INSERT INTO fare_chart_details SET id='".$id."',route='".mysqli_real_escape_string($db,$_POST['route'])."',source='".$row2['stop_id']."',destination='".$ror['stop_id']."',fare='".$fare."'";
									if(mysqli_query($db,$fq)){
									
										$flag=$flag && true;
									}else{
										$flag=$flag && false;
									
									}
								}
								
							
							
							$j++;
						}
					}
					
					$i++;
				}
			}
		}else{
			$flag=$flag && false;
		
		}
		
		if($flag){
			echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>Fare Chart added.</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Unable to add Fare Chart. Try again.</h1>".mysqli_error($db);
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

.row_54g{
	display:table-row;
}
.row_54g .column_78k{
	display:table-cell;
}
.row_54g .column_78k input{
	width:100px;
	padding:5px;
}
.row_54g#column_title{
	background:orange;
	font-size:15px;
	padding:5px;
}

.row_54g .column_78k#row_title{
	background:orange;
	font-size:15px;
	padding:5px;
	
}
</style>


<form name="create_form" method="post" action="add.php">
<h1>
	Make a Fare Chart
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


<div id="schedular">

</div>


<br><br>
<label><div>
<input type="submit" value="Create fare chart" name="submit">
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