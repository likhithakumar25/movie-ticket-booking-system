<?php
session_start();
include('../../config.php');
 
$movie_id = $_GET['id'];     
	$query = "DELETE FROM tbl_movie WHERE movie_id = '$movie_id'";
	$result = mysqli_query($con, $query);
	if(!$result){
		exit;
	} 
 
$_SESSION['success']="Movie Deleted";
header("location:view_movie.php");
?>