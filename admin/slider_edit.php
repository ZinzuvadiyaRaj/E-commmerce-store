
<?php
include 'master-nevbar.php';
$slider_id = $_GET['edit'];

$fetch_slider = "SELECT * FROM slider_master WHERE `id`='$slider_id' ";
$fetch_slider_res = mysqli_query($con,$fetch_slider);
$fetch_slider_r = mysqli_fetch_array($fetch_slider_res);
?>

<div class="content-wrapper" style="">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Slider Edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="slider.php">Slider</a></li>
              <li class="breadcrumb-item active">Slider Edit Form</li>
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
                            <input type="text" name="update_title" class="form-control" id="exampleInputEmail1" value="<?php echo $fetch_slider_r[1]; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slider Description</label>
                            <input type="text" name="update_description" class="form-control" id="exampleInputEmail1" value="<?php echo $fetch_slider_r[2]; ?>" >
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="customFile">Upload Slider Image </label>
                                    <div class="custom-file">
                                        <input type="file"  name="update_image" autocomplete="off" >
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-9">
                                <img src="slider_image/<?php echo $fetch_slider_r[3]; ?>" alt="slider_image" height="100px" widht="100px">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="update_status" class="form-control">
                                    <option>active</option>
                                <option>In-active</option>
                            </select>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update-slider-btn" class="btn btn-primary">update</button>
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
if(isset($_POST['update-slider-btn']))
{
    $update_title = $_POST['update_title'];
    $update_description = $_POST['update_description'];
    $update_image = $_FILES['update_image']['name'];
    $update_status = $_POST['update_status'];

    if($update_image == "")
    {
        $update_image = $fetch_slider_r[3];
    }



    $target = "slider_image/";
    $target = $target . basename( $_FILES['update_image']['name']);

    if(move_uploaded_file($_FILES['update_image']['tmp_name'],$target))
    { 
        echo "<script>alert('The file ". basename( $_FILES['update_image']['name']). " has been uploaded, and your information has been added to the directory');</script>";
    }
    else 
    {
        echo "<script>alert('Sorry, there was a problem uploading your file.')</script>"; 
    }


    $update_slider = "UPDATE `slider_master` SET `title`='$update_title',`description`='$update_description',`image`='$update_image',`status`='$update_status' WHERE `id`='$slider_id' ";

    if(mysqli_query($con,$update_slider))
    {
        header("location:slider.php");
    }
    else
    {
        echo "<script>alert('Error...!');</script>";
    }


}
?>
