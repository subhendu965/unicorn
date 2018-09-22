<?php

?>

<html>
<head>
<title>Welcome to Unicorn Bus Service</title>
</head>

<style>
body{
	margin:0px;
	padding:0px;
	font-family:tahoma,ubuntu;
}
#banner_img{
	width:100%;
	height:100%;
	background:url("./images/busq.jpg");
	background-size:cover;
	background-position:center center;
	
}
#wel{
	text-align:center;
	margin:8% auto 0% auto;
}

#wel_wel{
	color:white;
	font-size:30px;
	padding:5px 0px;
}
#wel_uni{
	color:gold;
	font-size:90px;
	font-weight:bold;
	padding:5px 0px;
}
#wel_ser{
	font-size:20px;
	padding:5px 0px;
	color:white;
}
#know{
	text-align:center;
}
#know a{
	text-decoration:none;
	color:white;
}

#know a>div{
	padding:10px 20px;
	width:250px;
	font-size:25px;
	border:3px solid white;
	margin:5px auto;
	background:rgba(255,255,255,0.2);
	border-radius:500px;
	cursor:pointer;
	
	transition:background 0.3s, color 0.3s;
	
}
#know a>div:hover{
	background:white;
	color:rgb(58,5,131);
}

#header{
	position:absolute;
	bottom:0px;
	width:100%;
	text-align:center;
	padding:10px 0px;
	background:url("./images/trans.png");
	background-size:cover;
	background-position:center top;
	transition:background 0.3s;
}
#header_logo{
	display:inline-block;
	font-size:36px;
	color:gold;
	transform:scale(0,0);
	transform-origin:50% 50%;
	width:0px;
	height:0px;
	opacity:0;
	overflow:hidden;
	transition: opacity 0.5s, transform 0.5s;
}
#header_menu{
	display:inline-block;
}
.header_menu_item{
	display:inline-block;
	padding:8px 12px 5px 12px;
	font-size:25px;
	color:white;
	cursor:pointer;
	border-bottom:3px solid transparent;
	transition:border-color 0.3s;
}
.header_menu_item:hover{
	border-color:gold;
}
/*----------------------------------------------------------*/
#dddeader{
	text-align:center;
	font-size:40px;
	padding:30px 0px 0px 0px;
}
.lop{
	margin:20px auto;
	padding:20px;
	width:70%;
	font-size:25px;
	line-height:35px;
	border-top:10px solid;
	box-shadow:rgba(0,0,0,0.3) 0px 2px 5px 1px;
	border-radius:0px 0px 20px 20px;
}
.lop:nth-child(2){
	border-color:rgba(231,35,128,0.4);
}

.lop:nth-child(3){
	border-color:rgba(15,88,179,0.4);
}

.lop:nth-child(4){
	border-color:rgba(22,114,50,0.4);
}
.opa{
	width:150px;
	height:150px;
	float:left;
	display:flex;
	background-size:60%;
	background-repeat:no-repeat;
	background-position:center center;
	border-radius:500px;
}
#op1{
	background-color:#e72380;
	background-image:url("./images/bb.png");
}
#op2{
	background-color:#0f58b3;
	background-image:url("./images/busi.png");
}
#op3{
	background-color:#167232;
	background-image:url("./images/scl.png");
}
#wutext{
	display:flex;
	padding-left:20px;
}

/*--------------------------------------*/
#header[my_id='fixedStyle']{
	position:fixed;
	bottom:auto;
	top:0px;
	//background-color:rgb(192,10,129);
	background:url("./images/busq.jpg");
	background-size:cover;
	background-position:center 97%;
	box-shadow:rgb(0,0,0,0.4) 0px 2px 4px 2px;
}
#header[my_id='fixedStyle'] #header_menu{
	float:right;
	margin-right:20px;
}

#header[my_id='fixedStyle']  #header_logo{
	float:left;
	transform:scale(1,1);
	width:auto;
	height:auto;
	opacity:1;
	margin-left:20px;
}
/*-------------------------------------------*/
</style>

<body>
	<div id="banner_img">
	<div style="height:0px; color:transparent; font-size:1px;">&nbsp;</div>
		<div id="wel">
			<div id="wel_wel">Welcome to</div>
			<div id="wel_uni">Unicorn</div>
			<div id="wel_ser">
				24 X 7 service for you!
			</div>
			
		</div>
		<br><br>
		<div id="know">
			<a><div>Know More</div></a>
		</div>
		
		<div>
			<header id="header">
				<div id="header_logo">
				Unicorn
				</div>
				<div id="header_menu">
					<a href="/user/login"><div class="header_menu_item">User</div></a>
					<a href="/admin/login"><div class="header_menu_item">Admin</div></a>
					<a href="/master/login"><div class="header_menu_item">Master</div></a>
				</div>			
			</header>
		</div>
		
	</div>
	<div>
		<header id="dddeader">Why Unicorn?</header>
		<div class="lop">
			<div id="op1" class="opa">&nbsp;</div>
			<div id="wutext">
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			</div>
		</div>
		<div class="lop">
			<div id="op2" class="opa">&nbsp;</div>
			<div id="wutext">
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			</div>
		</div>
		<div class="lop">
			<div id="op3" class="opa">&nbsp;</div>
			<div id="wutext">
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			Hey do you know, unicorn is the world's best service where you can go without effort? We arrange a lot of 
			services like bus, motor, taxi etc. 
			</div>
		</div>
		
		
	</div>
	
</body>
<script>
	headerUni = document.querySelector("#header");
	bannerUni = document.querySelector("#banner_img");
	document.addEventListener("scroll",headerScrolled,false);
	
	function headerScrolled(){
		var my_pos = bannerUni.clientHeight-headerUni.clientHeight;
		if(my_pos <= window.scrollY){
			headerUni.setAttribute("my_id","fixedStyle");
		}else{
			headerUni.setAttribute("my_id","");
		}
	}
</script>
</html>
