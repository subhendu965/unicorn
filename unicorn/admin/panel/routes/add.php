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
	$stops=explode(",",$_POST['stops']);
	if(isset($_POST['route']) && !empty(trim($_POST['route'])) && isset($_POST['source']) && !empty(trim($_POST['source'])) && isset($_POST['destination']) && !empty(trim($_POST['destination']))){
	
		//////check if the route name is already exists///////////
		$query="SELECT * FROM routes WHERE name='".mysqli_real_escape_string($db,$_POST['route'])."' LIMIT 1";
		if($row=mysqli_query($db,$query)){
			if($row=mysqli_fetch_array($row,MYSQLI_BOTH)){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Route name is already exists.</h1>";
				$flag=false;
			}else{
				$flag=true;
			}
			
		}else{
			$flag=true;
			
		}
		
		///////////////////////////check proper  source//////////////////////
		$query="SELECT depot FROM depot WHERE id='".mysqli_real_escape_string($db,$stops[0])."' LIMIT 1";
		if($row=mysqli_query($db,$query)){
			if($row=mysqli_fetch_array($row,MYSQLI_BOTH)){
				$flag=$flag && true;
			}else{
				$flag=$flag && false;
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Source Incorrect.</h1>";
			}
			
		}else{
			$flag=$flag && false;
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Source Incorrect.</h1>";
		}
		
		///////////////////////////check proper destination //////////////////////
		$query="SELECT depot FROM depot WHERE id='".mysqli_real_escape_string($db,$stops[count($stops)-1])."' LIMIT 1";
		if($row=mysqli_query($db,$query)){
			if($row=mysqli_fetch_array($row,MYSQLI_BOTH)){
				$flag=$flag && true;
			}else{
				$flag=$flag && false;
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Destination Incorrect.</h1>";
			}
			
		}else{
			$flag=$flag && false;
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Destination Incorrect.</h1>";
		}
		
		/////////////////////////check proper stops/////////////////////////
		foreach($stops as $stp){
			$query="SELECT stop FROM stop WHERE id='".mysqli_real_escape_string($db,$stp)."' LIMIT 1";
			if($row=mysqli_query($db,$query)){
				if($row=mysqli_fetch_array($row,MYSQLI_BOTH)){
					$flag=$flag && true;
				}else{
					$flag=$flag && false;
					echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Stop Incorrect.</h1>";
				}
				
			}else{
				$flag=$flag && false;
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Stop Incorrect.</h1>";
			}
		}
		
		
		if($flag){
			//////insert to routes//////////////////
			$query="INSERT INTO routes SET name='".mysqli_real_escape_string($db,$_POST['route'])."', ac='".(int)(mysqli_real_escape_string($db,$_POST['ac']))."', nonstop='".(int)(mysqli_real_escape_string($db,$_POST['nonstop']))."', standing='".(int)(mysqli_real_escape_string($db,$_POST['standing']))."', source='".mysqli_real_escape_string($db,$stops[0])."', destination='".mysqli_real_escape_string($db,$stops[count($stops)-1])."' ";
			if(mysqli_query($db,$query)){
				foreach($stops as $stp){
					$query="INSERT INTO route_details SET name='".mysqli_real_escape_string($db,$_POST['route'])."',stop_id='".mysqli_real_escape_string($db,$stp)."'";
					if(mysqli_query($db,$query)){
						$success=true;
					}else{
						$success=false;
					}
				}
				
			}else{
				$success=false;
			}
		}
		
		if(isset($success) && $success=true){
			echo "<h1 style='background:green; font-size:20px; padding:10px; color:white;'>Route created  successfully</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Sorry, Unable to add route. Try again.</h1>";
		}
		
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Provide all the fields.</h1>";
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


<form name="create_form" method="post" action="add.php"  onsubmit="return chkSubmit()">
<h1>
	Make a new Route
</h1>
<br>
<label><div>
Route: <input type="text" name="route" hb_code='input' />
</div></label>

<label><div>
AC Route: <select name="ac" hb_code='input'><option value="1">Yes</option><option value="0" selected>No</option></select>
</div></label>


<label><div>
Nonstop: <select name="nonstop" hb_code='input'><option value="1">Yes</option><option value="0" selected>No</option></select>
</div></label>


<label><div>
Standing: <select name="standing" hb_code='input'><option value="1" selected>Yes</option><option value="0">No</option></select>
</div></label>

<label><div>
Source: <input type="search" name="source" hb_code='input' onkeyup="searchKey(this,'depot')" onfocus="changeTarget('source')" autocomplete="off" />
</div></label>

<label><div>
Destination: <input type="search" name="destination" hb_code='input' onkeyup="searchKey(this,'depot')" onfocus="changeTarget('destination')" autocomplete="off" />
</div></label>

<label><div>
<a id="addStopLink" href='javascript:addTargetToDiv()' style="float:right;">Add</a>
Stops: <input type="search" name="stop" hb_code='input' onkeyup="searchKey(this,'stop')" onfocus="changeTarget('stop')" autocomplete="off" /> 

</div></label>
<input type="hidden" name="stops" id="stops_field" />

<br>
<div id="stopShowingArea"></div>
<br>

<div id="ret_list">
</div>


<label><div>
<input type="submit" value="Add Route" name="submit">
</div></label>

</form>

</body>

<style>


#ret_list{
	position:absolute;
	background:white;
	box-shadow:rgba(0,0,0,0.5) 0px 4px 10px 2px;
	display:none;
	padding-bottom:5px;
	border-radius:0px 0px 5px 5px;
	font-size:15px;
	overflow:hidden;
}
#ret_list>div{
	padding:5px 10px;
	transition:background 0.3s;
	cursor:pointer;
}
#ret_list>div:hover{
	background:#bcf;
}
#stopShowingArea{
	border:1px solid black;
	padding:10px;
	min-height:100px
}
#stopShowingArea .stops5h{
	display:inline-block;
	margin:5px;
	padding:5px 10px;
	font-size:15px;
	background:#57a;
	border-radius:50px;
	color:white;
}
</style>
<script>
var activeSearchBox;
var searchText;
var addTarget;

