<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>OMTBS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style_thukaraka.css" type="text/css" />
</head>

<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"> <a href="index.php"><img src="images/t-logo.png"  alt="Logo Image Here"/></a></div>
	<ul class="links">
		<li ><a href="index.php " >Home</a></li>
		<li><a href="movies_events.php">Movies</a></li>
    	<li><?php if(isset($_SESSION['user'])){
			  		   $us=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
        $user=mysqli_fetch_array($us);?>
        <a href="profile.php"><?php echo $user['name'];?></a></li>
        <li><a href="logout.php">Logout</a><?php }else{?><a href="login.php">Login</a></li>
      	<li><a href="registration.php">Register</a><?php }?></li>
      	<form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
			<fieldset>
				<div class="field" >
					<input type="text" placeholder="Enter A Movie Name" style="height:30px;width:250px"  required id="search111" name="search">
					<input type="submit" value="Search" style="height:30px;padding-top:3px" id="button111">
				</div>       	
			</fieldset>
      	</form>
		 
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

<div class="container"></div>

<script>
function myFunction() {
     if($('#hero-demo').val()=="")
        {
            alert("Please enter movie name...");
            return false;
        }
    else{
        return true;
    }
 
"use strict";
var underlineMenuItems = document.querySelectorAll("ul li");
underlineMenuItems[0].classList.add("active");
underlineMenuItems.forEach(function (item) {
    item.addEventListener("click", function () {
        underlineMenuItems.forEach(function (item) { return item.classList.remove("active"); });
        item.classList.add("active");
    });
});
That’s It. Now you have succes
</script>

