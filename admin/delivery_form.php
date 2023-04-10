
<?php
include 'master-nevbar.php';

include_once('../log-reg/conn.php');


$fatch_all_data = "SELECT * FROM register_master";
$res1 = mysqli_query($con,$fatch_all_data);

?>
<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#vendor_table').DataTable();
} );
</script>
</head>

<div class="content-wrapper" style="height: auto;">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add delivery-Boy Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="delivery_details.php">delivery-Boy Details</a></li>
              <li class="breadcrumb-item active">delivery-Boy Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <hr>
    </section>


<!-- User form -->
    <section class="content">
        <div class="container">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add delivery-Boy </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="v_firstname">
                          </div>  
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="v_lastname">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="v_email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" name="v_mobile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="Password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="v_password">
                        </div>
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="v_btn">Submit</button>
                    </div>
                </form>
                </div>
               </div>
            </div>
        </div>
  </section>
</div>
<?php
include 'master-footer.php';
?>



<?php
// ob_start();
// session_start();

// include_once("conn.php");

if(isset($_POST['v_btn']))
{
  $v_firstname = @$_POST['v_firstname'];
  $v_lastname = @$_POST['v_lastname'];
  $v_email = @$_POST['v_email'];
  $v_mobile = @$_POST['v_mobile'];
  $v_password = @$_POST['v_password'];
  $v_role = "4";
  $v_otp = rand(100000,999999);
  
 
    $q = $con->prepare("INSERT INTO register_master(firstname, lastname, mobile, email, password, role, otp) VALUES (?, ?, ? ,?, ?,$v_role , $v_otp)");
    $q->bind_param("sssss",$v_firstname,$v_lastname,$v_mobile,$v_email,$v_password);

    if($q->execute() === TRUE)
    {
         
      // echo "Successfull";
      header("location:delivery_details.php");
    }
    else
    {
      echo "Error" . $q->error;
    }
    $q->close();
    $con->close();
 
}

?>

                 
