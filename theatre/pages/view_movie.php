<?php
include('header.php');
?>
<style>
     
  .delete_button {
        width: 28px;
        height: 28px;
        border:none;
        box-shadow: none;
        margin: 0 3px;
        background-color: #f50000;
        color: white;
        border-radius: 5px;
    }
    .delete_button:hover {
        background-color: #fe1c1c;
    }
    .delete_button:focus {
        background-color: #c70000;
        outline: none;
    }
   
</style>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Movies
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
          
        <div class="box-body" id="screendtls">
          <?php
            $sr=mysqli_query($con,"select * from tbl_movie");
            if(mysqli_num_rows($sr))
            {
          ?>
            <table class="table table-bordered table-hover">
              <th class="col-md-1">ID</th>
              <th class="col-md-2">Name</th>
              <th class="col-md-1">Casts</th>
              <th class="col-md-3">Synopsis</th>
              <th class="col-md-1">Release Date</th>
              <th class="col-md-1">Trailer URL</th>
              <th class="col-md-1">Status</th>
              <th class="col-md-3">Poster</th>
              <th class="col-md-3">Banner</th>
              <th class="col-md-1">Action</th>
                 <?php 
                $sl=1;
                while($row=mysqli_fetch_array($sr))
                {
                  ?>
                  <tr id="<?php echo $row['movie_id'];?>">
                    <td><?php echo $sl;?></td>
                    <td><?php echo $row['movie_name'];?></td>
                    <td><?php echo $row['cast'];?></td>
                    <td><?php echo $row['desc'];?></td>
                    <td><?php echo $row['release_date'];?></td>
                    <td><b><a href="<?php echo $row['video_url'];?>"><?php echo $row['video_url'];?></a></b></td>
                    <td><?php echo $row['status'];?></td>
                    <td><img src="../../<?php echo $row['image'];?>" height="150px" width="100px" style="width:100px;"></td>
                    <td><?php if ($row['banner'] != "") { ?><img src="../../<?php echo $row['banner'];?>" height="50px" width="150px" style="width:150px;"><?php } else {echo "<i>Unavailable!</i>";} ?></td>
                    <td><button data-toggle="modal" data-target="#view-modal2" type='button' class='delete_button'><i class='fa fa-trash'></i></button></td>
 

                  </tr>
                  <?php
                  $sl++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
              ?>
              <button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Screen</button>
                    
              <?php
            }
            ?>
        </div> 
        <!-- /.box-footer-->
      </div>
       
        
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script type="text/javascript">
    $(".delete_button").click(function(){
        var id = $(this).parents("tr").attr("id");
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'del_movie.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });


</script>