<?php
session_start();
include('../../config.php');
extract($_POST);

// File uploads
$poster_dir = "../../images/";
$poster_name = basename($_FILES["image"]["name"]);
$poster_path = $poster_dir . $poster_name;
$poster_db_path = "images/" . $poster_name;

move_uploaded_file($_FILES["image"]["tmp_name"], $poster_path);

// INSERT query (assuming there is NO 'banner' column)
$sql = "INSERT INTO tbl_movie (
    t_id, movie_name, cast, `desc`, release_date, image, video_url, status
) VALUES (
    '{$_SESSION['theatre']}',
    '$name',
    '$cast',
    '$desc',
    '$rdate',
    '$poster_db_path',
    '$video',
    '0'
)";

if (mysqli_query($con, $sql)) {
    $_SESSION['success'] = "Movie Added";
    header('location:add_movie.php');
} else {
    die("Database Error: " . mysqli_error($con));
}
?>
