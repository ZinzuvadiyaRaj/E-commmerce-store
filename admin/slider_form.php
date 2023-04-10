
<?php
include 'master-nevbar.php';
?>

<div class="content-wrapper" style="">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Slider Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php">Slider</a></li>
              <li class="breadcrumb-item active">Slider Form</li>
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
                    <h3 class="card-title">Add Slider</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slider Title</label>
                            <input type="text" name="slider_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Title" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slider Description</label>
                            <input type="text" name="slider_description" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Description" >
                        </div>
                        <div class="form-group">
                            <label for="customFile">Upload Slider Image </label>
                            <div class="custom-file">
                                <input type="file"  name="slider_image" required autocomplete="off" >
                            </div>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="slider-btn" class="btn btn-primary">Submit</button>
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
if(isset($_POST['slider-btn']))
{
    $slider_title = $_POST['slider_title'];
    $slider_description = $_POST['slider_description'];
    $slider_image = $_FILES['slider_image']['name'];
    $status = "active";


    $target = "slider_image/";
    $target = $target . basename( $_FILES['slider_image']['name']);

    if(move_uploaded_file($_FILES['slider_image']['tmp_name'],$target))
    { 
        echo "<script>alert('The file ". basename( $_FILES['slider_image']['name']). " has been uploaded, and your information has been added to the directory');</script>";
    }
    else 
    {
        echo "<script>alert('Sorry, there was a problem uploading your file.')</script>"; 
    }


    $slider_q = "INSERT INTO `slider_master`(`title`, `description`, `image`, `status`) VALUES ('$slider_title','$slider_description','$slider_image','$status')";

    if(mysqli_query($con,$slider_q))
    {
        header("location:slider.php");
    }
    else
    {
        echo "<script>alert('Error...!');</script>";
    }


}
?>
