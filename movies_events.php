<?php include('header.php');?>
?>

</div>
<style><?php include './css/D-Movie.css'; ?></style>
<div class="content">
	<div class="wrap">
		<div class="content-top">

			<h1 style="color:#555;">NOW SHOWING</h1>
			
		<?php
			
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				$today=date("Y-m-d");
				$qry2=mysqli_query($con,"select * from  tbl_movie ");
			
				while($m=mysqli_fetch_array($qry2))
					{
					if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
						$rowCount++;
			?>
                    
				<div class="col-md-<?php echo $bootstrapColWidth; ?>" >
					<div class="thumbnail"  >
						<div class="imgBox">
						 
						  	<a href="about.php?id=<?php echo $m['movie_id'];?>">
							  <img id="img"style="width:100%" src="<?php echo $m['image'];?>"  />
							</a>
						</div>
						<div class="movie-text">
						  	<center>
								 <h4 class="h-text" ><a id="hov" href="about.php?id=<?php echo $m['movie_id'];?>" ><?php echo $m['movie_name'];?></a></h4>
							</center>
						  	<!-- <label style="text-decoration:none;font-family:Georgia;">Cast:</label> 
							<Span class="color2" style="text-decoration:none;font-family:Georgia;"><?php echo $m['cast'];?></span><br> -->
							
						</div>
						<center>
							<a type="button" class="btn btn-danger"  id="button"href="about.php?id=<?php echo $m['movie_id'];?>" >
								Buy Ticket
							</a>
						</center>
		  			</div>
		  		</div>
		  		
  	    	<?php
  	    	if($rowCount % $numOfCols == 0) { ?> </div> <?php } } 
  	    	?>
			
			</div>
				<div class="clear"></div>		
			</div>
		</div>
	<?php include('footer.php');?>
