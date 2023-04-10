<?php

// ________________PHP Validation Code __________________

  // if(isset($_POST['reg_btn']))
  // {
  //   $fnameErr = "";
  //   $lnameErr = "";
  //   $mobileErr = "";
  //   $emailErr = "";
  //   $passwordErr = "";


  //   // first name ERRORS
  //   if (empty($_POST["first_name"])) 
  //   {
  //     $fnameErr = "First Name is required";

  //   } 
  //   else 
  //   {
  //     $fname = $_POST["first_name"];
  //     // echo "hello";
  //     if (!preg_match("/^[A-Za-z]{3,20}$/",$fname)) 
  //     {
  //       $fnameErr = "Minimum 3 letters and white space allowed";
  //     }
    
  //   }

  //   //Last name ERRORS
  //   if (empty($_POST["last_name"])) 
  //   {
  //     $lnameErr = "Last Name is required";

  //   } 
  //   else 
  //   {
  //     $lname = $_POST["last_name"];
  //     // echo "hello";
  //     if (!preg_match("/^[A-Za-z]{3,20}$/",$lname)) 
  //     {
  //       $lnameErr = "Minimum 3 letters and white space allowed";
  //     }
    
  //   }

  //   //mobile number ERRORS
  //   if (empty($_POST["mobile"])) 
  //   {
  //     $mobileErr = "Mobile Number is required";

  //   } 
  //   else 
  //   {
  //     $mob = $_POST["mobile"];
  //     // echo "hello";
  //     if (!preg_match("/(0|91)?[6-9][0-9]{9}/",$lmob)) 
  //     {
  //       $mobileErr = "Please Enter Valid Mobile No";
  //     }
    
  //   }

  //   // Email ERRORS
  //   if (empty($_POST["email"])) 
  //   {
  //     $emailErr = "email is required";

  //   } 
  //   else 
  //   {
  //     $em = $_POST["email"];
  //     // echo "hello";
  //     if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,7})$/",$em)) 
  //     {
  //       $emailErr = "Please Enter Valid Email Address";
  //     }
    
  //   }

  //   //Password ERRORS
  //   if (empty($_POST["password"])) 
  //   {
  //     $passwordErr = "password is required";

  //   } 
  //   else 
  //   {
  //     $pwd = $_POST["password"];
  //     // echo "hello";
  //     if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$pwd)) 
  //     {
  //       $passwordErr = "Minimum eight characters, at least one letter, one number and one spacial character:";
  //     }
    
  //   }

  // }
?>



<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
  .error{
    color: red;
  }
  .login{
    text-decoration: none;
  }
  .login-txt{
    font-size: 18px;
    color: gray;
  }
</style>

<section class="" style="background-color: #fff; height: 150vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black mt-5 mb-5" style="border-radius: 25px; box-shadow: 0 0 1rem;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="fname">Your First Name</label>
                      <input type="text" id="fname" name="first_name" class="form-control" />
                      <span class = "error"> <?php echo $fnameErr;?></span> <!-- Print Error -->
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="lname">Your Last Name</label>
                      <input type="text" id="lname" name="last_name" class="form-control" />
                      <span class = "error"> <?php echo $lnameErr;?></span><!-- Print Error -->
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="mobile">Your Mobile Number</label>
                      <input type="text" id="mobile" name="mobile" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');"/>
                      <span class = "error"> <?php echo $mobileErr; ?></span><!-- Print Error -->
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Your Email</label>
                      <input type="email" id="email" name="email" class="form-control" />
                      <span class = "error"> <?php echo $emailErr; ?></span><!-- Print Error -->
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Your Password</label>
                      <input type="password" id="password" name="password" class="form-control" />
                      <span class = "error"> <?php echo $passwordErr; ?></span><!-- Print Error -->
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="reg_btn" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p class="login-txt">Already have an Account? <a class="login" href="login.php"> Login </a></p>
                  </div>
                </form>
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






<?php
ob_start();
session_start();

include_once("conn.php");

if(isset($_POST['reg_btn']))
{
  $firstname = @$_POST['first_name'];
  $lastname = @$_POST['last_name'];
  $mobile = @$_POST['mobile'];
  $email = @$_POST['email'];
  $password = @$_POST['password'];
  $role = "1";
  $otp = rand(100000,999999);
  
 
    $q = $con->prepare("INSERT INTO register_master(firstname, lastname, mobile, email, password, role, otp) VALUES (?, ?, ? ,?, ?,$role , $otp)");
    $q->bind_param("sssss",$firstname,$lastname,$mobile,$email,$password);

    if($q->execute() === TRUE)
    {
         
      // echo "Successfull";
      header("location:login.php");
    }
    else
    {
      echo "Error" . $q->error;
    }
    $q->close();
    $con->close();
 
}

?>