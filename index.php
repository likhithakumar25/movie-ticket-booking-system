<html>
<body>
<?php
include('header.php');

?>

<!--------------------------- Custom Styles - start ---------------------------->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style_thuva.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style_thuva_multi_carousel.css" type="text/css" media="all" />
<!--------------------------- Custom Styles - end ------------------------------>


<!---------------------------- Carousel Banner -start -------------------------------->
<?php
$qry1 = mysqli_query($con, "SELECT movie_id, movie_name FROM tbl_movie ORDER BY rand() LIMIT 5");

$count1=mysqli_num_rows($qry1);
if ($count1 > 0) {
	$data_array1 = array();
	while ($data1 = mysqli_fetch_array($qry1)) {
		$data_array1[] = $data1;
	}
?>

<div id="bannerCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php
		$first_row1 = true;
		$i1 = 0;
		foreach($data_array1 as $d1)
		{
		?>
		<li data-target="#bannerCarousel" data-slide-to="<?php echo $i1; $i1 += 1;?>" <?php if ($first_row1) { echo 'class="active"'; $first_row1 = false; } ?>></li>
		<?php
		} 
		?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php
		$first_row1 = true;
		foreach($data_array1 as $d1)
		{
		?>
		<div class="item <?php if ($first_row1) { echo 'active'; $first_row1 = false; } ?>">
			
			<div class="carousel-caption carousel-banner-title">
				<h3><a href="about.php?id=<?php echo $d1['movie_id'];?>"><?php echo $d1['movie_name'];?></a></h3>
			</div>
		</div>
		<?php
		} 
		?>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#bannerCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<?php
}
?>
<!----------------------------- Carousel Banner - end ------------------------------->



