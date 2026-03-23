<?php
include('config.php');
session_start();

$email = $_POST["Email"];
$pass = $_POST["Password"];

$qry = mysqli_query($con, "SELECT * FROM tbl_login WHERE username='$email' AND password='$pass'");

if (mysqli_num_rows($qry)) {
    $usr = mysqli_fetch_array($qry);
    $_SESSION['user'] = $usr['user_id'];
    $_SESSION['username'] = $usr['username'];
    $_SESSION['user_type'] = $usr['user_type'];

    if ($usr['user_type'] == 2) {
        // Regular User
        if (isset($_SESSION['show'])) {
            header('location:booking.php');
        } else {
            header('location:index.php');
        }
    } else if ($usr['user_type'] == 1) {
        // Theatre admin login: fetch and set theatre ID
        $tqry = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE user_id='" . $usr['user_id'] . "'");
        if (mysqli_num_rows($tqry)) {
            $theatre = mysqli_fetch_array($tqry);
            $_SESSION['theatre'] = $theatre['id'];
            $_SESSION['success'] = "Login successful!";
            header("location:theatre/index.php");
        } else {
            $_SESSION['error'] = "Theatre details not found!";
            header("location:login.php");
        }
    } else {
        $_SESSION['error'] = "Invalid user type!";
        header("location:login.php");
    }

} else {
    $_SESSION['error'] = "Login Failed!";
    header("location:login.php");
}
?>
