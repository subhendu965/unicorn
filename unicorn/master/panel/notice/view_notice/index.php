<?php 
$folder_layer=4;
$rootpath="";
for($i=0;$i<$folder_layer;$i++){
	$rootpath.="../";
}


require_once("../../../header.php");


if($logged===true){
	
}else{
	header("location:/master/login");
	die();
}

if(isset($_POST['submit'])){
	if(isset($_POST['title']) && !empty(trim($_POST['title'])) && isset($_POST['target']) && !empty(trim($_POST['target'])) && isset($_POST['message']) && !empty(trim($_POST['message']))){
		do{
			$id=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,10);
			$q1="SELECT id FROM master_notification WHERE id='".$id."' LIMIT 1";
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
		
		$query="INSERT INTO master_notification SET id='".$id."',title='".mysqli_real_escape_string($db,$_POST['title'])."',message='".mysqli_real_escape_string($db,$_POST['message'])."',target='".$_POST['target']."'";
		if(mysqli_query($db,$query)){
			echo "<h1 style='background:gold; font-size:20px; padding:10px; color:blue;'>Notice has been posted.</h1>";
		}else{
			echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Something Went Wrong. Try again!</h1>";
		}
	
	}else{
		echo "<h1 style='background:red; font-size:20px; padding:10px; color:white;'>Please Fill all the fields</h1>";
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

	#main_area{
		margin:20px auto;
		max-width:90%;
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
	#main_area .table_row .table_row_items.title{
		width:200px;
		/*overflow:auto;*/
	}
	#main_area .table_row .table_row_items.message{
		width:500px;
		/*overflow:auto;*/
	}
	#main_area .table_row .table_row_items.target{
		width:60px;
	}
	#main_area .table_row .table_row_items.datetime{
		width:100px;
	}
	#main_area .table_row .table_row_items.edit{
		width:60px;
	}
	#main_area .table_row .table_row_items.delete{
		width:60px;
	}
	
</style>


<div id="main_area">
<h1>
	Notice Posted
</h1>
<br>
		<div>
			<?php
				$query="SELECT * FROM master_notification";
				if($rows=mysqli_query($db,$query)){
					$i=1;
					
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>Sl.</div>";
						echo "<div class='table_row_items title'>Title</div>";
						echo "<div class='table_row_items message'>Message</div>";
						echo "<div class='table_row_items target'>Target</div>";
						echo "<div class='table_row_items datetime'>Datetime</div>";
						echo "<div class='table_row_items edit'>Edit</div>";
						echo "<div class='table_row_items delete'>Delete</div>";
						echo "</div>";
						
					while($row=mysqli_fetch_array($rows,MYSQLI_BOTH)){
						echo "<div class='table_row'>";
						echo "<div class='table_row_items sl'>".$i."</div>";
						echo "<div class='table_row_items title'>".$row['title']."</div>";
						echo "<div class='table_row_items message'>".$row['message']."</div>";
						echo "<div class='table_row_items target'>".$row['target']."</div>";	
						echo "<div class='table_row_items datetime'>".$row['datetime']."</div>";	
						echo "<div class='table_row_items edit'><a href='edit.php?id=".$row['id']."'>Edit</a></div>";	
						echo "<div class='table_row_items delete'><a href='delete.php?id=".$row['id']."'>Delete</a></div>";	
						
						echo "</div>";
						$i++;
					}
				}
			?>
		</div>
</div>

</body>
</html>