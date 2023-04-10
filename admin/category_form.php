
<?php
include 'master-nevbar.php';
?>

<div class="content-wrapper" style="">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active">Category Form</li>
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
                    <h3 class="card-title">Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enetr Category</label>
                            <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" >
                        </div>
                        
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" name="category-btn" class="btn btn-primary">Submit</button>
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
if(isset($_POST['category-btn']))
{
  $category = @$_POST['category'];


  $q = "INSERT INTO `category`(`category`) VALUES ('$category');";

  if(mysqli_query($con,$q))
  {
    header("location:category.php");
    echo "<script> alert('successfully add category'); </script>";
  }
  else
  {
    echo "<script> alert('Error in add category'); </script>"; 
  }
}
?>
