<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<style>
body {
	padding: 0;
	margin: 0;
}
.container {
	position: relative;
	margin-top: 100px;
}
ul {
  display: flex;
  padding: 0;
  margin: 0;
  list-style-type: none;
}
ul:hover li:not(:hover) a {
  opacity: 0.4;
  
}
ul li {
  position: relative;
  padding: 15px 18px 15px 18px;
  cursor: pointer;
  
}
ul li::after {
  position: absolute;
  content: "";
  top: 100%;
  left: 0;

  width: 100%;
  height: 2px;
  background: red;
  transform: scaleX(0);
  transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}
ul li:hover::after, ul li.active::after {
  transform: scaleX(1);
  
}
ul li a {
  position: relative;
  display: flex;
  color: white;
  text-decoration: none;
  transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
} 

.container img {
	display: block;
	width: 100%;
}
nav {
	position: fixed;
	z-index: 10;
	left: 0;
	right: 0;
	top: 0;
	padding: 0 5%;
	height: 100px;
	background-color: black;
}
nav .logo {
	float: left;
	height:75px;
  width:150px;
  padding-top:10px;
  display: flex;
	align-items: center;
	 
	 
}
nav .links {
	float: right;
	padding: 0;
	margin: 0;
	width: 60%;
	height: 100%;
	display: flex;
	justify-content: space-around;
	align-items: center;
}
nav .links li {
	list-style: none;
}
nav .links a {
	display: block;
	padding: 0.5em;
	font-size: 20px;
	font-weight: bold;
	color: #fff;
	text-decoration: none;
}
#nav-toggle {
	position: absolute;
	top: -100px;
}
nav .icon-burger {
	display: none;
	position: absolute;
	right: 5%;
	top: 50%;
	transform: translateY(-50%);
}
nav .icon-burger .line {
	width: 30px;
	height: 5px;
	background-color: #fff;
	margin: 5px;
	border-radius: 3px;
	transition: all .3s ease-in-out;
}
@media screen and (max-width: 768px) {
	nav .logo {
		float: none;
		width: 100px;
    height: 50px
	  justify-content: center;
	}
	nav .links {
		float: none;
		position: fixed;
		z-index: 9;
		left: 0;
		right: 0;
		top: 100px;
		bottom: 100%;
		width: auto;
		height: auto;
		flex-direction: column;
		justify-content: space-evenly;
		background-color: rgba(0,0,0,.8);
		overflow: hidden;
		box-sizing: border-box;
		transition: all .5s ease-in-out;
	}
	nav .links a {
		font-size: 20px;
	}
	nav :checked ~ .links {
		bottom: 0;
	}
	nav .icon-burger {
		display: block;
	}
	nav :checked ~ .icon-burger .line:nth-child(1) {
		transform: translateY(10px) rotate(225deg);
	}
	nav :checked ~ .icon-burger .line:nth-child(3) {
		transform: translateY(-10px) rotate(-225deg);
	}
	nav :checked ~ .icon-burger .line:nth-child(2) {
		opacity: 0;
	}
	
}

 
</style>

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
      <li>  <a href="registration.php">Register</a><?php }?></li>
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

<div class="container">
	 
</div>

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

