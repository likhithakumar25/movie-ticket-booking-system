<?php 
include('header.php'); 
include('config.php');

// Validate GET input
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $movie_id = $_GET['id'];

    $qry2 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='$movie_id'");
    $movie = mysqli_fetch_array($qry2);

    if (!$movie) {
        echo "<h2 style='color:red; text-align:center;'>Movie not found for ID: " . htmlspecialchars($movie_id) . "</h2>";
        include('footer.php');
        exit();
    }
} else {
    echo "<h2 style='color:red; text-align:center;'>Invalid movie ID provided.</h2>";
    include('footer.php');
    exit();
}
?>

<!-- Custom Style -->
<style><?php include './css/style_thenusan.css'; ?></style>

<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="section group">
                <div class="about span_1_of_2" style="color:#000000; align:center;">
                    <h3 style="color:#FFFFFF; font-size:26px; background:#23241d; text-align: center;"><?php echo htmlspecialchars($movie['movie_name']); ?></h3>
                    <div class="about-top">    
                        <div class="grid images_3_of_2">
                            <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt=""/>
                        </div>
                        <div class="desc span_3_of_2" style="color:#000000; font-size:17px;">
                            <p class="p-link"><b>Cast : </b><?php echo htmlspecialchars($movie['cast']); ?></p>
                            <p class="p-link"><b>Release Date : </b><?php echo date('d-M-Y', strtotime($movie['release_date'])); ?></p>
                            <p><?php echo htmlspecialchars($movie['desc']); ?></p>
                            <a href="<?php echo htmlspecialchars($movie['video_url']); ?>" target="_blank" class="btn btn-danger watch_but" style="background:#C60506; width:40%; font-size:17px; text-align:center;">Watch Trailer</a>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <?php
                    $s = mysqli_query($con, "SELECT DISTINCT theatre_id FROM tbl_shows WHERE movie_id='" . $movie['movie_id'] . "'");
                    if (mysqli_num_rows($s)) {
                        ?>
                        <h3 style="color:#FFFFFF; font-size:23px; background:#23241d; padding: 10px;" class="text-center">Available Shows</h3>
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="text-center" style="font-size:17px;"><b>Theatre</b></th>
                                    <th class="text-center" style="font-size:17px;"><b>Show Timings</b></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($shw = mysqli_fetch_array($s)) {
                                $t = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id='" . $shw['theatre_id'] . "'");
                                $theatre = mysqli_fetch_array($t);
                                ?>
                                <tr>
                                    <td style="font-size:17px;">
										<?php 
										if ($theatre) {
											echo htmlspecialchars($theatre['name'] . ", " . $theatre['place']);
										} else {
											echo "<span style='color:red;'>Theatre not found</span>";
										}
										?>
									</td>

                                    <td>
                                        <?php
                                        $tr = mysqli_query($con, "SELECT * FROM tbl_shows WHERE movie_id='" . $movie['movie_id'] . "' AND theatre_id='" . $shw['theatre_id'] . "'");
                                        while ($shh = mysqli_fetch_array($tr)) {
                                            $ttm = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id='" . $shh['st_id'] . "'");
                                            $ttme = mysqli_fetch_array($ttm);
                                            ?>
                                            <a href="check_login.php?show=<?php echo $shh['s_id']; ?>&movie=<?php echo $shh['movie_id']; ?>&theatre=<?php echo $shw['theatre_id']; ?>">
                                                <button class="btn btn-default time-btn-1" style="font-size:17px;"><?php echo date('h:i A', strtotime($ttme['start_time'])); ?></button>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        ?>
                        <h3 style="color:#FFFFFF; font-size:23px; background:#23241d; text-align:center; padding:10px;">There are no shows available at the moment!</h3>
                        <p class="text-center">Please check back later!</p>
                        <?php
                    }
                    ?>
                </div>
                <?php include('movie_sidebar.php'); ?>
            </div>
            <div class="clear"></div>        
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