<div class="content">
	<div class="wrap">

		<!----------------------------- Carousel Screening Movie List - start ------------------------->
		<div class="nowshowing-movies-section">
			<h2 class="custom-main-title">Films in Theaters</h2>
			<div class="col-xs-12 col-md-12 col-centered">

				<?php
				$today=date("Y-m-d");
				$qry2=mysqli_query($con,"select * from  tbl_movie where status='0'");
				$count2 = mysqli_num_rows($qry2);
				if ($count2 > 0)
				{

				while($data2=mysqli_fetch_array($qry2))
				{
					$data_array2[] = $data2;
				}
				?>

				<div id="movieCarousel_nowshowing" class="carousel movieCarousel slide" data-ride="carousel" data-type="multi" data-interval="false">
					<div class="carousel-inner">
						<?php
						$first_row = true;
						foreach($data_array2 as $m)
						{
						?>

						<div class="item <?php if($first_row) { echo 'active'; $first_row = false; } ?>">
							<div class="carousel-col">
								<div class="block-box img-responsive">
									<a href="about.php?id=<?php echo $m['movie_id'];?>">
										<div class="movie-carousel-poster-box">
											<img class="moviecarousel-poster-img" src="<?php echo $m['image'];?>" alt="<?php echo $m['movie_name'];?>">
										</div>
									</a>
									<div class="moviecarousel-caption moviecarousel-poster-title">
										<h3 class="movie-title"><a href="about.php?id=<?php echo $m['movie_id'];?>"><?php echo $m['movie_name'];?></a></h3>
										<a class="btn btn-danger ticket-button" href="about.php?id=<?php echo $m['movie_id'];?>" role="button">Buy Tickets</a>
										<br><br>
										<div class="data">Release Date :<?php echo $m['release_date'];?></div>
										<span style="text-color:#000" class="data"><strong>Cast :<?php echo $m['cast'];?></strong><br>
										<span class="text-top">Description: <?php echo $m['desc'];?></span>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						}
						?>

					</div>

					<!-- Controls -->
					<div class="left carousel-control">
						<a href="#movieCarousel_nowshowing" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
					</div>
					<div class="right carousel-control">
						<a href="#movieCarousel_nowshowing" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

				<?php
				}
				else
				{
					echo '<h4 style="text-align: center;">No movies are currently screened.</h4>';
				}
				?>

			</div>
		</div>
		<!----------------------------- Carousel Screening Movie List - end --------------------------->


		<div class="home-section-separator"></div>


		<!----------------------------- Carousel Upcoming Movie List - start ------------------------->
		<div class="upcoming-movies-section">
			<h2 class="custom-main-title">Upcoming Movies</h2>
			<div class="col-xs-12 col-md-12 col-centered">

				<?php
				$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
				$count3 = mysqli_num_rows($qry3);
				if ($count3 > 0)
				{

				$data_array4 = array();
				while($data3=mysqli_fetch_array($qry3))
				{
					$data_array3[] = $data3;
				}
				?>

				<div id="movieCarousel_upcoming" class="carousel movieCarousel slide" data-ride="carousel" data-type="multi" data-interval="false">
					<div class="carousel-inner">
						<?php 
						
						$first_row = true;
						foreach($data_array3 as $n)
						{
						?>

						<div class="item <?php if($first_row) { echo 'active'; $first_row = false; } ?>">
							<div class="carousel-col">
								<div class="block-box img-responsive">
									<div class="movie-carousel-poster-box">
										<img class="moviecarousel-poster-img" src="admin/<?php echo $n['attachment'];?>" alt="<?php echo $n['name'];?>">
									</div>
									<div class="moviecarousel-caption moviecarousel-poster-title">
										<h3 class="movie-title"><?php echo $n['name'];?></h3>
										<span style="text-color:#000" class="data"><strong>Cast :<?php echo $n['cast'];?></strong><br>
										<div class="data">Release Date :<?php echo $n['news_date'];?></div>
										<span class="text-top"><?php echo $n['description'];?></span>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						}
						?>

					</div>

					<!-- Controls -->
					<div class="left carousel-control">
						<a href="#movieCarousel_upcoming" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
					</div>
					<div class="right carousel-control">
						<a href="#movieCarousel_upcoming" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

				<?php
				}
				else
				{
					echo '<h4 style="text-align: center;">No upcoming movies available.</h4>';
				}
				?>

			</div>
		</div>
		<!----------------------------- Carousel Upcoming Movie List - end --------------------------->


		<div class="home-section-separator"></div>

		<!-----------------------------Movie Trailers List - start ------------------------->
		<div class="movie-trailers-section">
			<h2 class="custom-main-title">Movie Trailers</h2>
			<div class="col-xs-12 col-md-12 col-centered">

				<?php
				
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				$qry4=mysqli_query($con,"SELECT * FROM tbl_movie ORDER BY rand() LIMIT 8");
				$count4 = mysqli_num_rows($qry4);
				if ($count4 > 0)
				{
			
				$data_array4 = array();
				while($nm=mysqli_fetch_array($qry4))
				{
				if($rowCount % $numOfCols == 0) { ?> <div class="row" style="margin-bottom: 25px;"> <?php } 
				$rowCount++;
				?>
				
				<div class="col-sm-<?php echo $bootstrapColWidth; ?>" >

					<div class="imageRow" style="width: 100%;">
						<div class="single">
							<a target="_blank" href="<?php echo $nm['video_url'];?>"><img class="movie-poster-img" style="width: 100%;" src="<?php echo $nm['image'];?>" alt="<?php echo $nm['movie_name'];?>" /></a>
						</div>
						<div class="movie-text" style="text-align: center;">
							<h4 class="h-text"><a target="_blank" href="<?php echo $nm['video_url'];?>" style="text-decoration:none;"><?php echo $nm['movie_name'];?></a></h4>
						</div>
					</div>
				</div>

				<?php
				if($rowCount % $numOfCols == 0) { ?> </div> <?php } 
				} 
				}
				else
				{
					echo '<h4 style="text-align: center;">No movie trailers available.</h4>';
				}
				?>
			</div>
		</div>
		<!----------------------------- Movie Trailers List - end ------------------------->

		<div style="padding-top: 25px;"></div>
		
	</div>
</div>



<!--------------------------- Custom Scripts - start ---------------------------------->
<script src='js/script_thuva_multi_carousel.js'></script>
<!--------------------------- Custom Scripts - start ---------------------------------->



<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>