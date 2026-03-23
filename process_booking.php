
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('form.php');
    $frm=new formBuilder;  
    $qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);    
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">

      <div >
      <center><h3 >Pay For <?php echo $movie['movie_name'] ?></h3></center>
      </div>
            
			<form action="bank.php" method="post" id="form1">
            
			<div class="col-md-4 col-md-offset-4">
            <div class="thumbnail" style="padding:20px;background-color:#F8F8F8">
			    <div class="form-group">

                    <label class="control-label" >Name on Card</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label class="control-label" >Card Number</label>

                     <input type="text" class="form-control" id="number" name="number" required title="Enter 16 digit card number"
                     placeholder='xxxx xxxx xxxx xxxx' maxlength='19'
                    >
                    <script type="text/javascript">     
                        // enable spacing for credit card number     
                        $('#number').on('keyup', function(e){         
                            var val = $(this).val();         
                            var newval = '';         
                            val = val.replace(/\s/g, ''); 
                            
                            // iterate to letter-spacing after every 4 digits   
                            for(var i = 0; i < val.length; i++) {             
                            if(i%4 == 0 && i > 0) newval = newval.concat(' ');             
                            newval = newval.concat(val[i]);         
                            }        

                            // format in same input field 
                            $(this).val(newval);     
                        });   
                    </script>
                </div>      
                <div class="form-group">

                <label class="control-label">Expiration date</label>
                    <input type="date" id="date"class="form-control"min='1899-01-01' name="date">
                </div>
                <div class="form-group">
                <label class="control-label" >CVV</label>
                    <input type="text" id="cvv" class="form-control" name="cvv" placeholder='xxx' maxlength="3">
                </div>
                <div class="form-group" >
                    <center><button class="btn btn-success" type="submit" >PAY ME</button></center>

                </div>
            </div>
            </div>
            </form>
          
        </div>
`       </div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
    <div style="padding:20px"></div>
<?php include('footer.php');?>

</div>
<!-- <?php
    session_start();
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    header('location:bank.php');
?><?php?> -->
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Name is required and can\'t be empty'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of alphabets'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Card Number is required and can\'t be empty'
                    },stringLength: {
                    min: 19,
                    max: 19,
                    message: 'The Card Number must 16 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid Card Number'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Expire Date is required and can\'t be empty'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The cvv is required and can\'t be empty'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'The cvv must 3 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid cvv'
                    } } }
                    
                }


            });
       
            $('#number').keyup(function() {
                var $th = $(this);
                $th.val( $th.val().replace(/[^0-9\s]/g, function(str) { return ''; } ) );
             });
             $('#cvv').keyup(function() {
                var $th = $(this);
                $th.val( $th.val().replace(/[^0-9]/g, function(str) { return ''; } ) );
             });
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("date").setAttribute("min", today);

            });

</script>
