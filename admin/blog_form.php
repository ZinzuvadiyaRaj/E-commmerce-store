
<?php
include 'master-nevbar.php';

?>

<div class="content-wrapper" style="">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Blog Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="blog_details.php">Blog</a></li>
              <li class="breadcrumb-item active">Blog Form</li>
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
                    <h3 class="card-title">Add Blog</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enetr Blog Date </label>
                            <input type="text" name="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Blog Date" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enetr Blog Title </label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Blog title" >
                        </div>
                        <div class="form-group">
                          <label for="customFile">Upload Image </label>
                          <div class="custom-file">
                            <input type="file"  name="blog_image" required autocomplete="off" >
                          </div>
                        </div>                      
                    </div>  
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" name="blog-btn" class="btn btn-primary">Submit</button>
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
if(isset($_POST['blog-btn']))
{
  $date = @$_POST['date'];
  $title = @$_POST['title'];
  $blog_image = $_FILES['blog_image']['name'];
  $status = "active";

  $target = "blog_imaegs/";
  $target = $target . basename( $_FILES['blog_image']['name']); 

if(move_uploaded_file($_FILES['blog_image']['tmp_name'],$target))
{ echo "<script>alert('The file ". basename( $_FILES['blog_image']
  ['name']). " has been uploaded, and your information has been added to the directory');</script>";
  }
  else {
      echo "<script>alert('Sorry, there was a problem uploading your file.')</script>"; 
  }

  $q = "INSERT INTO `blog_master`(`date`, `title`, `blog_image`, `status`) VALUES ('$date','$title','$blog_image','$status')";

  if(mysqli_query($con,$q))
  {
    header("location:blog_details.php");
    echo "<script> alert('successfully add category'); </script>";
  }
  else
  {
    echo "<script> alert('Error in add category'); </script>"; 
  }
}
?>
