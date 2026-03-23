
<?php
session_start();
if(!isset($_SESSION['theatre']))
{
  header('location:../index.php');
}
date_default_timezone_set('Asia/Kolkata');
include('../../config.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$th=mysqli_query($con,"select * from tbl_theatre where id='".$_SESSION['theatre']."'");
$theatre=mysqli_fetch_array($th);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Theatre Assistance</title>
  <!-- valodation -->
  <script type="text/javascript" src="../validation/vendor/jquery/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/> 
  <script type="text/javascript" src="../validation/dist/js/bootstrapValidator.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="../dist/css/skins/skin-black-t.css">

<link rel="stylesheet" href="../../css/style_rajin.css" type="text/css" media="all" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-family:verdana ;">Theatre Assistant</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navigation">
      <a class="button" href="logout.php" onclick="return confirm('Are You sure you want to logout?');">
      <img src="../../images/signout1.png">
  
  <div class="logout">LOGOUT</div>

	</a>

      </div>
    </nav>
   
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="cinema.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $theatre['name'];?></p>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <li class="<?= ($activePage == 'index') ? 'navactive':''; ?>">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        
        <li class="<?= ($activePage == 'add_movie') ? 'navactive':''; ?>">
          <a href="add_movie.php">
            <i class="fa fa-plus"></i> <span>Add Movie</span>
          </a>
        </li>

        <li class="<?= ($activePage == 'view_movie') ? 'navactive':''; ?>">
          <a href="view_movie.php">
            <i class="fa fa-list-alt"></i> <span>View Movies</span>
          </a>
        </li>

        <li class="<?= ($activePage == 'add_show') ? 'navactive':''; ?>">
          <a href="add_show.php">
            <i class="fa fa-ticket"></i> <span>Add Show</span>
          </a>
        </li>
        <li class="<?= ($activePage == 'todays_shows') ? 'navactive':''; ?>">
          <a href="todays_shows.php">
            <i class="fa fa-calendar"></i> <span>Todays Shows</span>
          </a>
        </li>
        <li class="<?= ($activePage == 'tickets') ? 'navactive':''; ?>">
          <a href="tickets.php">
          <i class="fa fa-money"></i> <span>Todays Bookings</span>
          </a>
        </li>
        <li class="<?= ($activePage == 'view_shows') ? 'navactive':''; ?>">
          <a href="view_shows.php">
            <i class="fa fa-eye"></i> <span>View Show</span>
          </a>
        </li>
        <li class="<?= ($activePage == 'add_theatre_2') ? 'navactive':''; ?>">
          <a href="add_theatre_2.php">
            <i class="fa fa-film"></i> <span>Theatre Details</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>