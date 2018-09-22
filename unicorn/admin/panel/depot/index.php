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
	#main_area{
		margin:20px auto;
		max-width:100%;
	}
	#main_inner{
		text-align: -webkit-center;
		text-align: -moz-center;
		text-align: -ms-center;
		text-align: -o-center;
	}
	#main_area .table_row{
		display:table-row;
	}
	#main_area .table_row:first-child{
		background:#f0b267;
	}
	#main_area .table_row .table_row_items{
		display:table-cell;
		border-bottom:1px solid black;
		padding:10px;
	}
	/*
	#main_area .table_row .table_row_items.sl{
		width:20px;
	}
	#main_area .table_row .table_row_items.depot{
		width:150px;
		/*overflow:auto;
	}
	#main_area .table_row .table_row_items.address{
		width:200px;
		/*overflow:auto;
	}
	#main_area .table_row .table_row_items.type{
		width:60px;
	}
	#main_area .table_row .table_row_items.vehicles{
		width:150px;
	}
	#main_area .table_row .table_row_items.passenger_capacity{
		width:60px;
	}
	#main_area .table_row .table_row_items.vehicle_capacity{
		width:60px;
	}
	#main_area .table_row .table_row_items.shop{
		width:25px;
	}
	#main_area .table_row .table_row_items.restaurant{
		width:25px;
	}
	#main_area .table_row .table_row_items.guest_room{
		width:25px;
	}
	#main_area .table_row .table_row_items.toilet{
		width:25px;
	}
	#main_area .table_row .table_row_items.free_wifi{
		width:25px;
	}
	#main_area .table_row .table_row_items.carshed{
		width:25px;
	}
	#main_area .table_row .table_row_items.no_of_quarter{
		width:40px;
	}
	#main_area .table_row .table_row_items.no_of_employee{
		width:40px;
	}
	#main_area .table_row .table_row_items.id{
		width:60px;
	}
	#main_area .table_row .table_row_items.remark{
		width:80px;
	}
	#main_area .table_row .table_row_items.edit{
		width:40px;
	}
	#main_area .table_row .table_row_items.delete{
		width:40px;
	}
*/
	
	#main_area #depot_action{
		margin:20px auto;
		max-width:90%;
	}
</style>
<div id="main_area">
<div id="main_inner">
	<div id="avail_epot">
		<?php
				$query="SELECT * FROM depot";
				if($rows=mysqli_query($db,$query)){
					$i=1;
					
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>Sl.</div>";
						echo "<div class='table_row_items depot'>Depot</div>";
						echo "<div class='table_row_items address'>Address</div>";
						echo "<div class='table_row_items type'>Type</div>";
						echo "<div class='table_row_items passenger_capacity' title='Passenger Capacity'>PC</div>";
						echo "<div class='table_row_items vehicle_capacity' title='Passenger Capacity'>VC</div>";
						echo "<div class='table_row_items shop'>Shop</div>";
						echo "<div class='table_row_items restaurant' title='Restaurant'>Rsst.</div>";
						echo "<div class='table_row_items guest_room' title='Guest Room'>GR</div>";
						echo "<div class='table_row_items toilet'>Toilet</div>";
						echo "<div class='table_row_items free_wifi' title='Free Wifi'>FW</div>";
						echo "<div class='table_row_items carshed' title='Carshed'>CS</div>";
						echo "<div class='table_row_items no_of_quarter' title='No Of Quarter'>NQ</div>";
						echo "<div class='table_row_items no_of_employee' title='No of Employee'>NE</div>";
						echo "<div class='table_row_items id'>ID</div>";
						echo "<div class='table_row_items remark'>Remark</div>";
						echo "<div class='table_row_items edit'>Edit</div>";
						echo "<div class='table_row_items delete'>Delete</div>";
						echo "</div>";
						
					while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>".$i."</div>";
						echo "<div class='table_row_items depot'>".$row['depot']."</div>";
						echo "<div class='table_row_items address'>".$row['address']."</div>";
						echo "<div class='table_row_items type'>".$row['type']."</div>";	
						echo "<div class='table_row_items passenger_capacity' title='Passenger Capacity'>".$row['passenger_capacity']."</div>";
						echo "<div class='table_row_items vehicle_capacity' title='Passenger Capacity'>".$row['vehicle_capacity']."</div>";
						echo "<div class='table_row_items shop'>".$row['shop']."</div>";
						echo "<div class='table_row_items restaurant' title='Restaurant'>".$row['restaurant']."</div>";
						echo "<div class='table_row_items guest_room' title='Guest Room'>".$row['guest_room']."</div>";
						echo "<div class='table_row_items toilet'>".$row['toilet']."</div>";
						echo "<div class='table_row_items free_wifi' title='Free Wifi'>".$row['free_wifi']."</div>";
						echo "<div class='table_row_items carshed' title='Carshed'>".$row['carshed']."</div>";
						echo "<div class='table_row_items no_of_quarter' title='No Of Quarter'>".$row['no_of_quarter']."</div>";
						echo "<div class='table_row_items title='No of Employee'>".$row['no_of_employee']."</div>";	
						echo "<div class='table_row_items id'>".$row['id']."</div>";	
						echo "<div class='table_row_items remark'>".$row['remark']."</div>";	
						echo "<div class='table_row_items edit'><a href='edit.php?id=".$row['id']."'>Edit</a></div>";
						echo "<div class='table_row_items delete'><a href='delete.php?id=".$row['id']."'>Delete</a></div>";
						
						echo "</div>";
						$i++;
					}
				}
			?>
	</div>
	
	<div id="depot_action">
		<a href="add.php">Add Depot</a>
	</div>

</div>
</div>