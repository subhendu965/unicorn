<?php
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");

if($logged===true){
	
}else{
	header("location:/user/login");
}

if(isset($_POST['submit'])){
	$source=Array();
	$list_found=Array();
	$f=0;
	//$stops=Array("0","0");
	$stops=explode(",",$_POST['stops']);
	

	if($stops[0]==$stops[1]){
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Source and destination is same!</h1>";
	}else{
		///////////////////////////check proper  source//////////////////////
		$query="SELECT stop_id,name FROM route_details WHERE stop_id='".mysqli_real_escape_string($db,$stops[0])."'";
		if($rows=mysqli_query($db,$query)){
			$i=0;
			while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
				$source[$i]=$row['name'];
				//$flag=$flag && true;
				$i++;
			}
			
			if($i==0){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Source Incorrect df.</h1>";
				//$flag=false;
			}
			
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Source Incorrect.</h1>";
			//$flag=false;
		}
		
		//print_r($source);
		
		///////////////////////////check proper  dest//////////////////////
		$query="SELECT stop_id,name FROM route_details WHERE stop_id='".mysqli_real_escape_string($db,$stops[1])."'";
		if($rows=mysqli_query($db,$query)){
			$i=0;
			
			while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
				foreach($source as $src){
					if($src==$row['name']){
						$list_found[$f]=$row['name'];
						$f++;
					}
				}
				//$flag=$flag && true;
				$i++;
			}
			
			if($i==0){
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Destination Incorrect fs.</h1>";
				//$flag=false;
			}
			
		}else{
			//$flag=$flag && false;
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Destination Incorrect.</h1>".mysqli_error($db);
		}
		
		if($f!=0){
			//echo $f." route(s) found only source and destination  not ac standing and nonstopp";
			$rr=0;
			for($i=0;$i<count($list_found);$i++){
				
				///////////////AC standing and nonstop searching ///////////////////////
				$query="SELECT name FROM routes WHERE (name='".$list_found[$i]."' AND ac='".(int)(mysqli_real_escape_string($db,$_POST['ac']))."' AND nonstop='".(int)(mysqli_real_escape_string($db,$_POST['nonstop']))."' AND standing='".(int)(mysqli_real_escape_string($db,$_POST['standing']))."')";
				if($rows=mysqli_query($db,$query)){
				
					while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
						$found_cnd[$rr]=$row['name'];
						$rr++;
						
						
						////////////day searching////////////////
						$day=strtolower(date("l",mysqli_real_escape_string($db,strtotime($_POST['date']))));
						$dfc=0;
						
						$qwe="SELECT id FROM day_schedule WHERE ".$day."=1 AND route='".$row['name']."'";
						if($rty=mysqli_query($db,$qwe)){
							while($rff=mysqli_fetch_array($rty,MYSQLI_BOTH)){
								
								///////////////
								$day_fnd_cnd[$dfc]=$rff['id'];
								
								$dfc++;
							}
							
							if($dfc>0){
								print_r($day_fnd_cnd);
							}else{
								echo "Not found";
							}
						}
						
					}
					
				}else{
					
				}
			}
			
			//echo $rr." route(s) found after AC nonstop and standing";
			//print_r($list_found);
			//print_r($found_cnd);
			
			
		}
		
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


<form name="create_form" method="post" action="index.php"  onsubmit="return chkSubmit()">
<h1>
	Search Your Journey
</h1>
<br>


<label><div>
Source: <input type="search" name="source" hb_code='input' onkeyup="searchKey(this,'stop')" onfocus="changeTarget('source')" autocomplete="off" />
</div></label>

<label><div>
Destination: <input type="search" name="destination" hb_code='input' onkeyup="searchKey(this,'stop')" onfocus="changeTarget('destination')" autocomplete="off" />
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
Date: <input type='date' name="date" hb_code='input' min="<?php echo date("Y-m-d",time()); ?>" max="<?php echo date("Y-m-d",strtotime('+1year'));?>" value="<?php echo date("Y-m-d",time()); ?>" />
</div></label>

<label><div>
Time From: <input type='time' />
</div></label>

<input type="hidden" name="stops" id="stops_field" />

<div id="ret_list">
</div>


<label><div>
<input type="submit" value="Search" name="submit">
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
	
	document.title=arrCounter;
}
function deleteStop(item){
	
	stopsArr.splice(item,1);
	stopsArrName.splice(item,1);
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
		
	}	
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