stopsArr=Array();
stopsArrName=Array();
arrCounter=0;

function chkSubmit(){
	document.querySelector("#stops_field").value=stopsArr;
	//alert(document.querySelector("#stops_field").value);
	return true;
}

function changeTarget(target){
	addTarget=target;
}

function searchKey(obj,item){
	activeSearchBox=obj;
	request=new XMLHttpRequest();
	request.open("POST","search.php",false);
	request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	request.onreadystatechange=chg;
	
	document.querySelector("#ret_list").style.top=obj.getBoundingClientRect().bottom+window.scrollY;
	document.querySelector("#ret_list").style.left=obj.getBoundingClientRect().left+window.scrollX;
	document.querySelector("#ret_list").style.width=obj.getBoundingClientRect().width;
	request.send("item="+item+"&str="+obj.value);
	

}

function chg(){
	searchText=activeSearchBox.value;
	if(request.status==200 && request.readyState==4){
		//alert(request.responseText)
		if(request.responseText.trim()==""){
			document.querySelector("#ret_list").style.display="";
		}else{
			document.querySelector("#ret_list").style.display="block";
			document.querySelector("#ret_list").innerHTML=request.responseText;
			
			divs56=document.querySelectorAll("#ret_list>div");
			for(var i=0;i<divs56.length;i++){
				divs56[i].addEventListener("click",function (){addText(this);},false);
				divs56[i].addEventListener("mousemove",function (){suggestText(this);},false);
				
			}
			
			document.querySelector("#ret_list").addEventListener("mouseout",function (){activeSearchBox.value=searchText;},false);
			activeSearchBox.addEventListener("keydown",function (){keyDownText(this);},false);
			
			elmAll=document.querySelectorAll("*");
			for(var i=0;i<elmAll.length;i++){
				elmAll[i].addEventListener("click",function (event){focusOutText(event)},false);
				
			}
			
		}
		
	}
}
function focusOutText(event){
	document.querySelector("#ret_list").style.display="";
	document.querySelector("#ret_list").innerHTML="";
}

function keyDownText(obj){
	activeSearchBox.value=searchText;
}
function suggestText(obj){
	activeSearchBox.value=obj.innerText;
	//activeSearchBox.blur();
}
function showList(){
	var strInDiv="";
	for(var i=0;i<stopsArr.length;i++){
		strInDiv+="<div class='stops5h'>"+stopsArrName[i]+" <a href='javascript:deleteStop("+i+")' style='color:white;'>X</a> </div>";
	}
	
	document.querySelector("#stopShowingArea").innerHTML=strInDiv;
	
	//document.title=arrCounter;
}
function deleteStop(item){
	
	stopsArr.splice(item,1);
	stopsArrName.splice(item,1);
	arrCounter--;
	showList();
}

function addTargetToDiv(id,txt){
	if(addTarget=="source"){
		stopsArr[0]=id;
		stopsArrName[0]=txt;
		arrCounter++;
	}else if(addTarget=="destination"){
		stopsArr[stopsArr.length]=id;
		stopsArrName[stopsArrName.length]=txt;
		
	}else if(addTarget=="stop"){
		var last=stopsArr.length;
		for(var j=last;j>arrCounter;j--){
			stopsArr[j]=stopsArr[j-1];
			stopsArrName[j]=stopsArrName[j-1];
		}
		stopsArr[arrCounter]=id;
		stopsArrName[arrCounter]=txt;
		
		arrCounter++;
	}
	showList();
	
}

function addText(obj){
	
	activeSearchBox.value=obj.innerText;
	searchText=obj.innerText;
	document.querySelector("#ret_list").style.display="";
	document.querySelector("#ret_list").innerHTML="";
	activeSearchBox.focus();
		
	if(addTarget=="source" || addTarget=="destination"){	
		addTargetToDiv(obj.getAttribute("stpid"),obj.innerText);
	}else if(addTarget=="stop"){
		document.querySelector("#addStopLink").href="javascript:addTargetToDiv('"+obj.getAttribute("stpid")+"','"+obj.innerText+"')";
	}
	
}
</script>

</html>