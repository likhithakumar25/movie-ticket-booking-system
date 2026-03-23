<?php
include('header.php');
?>

<?php
$_SESSION['theatre'] = 7;
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Theater Details
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Theater Details</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">General Details</h3>
      </div>
      <div class="box-body">
        <?php
        if (!isset($_SESSION['theatre'])) {
          echo "<div class='alert alert-danger'>Session 'theatre' not set. Please login again.</div>";
        } else {
          $th = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id='" . $_SESSION['theatre'] . "'");
          $theatre = mysqli_fetch_array($th);

          if ($theatre) {
        ?>
            <table class="table table-bordered table-hover">
              <tr>
                <td class="col-md-6">Theater Name</td>
                <td class="col-md-6"><?php echo $theatre['name']; ?></td>
              </tr>
              <tr>
                <td>Theater Address</td>
                <td><?php echo $theatre['address']; ?></td>
              </tr>
              <tr>
                <td>Place</td>
                <td><?php echo $theatre['place']; ?></td>
              </tr>
              <tr>
                <td>State</td>
                <td><?php echo $theatre['state']; ?></td>
              </tr>
              <tr>
                <td>Pin</td>
                <td><?php echo $theatre['pin']; ?></td>
              </tr>
            </table>
        <?php
          } else {
            echo "<div class='alert alert-warning'>Theatre details not found for ID: " . $_SESSION['theatre'] . "</div>";
          }
        }
        ?>
      </div>
      <!-- /.box-footer-->
    </div>

    <!-- Screen Details Box -->
    <!-- ... your existing screen details box and modals (unchanged) ... -->

    <!-- Just keeping it short here. Your modal and script section remain the same. -->

  </section>
  <!-- /.content -->
</div>

<?php include('footer.php'); ?>
