<?php
$folder_layer=3;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../header.php");


if($logged===true){
	
}else{
	header("location:/master/login");
	die();
}



?>

<style>
	#main_area{
		margin:20px auto;
		max-width:80%;
	}
	
	#main_area .table_row{
		display:block;
		border-bottom:1px solid black;
	}
	#main_area .table_row:first-child{
		background:#f0b267;
	}
	#main_area .table_row .table_row_items{
		display:inline-block;
		padding:10px;
	}
	#main_area .table_row .table_row_items.sl{
		width:20px;
	}
	#main_area .table_row .table_row_items.email{
		width:400px;
	}
	#main_area .table_row .table_row_items.phone{
		width:100px;
	}
	#main_area .table_row .table_row_items.code{
		width:100px;
	}
</style>

	<div id="main_area">
		<h1>
		Admin Requests
		</h1>
		
		<div>
			<?php
				$query="SELECT * FROM create_admin";
				if($rows=mysqli_query($db,$query)){
					$i=1;
					
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>Sl.</div>";
						echo "<div class='table_row_items email'>Email</div>";
						echo "<div class='table_row_items phone'>Phone</div>";
						echo "<div class='table_row_items code'>Code</div>";
						echo "<div class='table_row_items code'>Status</div>";
						echo "<div class='table_row_items code'>ID</div>";
						echo "</div>";
						
					while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>".$i."</div>";
						echo "<div class='table_row_items email'>".$row['email']."</div>";
						echo "<div class='table_row_items phone'>".$row['phone']."</div>";
						echo "<div class='table_row_items code'>".$row['code']."</div>";
						
						
						
						$nq="SELECT email,id FROM admins WHERE email='".$row['email']."' LIMIT 1";
						if($rs=mysqli_query($db,$nq)){
							if($r=mysqli_fetch_array($rs,MYSQLI_BOTH)){
								if($r['email']==$row['email']){
									echo "<div class='table_row_items code'>";
									echo "Enrolled";
									echo "</div>";
									
									echo "<div class='table_row_items code'>";
									echo "<a href='/master/view_admin/?id=".$r['id']."'>".$r['id']."</a>";
									echo "</div>";
									
								}else{
									echo "<div class='table_row_items code'>";
									echo "-";
									echo "</div>";
									echo "<div class='table_row_items code'>";
									echo "-";
									echo "</div>";
								}
							}else{
								echo "<div class='table_row_items code'>";
								echo "-";
								echo "</div>";
								echo "<div class='table_row_items code'>";
									echo "-";
									echo "</div>";
							}
						}else{
							echo "<div class='table_row_items code'>";
							echo "-";
							echo "</div>";
							echo "<div class='table_row_items code'>";
							echo "-";
							echo "</div>";
						}
						
						
						echo "</div>";
						$i++;
					}
				}
			?>
		</div>
	</div>
</body>
</html>
