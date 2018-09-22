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







?>



<style>
#initial{
	font-size:15px;
}
	input[hb_code='input']{
	border:1px solid #57a;
	font-size:15px;
	padding:5px 8px;
	margin:8px;
	background:white;
	box-shadow:black 0px 0px 1px;
	outline:none;
	transition:border 0.3s, background 0.3s, box-shadow 0.3s;

}
input[hb_code='input']:hover{
	background:rgba(20,150,220,0.07);
	border-color: black;
	box-shadow:#57a 0px 0px 5px;
}
#lower{
	padding:10px;
	width:100%;
}

#lower #seats .rows{
	display:block;
}

#lower #seats .cols{
	display: inline-block;
}


#lower #seats .seat{
	height:100px;
	width:60px;
	border: 1px solid black;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: contain;
	color:red;
	font-size: 12px;
	font-weight: bold;
}
#lower #seats .seat[cell-val="true"]{
	background-image:url("/images/seat_empty.png");
	
}
#lower #seats .seat[cell-val="false"]{
	background-image:none;
}
#lower #seats .seat[steering="true"]{
	background-image:url("/images/str.png");
}
</style>

<h1>Make a seat matrix</h1>
<hr>
<div id="initial">
	Name: <input type="text" placeholder="Unique" hb_code='input' onblur="checkAvail(this)">
	Type: <input type="text" placeholder="e.g. Bus" hb_code='input'>
	Manufacturer:  <input type="text" placeholder="e.g. TATA" hb_code='input'>
	Model: <input type="text" placeholder="e.g. Marcopolo" hb_code='input'>
	<span id="indi85"></span>
	<hr>
	Row: <input type="number" id="rows" placeholder="Row" hb_code='input' onchange="drawCells();" value="1">
	Column: <input type="number" id="cols" placeholder="Column" hb_code='input' onchange="drawCells();" value="1">

	<button onclick="clearAll()">Clear All</button>
	<button>Submit</button>
</div>
<div id="lower">
	<center>
	<div id="seats">
		
	</div>
	</center>
</div>


<script>
univStr="";
counter=1;

	function checkAvail(txt){
		request=new XMLHTTPRequest();
		var url="checkName.php";
		request.open("POST",url,true);
		request.onReadyState=function (){

		}

		request.send(null);
	}

	function drawCells(){
		
		rows=parseInt(document.querySelector("#rows").value);
		cols=parseInt(document.querySelector("#cols").value);

		//document.title=rows+","+cols;

		var str="";
		//check
		if(rows>0 && rows<10001 && cols>0 && cols<101){
			for(i=0;i<rows;i++){
				str+="<div class='rows' >";
				for(j=0;j<cols;j++){
					
					if(i==0 && j==cols-1){
						str+="<div class='cols seat' cell-addr='"+(i*cols+j)+"' cell-val=\"false\" have-seat='false' steering=\"true\" >&nbsp;</div>";

					}else{
						str+="<div class='cols seat' cell-addr='"+(i*cols+j)+"' cell-val=\"false\" have-seat='false' onclick='clickedSeat(this)'>&nbsp;</div>";

					}
				}
				str+="</div>";
			}

			document.querySelector("#lower #seats").innerHTML=str;
			univStr="";
			counter=1;
		}else{
			alert("Row range 1 to 1000 and column range 1 to 100");
			document.querySelector("#rows").value="1";
			document.querySelector("#cols").value="1";

		}
	}

	function clickedSeat(st){
		if(st.getAttribute("cell-addr")!=cols-1){
			if(st.getAttribute("cell-val")=="true"){
				st.setAttribute("cell-val","false");
				st.innerHTML="&nbsp;";
				counter--;
			}else{
				st.setAttribute("cell-val","true");
				st.innerHTML=counter;
				counter++;
			}
		}
		

		//alert("done");
	}

	function clearAll(){
		document.querySelector("#lower #seats").innerHTML="";
		counter=1;
		univStr="";
	}

</script>