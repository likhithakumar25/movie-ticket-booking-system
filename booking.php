<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	$movie_id=$movie['movie_id'];
	$theatre_id= $movie['t_id'];

	$qry3=mysqli_query($con,"select start_date from tbl_shows where movie_id=$movie_id AND theatre_id=$theatre_id");
    $movie_row=mysqli_fetch_array($qry3);
    $start_date=$movie_row['start_date'];



	?>

<!---- Custom Style -------->
<style><?php include './css/style_thenusan.css'; ?></style>
<!-------------------------->

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2" style ="color:#000000; align:center;">
						<h3 style=" color:#FFFFFF; font-size:26px; background:#23241d; text-align: center;"><?php echo $movie['movie_name']; ?></h3>
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $movie['image']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="color:#000000; font-size:17px;"><b>Cast : </b><?php echo $movie['cast']; ?></p>
									<p class="p-link" style="color:#000000; font-size:17px;"><b>Release Date : </b><?php echo date('d-M-Y',strtotime($movie['release_date'])); ?></p>
									<p style=" color:#000000; font-size:17px"><?php echo $movie['desc']; ?></p>
									<a href="<?php echo $movie['video_url']; ?>" target="_blank" class="btn btn-danger watch_but" style="background:#C60506; width:40%; font-size:17px; text-align: center; align:center;">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>

							<table class="table table-hover table-bordered text-center" style="color:#000000; font-size:17px;" >
							<?php
								$s=mysqli_query($con,"select * from tbl_shows where s_id='".$_SESSION['show']."'");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($con,"select * from tbl_theatre where id='".$shw['theatre_id']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr >
										<td class="col-md-6">
											Theatre
										</td>
										<td>
											<?php echo $theatre['name'].", ".$theatre['place'];?>
										</td>
									</tr>
										<tr>
											<td>
												Screen
											</td>
										<td>
											<?php 
												$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shw['st_id']."'");
												
												$ttme=mysqli_fetch_array($ttm);
												
												$sn=mysqli_query($con,"select  * from tbl_screens where screen_id='".$ttme['screen_id']."'");
												
												$screen=mysqli_fetch_array($sn);
												echo $screen['screen_name'];
							
												?>
										</td>
									</tr>
									<tr>
										<td>
											Date
										</td>
										<td>
											<?php



                                            if(strtotime($start_date) > strtotime(date('Y-m-d'))){
                                                $book_date = $start_date;

                                            }
                                            else{
                                                $book_date= date('Y-m-d');
                                            }
                                            ?>
							<div class="col-md-12 text-center" style="padding-bottom:20px">

								<input type="date" id="date" name="show_date" value="<?php echo $book_date;?>" min="<?php echo $book_date;?>" max="2050-12-31">
                                <?php
								$av=mysqli_query($con,"select sum(no_seats) from tbl_bookings where show_id='".$_SESSION['show']."' and ticket_date='$book_date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Show Time
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['start_time']))." ".$ttme['name'];?> Show
										</td>
									</tr>
									<tr>
										<td>
											Number of Seats
										</td>
										<td>
											<form  action="process_booking.php" method="post">
												<input type="hidden" name="screen" value="<?php echo $screen['screen_id'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge'];?>"/>
											<input type="hidden" name="date" value="<?php echo $book_date;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Amount
										</td>
										<td id="amount" style="font-weight:bold;font-size:17px">
											Rs <?php echo $screen['charge'];?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$screen['seats']){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
										<button class="btn btn-danger manual-btn-red" style="background:#C60506; color:#ffffff; font-size: 17px; width:100%;">Buy Tickets</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>