
<?php
include 'master-nevbar.php';
?>


<?php
$q = "select * from category";
$res = mysqli_query($con,$q);

?>

<div class="content-wrapper">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="subcategory.php">Sub Category</a></li>
              <li class="breadcrumb-item active">Sub Category Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <hr>
    </section>


<!-- category form -->

    <section class="content">
        <div class="container">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Sub Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post" action="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="custom-select" name="select_category" id="exampleSelectBorder" required>
                            <option value="">Select Category</option>
                            <?php
                               while($r = mysqli_fetch_row($res))
                               {
                                echo "<option value='".$r[0]."' >".$r[1]."</option>";
                               }
                            ?>
                          </select>
                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="sub_category" placeholder="Enter Sub Category" required>
                        </div>
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" name="subcategory_btn" class="btn btn-primary">Submit</button>
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
if(isset($_POST['subcategory_btn']))
{
  $select_category = @$_POST['select_category'];
  $sub_category = @$_POST['sub_category'];



  $q = "INSERT INTO `sub_category`(`category`,`sub_category`) VALUES ('$select_category','$sub_category');";

  if(mysqli_query($con,$q))
  {
    header("location:subcategory.php");
    echo "<script> alert('successfully add category'); </script>";
  }
  else
  {
    echo "<script> alert('Error in add category'); </script>"; 
  }
}
?>
