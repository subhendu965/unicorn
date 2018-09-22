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




function idToStop($id){
	global $db;
	$query="SELECT stop FROM stop WHERE id='".$id."' LIMIT 1";
	if($rows=mysqli_query($db,$query)){
		if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			return $row['stop'];
		}
	}
}

if(isset($_GET['id']) && !empty($_GET['id'])){
	
}else{
	echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>There are some errors. Unable to show ticket.</h1>";
	die();
}


////////////////////////////////////fetching ticket details//////////////////////////
$query="SELECT * FROM ticket_history WHERE id='".mysqli_real_escape_string($db,$_GET['id'])."' LIMIT 1";
if($rows=mysqli_query($db,$query)){
	if($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
		$qu2="SELECT email,name FROM users WHERE email='".$row['username']."' LIMIT 1";
		if($rwws=mysqli_query($db,$qu2)){
			if($rww=mysqli_fetch_array($rwws,MYSQLI_BOTH)){
				$row['username']=$rww['email'];
				$row['name']=$rww['name'];
			
			}else{
				echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Invalid Information</h1>";
				die();
			}
		}
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Inavalid Ticket Number</h1>";
		die();
	}
}

?>
<style>

body{
	background:#ccc;
}
#main{
	max-width:75%;
	background:white;
	margin:1px auto;
}
#ticket_header{
	padding:10px;
	text-align:center;
	border-bottom:1px solid black;
}
#ticket_header #title{
	font-size:35px;
	font-weight:bold; 
}
#ticket_header #address{
	font-size:17px;
}
#details{
	padding:10px 30px;
	font-size:17px;
	text-align:-webkit-center;
	text-align:-moz-center;
	text-align:-ms-center;
	text-align:-o-center;
}

#details .row{
	display:table-row;
}
#details .column{
	display:table-cell;
	text-align:left;
	padding:5px 30px;
	border-bottom:1px solid black;
}

#declaration{
	font-size:15px;
	font-style:italic;
	text-align:left;
	padding:20px;
	border-top:1px solid black;
}
#details .row .column:first-child{
	background:#ddd;
}

[name='print_ticket']{
		margin:30px auto;
		padding:5px 10px;
		width:200px;
		font-size:25px;
}
@media print{
	[name='print_ticket']{
		display:none;
	}
	
	#main{
		max-width:100%;
	}
	#header{
		display:none;
	}
			
	#details .row .column:first-child{
		background:none;
	}

}

</style>

<div id="main">

<header id='ticket_header'>
	<div id="title">Unicorn Bus Service</div>
	<div id="address">Arambagh, Hooghly, West Bengal, 712601</div>
</header>

<div id='details'>
	<div class='row'>
		<div class='column'>Ticket ID</div>
		<div class='column'><?php echo $row['id']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Name</div>
		<div class='column'><?php echo $row['name']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Date of journey</div>
		<div class='column'><?php echo $row['date_of_journey']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Source stop</div>
		<div class='column'><?php echo idToStop($row['source']); ?></div>
	</div>
	<div class='row'>
		<div class='column'>Destination stop</div>
		<div class='column'><?php echo idToStop($row['destination']); ?></div>
	</div>
	<div class='row'>
		<div class='column'>Time of departure</div>
		<div class='column'><?php echo $row['depart_time']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Time of arrival</div>
		<div class='column'><?php echo $row['arrival_time']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Route</div>
		<div class='column'><?php echo $row['route']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Vehicle</div>
		<div class='column'><?php echo $row['vehicle']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Person</div>
		<div class='column'><?php echo $row['person']; ?></div>
	</div>
	<div class='row'>
		<div class='column'>Fare</div>
		<div class='column'><?php echo ($row['amount']/$row['person']); ?></div>
	</div>
	<div class='row'>
		<div class='column'>Total Amount</div>
		<div class='column'><?php echo $row['amount']; ?></div>
	</div>
</div>

<div id='declaration'>
	This ticket is automatically computer generated and all the details are reserved to unicorn. Details of user is given by the user. Unicorn is not liable for any type of 
	data corruption.
</div>

</div>
<center>
<button onclick="printTicket()" name='print_ticket'>Print Ticket</button>
</center>

<script>
function printTicket(){
	window.print();
}
</script>
