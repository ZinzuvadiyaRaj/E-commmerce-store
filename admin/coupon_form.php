
<?php
include 'master-nevbar.php';


?>

<div class="content-wrapper">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="coupon.php">Coupon Details</a></li>
              <li class="breadcrumb-item active">Coupon Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<!-- vendor form -->
    <section class="content">
        <div class="container">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Coupon</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" class="form-control" name="coupon_code" id="exampleInputEmail1" placeholder="Enter Coupon code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Value</label>
                            <input type="text" class="form-control" name="coupon_value" id="exampleInputEmail1" placeholder="Enter Coupon value" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Type</label>
                            <select class="custom-select" name="coupon_type" id="exampleSelectBorder" required>
                              <option value="">Select Type</option>
                            <option>Percentage</option>
                            <option>Ruppee</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cart minimum Value</label>
                            <input type="text" class="form-control" name="cart_min_value" id="exampleInputEmail1" placeholder="Enter Cart minimum Value" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
                        </div>
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" name="coupon_btn" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
               </div>
            </div>
        </div>

       
    </section>
</div>



<?php

if(isset($_POST['coupon_btn']))
{
  $coupon_code = @$_POST['coupon_code'];
  $coupon_value = @$_POST['coupon_value'];
  $coupon_type = @$_POST['coupon_type'];
  $cart_min_value = @$_POST['cart_min_value'];


  $c_q = "INSERT INTO `coupon_master`(`coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`) VALUES ('$coupon_code','$coupon_value','$coupon_type','$cart_min_value')";

  if(mysqli_query($con,$c_q))
  {
    header("location:coupon.php");
      echo "<script>alert('Coupon add Successfully');</script>";
  }
  else
  {
    echo "<script>alert('Error...!');</script>";
  }
}
?>


<?php
include 'master-footer.php';
?>

