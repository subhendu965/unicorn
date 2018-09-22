<?php

?>
<style>

form[name=add_bus_form]{
	width:60%;
	margin:auto;
	font-size:20px;
}
form[name=add_bus_form]>label>div{
	clear:both;
}
form[name=add_bus_form] [hb_code='input']{
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
form[name=add_bus_form] [hb_code='input']:hover{
	background:rgba(20,150,220,0.07);
	border-color: black;
	box-shadow:#57a 0px 0px 5px;
}
</style>

<form name="add_bus_form" method="post" action="">

<label><div>
Bus No: <input type="text" name="bus_no" hb_code='input' />
</div></label>

<label><div>
From: 
<select name="bus_from" hb_code='input'></select>
</div></label>

<label><div>
To: 
<select name="bus_to" hb_code='input'></select>
</div></label>

<label><div>
Type: 
<select name="bus_type" hb_code='input'></select>
</div></label>

<label><div>
Departure time: <input type="text" name="bus_departure_time" hb_code='input' />
</div></label>

<label><div>
Arrival time: <input type="text" name="bus_arrival_time" hb_code='input' />
</div></label>

<label><div>
Seats: 
<select name="bus_seats" hb_code='input'></select>
</div></label>
</form>
