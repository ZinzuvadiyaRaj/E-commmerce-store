<?php
include_once('conn.php');

ob_start();
session_start();

// working code ::

$msg = '';
if(isset($_POST['log_btn'])){
  $log_email = @$_POST['log_email']; 
  $log_password = @$_POST['log_password'];
  
  $q="SELECT * FROM register_master WHERE email='$log_email' AND  password='$log_password'";
  $res=mysqli_query($con,$q);
   $count=mysqli_num_rows($res);
   $r=mysqli_fetch_row($res); 
    if($count>0)
    {
      // if($log_email == "admin" && $log_password == "admin")
      // {
      //   $_SESSION['email'] = $log_email;
      //   $_SESSION['password'] = $log_password;
      //   header("location:../admin/index.php");
      // }
      // else
      // {

      //   $_SESSION['email']= $log_email;
      //   $_SESSION['password']= $log_password;
      //   header('location:main_home.php');
      // }

      if($r[6] == 1)
      {
        $_SESSION['email']= $log_email;
        $_SESSION['password']= $log_password;
        header('location:../user/index.php');
      }
      else if($r[6] == 2)
      {
        $_SESSION['email']= $log_email;
        $_SESSION['password']= $log_password;
        header('location:../admin/index.php');  
      }
      else if ($r[6] == 3)
      {
        $_SESSION['email']= $log_email;
        $_SESSION['password']= $log_password;
        header('location:../admin/index.php');  
      }
      else if ($r[6] == 4)
      {
        $_SESSION['email']= $log_email;
        $_SESSION['password']= $log_password;
        header('location:../admin/index.php');  
      }
    }
   else{  
      // echo "<script> alert('These credentials do not match our records.'); </script>"; 
      // echo "<div class='alert alert-danger' role='alert'>These credentials do not match our records.</div>";
      $msg = 'These credentials do not match our records.';
   }
   
}







// --------------------------------------------------------------------------------------------------------


// we store the value in databse using bind_param() function so we can not fatch value form bind_param() function
// not working :: 



// $msg = '';
// if(isset($_POST['log_btn']))
// {
//   $log_email = @$_POST['log_email']; 
//   $log_password = @$_POST['log_password'];

//   $q=$con->prepare("SELECT * FROM register_master WHERE email = '?' AND  password = '?'");
//   $q->bind_param("ss",$log_email,$log_password);

//     if($q->execute() === TRUE)
//     {
//       echo "<script>alert('Successfull');</script>";
      // $_SESSION['email']= $log_email;
      // $_SESSION['password']= $log_password;
      // header("location:welcome.php");
      // header('location:welcome.php');

    // }
    // else
    // {
      // $msg = "Error";
      // echo "error";
      // echo "<script>alert('Error');</script>";

    // }
    // $q->close();
    // $con->close();
   
// }


// --------------------------------------------------------------------------------------------------------

// not Working ::
 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db_name = "logreg";

// $con = new mysqli($servername,$username,$password,$db_name);

// if($con->connect_error)
// {
//   die("connection faild :: " . $con->connect_error);
// }

  // $result = $con->query($sql);
  // if($result->num_rows > 0)
  // {
    // while ($row = $result->fatch_assoc())
    // {
      // session_start();
      // $_SESSION['email'] = $row['email'];
      // $_SESSION['password'] = $row['password'];
      // header("location:welcome.php");


    // }
  // }
  // else
  // {
    // echo "email or password has been not matched";
  // }


  // $q = $con->prepare("select * from register_master where email= '?' and password= '?' ");
  // $q->bind_param("ss",$log_email,$log_password);
  // $q->execute();

  // $result = $q->get_result()->fatch_all(MYSQL_ASSOC);
  // echo "<pre>";
  //   print_r($result);
  // echo "</pre>";
  // exit;

   
// mysqli_close($con);
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<section class="" style="background-color: #fff; height: 100vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black mt-5 mb-5" style="border-radius: 25px; box-shadow: 0 0 1rem;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


              <?php if($msg == '') 
              {
                  echo "";  
              }
              else{
              ?>
               <div class='alert alert-danger' role='alert'><?php echo $msg; ?></div>
               <?php 
              }
              ?>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="email" name="log_email" class="form-control" />
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" name="log_password" class="form-control" />
                      <label class="form-label" for="password">Your Password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="log_btn" class="btn btn-primary btn-lg">Login</button>
                  </div>

                </form>

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p class="login-txt">haven't accoun<a class="login" href="register.php"> Register </a></p>
                  </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/reg-banner.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



       