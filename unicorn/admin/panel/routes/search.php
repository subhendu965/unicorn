<?php

function depotSearch($str,$db){
	$query="SELECT depot,id FROM depot WHERE depot LIKE '%".$str."%' LIMIT 5";
	if($rows=mysqli_query($db,$query)){
		while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			echo "<div class='found_item' stpid=".$row['id'].">".$row['depot']."</div>";
		}
	}
	
}
function stopSearch($str,$db){
	$query="SELECT stop,id FROM stop WHERE stop LIKE '%".$str."%' LIMIT 5";
	if($rows=mysqli_query($db,$query)){
		while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
			echo "<div class='found_item' stpid=".$row['id'].">".$row['stop']."</div>";
		}
	}
	
}


if(isset($_POST['str']) && !empty(trim($_POST['str'])) && isset($_POST['item']) && !empty(trim($_POST['item']))){
	
	$db=mysqli_connect("localhost","unicorn","Tiku4&Vuchu5","unicorn") or die("Unable to connect db");
	$str=mysqli_real_escape_string($db,trim($_POST['str']));
	
	$query="SELECT stop FROM stop WHERE stop LIKE '%".$str."%'";
	
	switch($_POST['item']){
		case "stop":
			stopSearch($str,$db);
			break;
		case "depot":
			depotSearch($str,$db);
			break;
		default:
			$query="SELECT stop FROM stop WHERE stop LIKE '%".$str."%'";
	}
	

	
}
?>