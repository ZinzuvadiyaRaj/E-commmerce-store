
<?php
include 'master-nevbar.php';

include_once('../log-reg/conn.php');

?>

<div class="content-wrapper" style="min-height: 50vh;">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="user-manage.php">User Details</a></li>
              <li class="breadcrumb-item active">Add User Form</li>
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
                    <h3 class="card-title">Add User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="ad_firstname">
                          </div>  
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="ad_lastname">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="ad_email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" name="ad_mobile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="Password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="ad_password">
                        </div>
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="ad_btn">Submit</button>
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

if(isset($_POST['ad_btn']))
{
  $ad_firstname = @$_POST['ad_firstname'];
  $ad_lastname = @$_POST['ad_lastname'];
  $ad_email = @$_POST['ad_email'];
  $ad_mobile = @$_POST['ad_mobile'];
  $ad_password = @$_POST['ad_password'];
  $ad_role = "1";
  $ad_otp = rand(100000,999999);
  
 
    $q = $con->prepare("INSERT INTO register_master(firstname, lastname, mobile, email, password, role, otp) VALUES (?, ?, ? ,?, ?,$ad_role , $ad_otp)");
    $q->bind_param("sssss",$ad_firstname,$ad_lastname,$ad_mobile,$ad_email,$ad_password);

    if($q->execute() === TRUE)
    {
         
      // echo "Successfull";
      header("location:user-manage.php");
    }
    else
    {
      echo "Error" . $q->error;
    }
    $q->close();
    $con->close();
 
}

?>

                 
