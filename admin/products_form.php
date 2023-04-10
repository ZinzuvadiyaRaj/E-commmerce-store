<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';
include_once('../log-reg/conn.php');

?>

<?php
$fatch_all_category = "SELECT * FROM category";
$res_category = mysqli_query($con,$fatch_all_category);


$fatch_all_subcategory = "SELECT * FROM sub_category";
$res_subcategory = mysqli_query($con,$fatch_all_subcategory);

?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<div class="content-wrapper" style="height: 950px;">

    <!-- breadcomes -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                        <li class="breadcrumb-item active">Add Product Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <hr>
    </section>


    <!-- Product form -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form" method="post" action="products_form.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <!-- text input -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="custom-select" id="exampleSelectBorder" onchange="subcategory(this.options[this.selectedIndex].value)" name="p_category" required>
                                            <option value="">Select Category</option>
                                            <?php
                                                while($r = mysqli_fetch_row($res_category))
                                                {
                                                    echo "<option value='".$r[0]."' >".$r[1]."</option>";
                                                    $id = $r[0];
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Sub Category</label>
                                        <select class="custom-select" id="sub_categories_id" name="p_subcategory" required>
                                            <option>Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Title</label>
                                <input type="text" class="form-control" name="p_title" id="exampleInputEmail1"
                                    placeholder="Enter Product Title" required>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Regular Price</label>
                                        <input type="text" class="form-control" name="p_reguler_price" id="exampleInputEmail1"
                                            placeholder="Enter Regular Price" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sale Price</label>
                                        <input type="text" class="form-control" name="p_sale_price" id="exampleInputEmail1"
                                            placeholder="Enter Sale Price" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Available qty</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Available qty" name="p_qty" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customFile">Upload Image </label>

                                        <div class="custom-file">
                                        <input type="file"  name="p_image" required autocomplete="off" >
                                            <!-- <input type="file" class="custom-file-input" name="p_image" id="customFile" required> -->
                                            <!-- <label class="custom-file-label"  for="customFile">Choose file</label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Short Description</label>
                                <textarea type="text" class="form-control" name="p_short_disc" id="exampleInputEmail1"
                                    placeholder="Enter Short Description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea type="text" class="form-control" name="p_disc" id="exampleInputEmail1"
                                    placeholder="Enter Description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Additional information</label>
                                <textarea type="text" class="form-control" name="p_add_info" id="exampleInputEmail1"
                                    placeholder="Enter Additional information" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <textarea type="text" class="form-control" name="p_meta_title" id="exampleInputEmail1"
                                    placeholder="Enter Meta Title" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Description</label>
                                <textarea type="text" class="form-control" name="p_meta_disc" id="exampleInputEmail1"
                                    placeholder="Enter Description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Keyword </label>
                                <textarea type="text" class="form-control" name="p_meta_key" id="exampleInputEmail1"
                                    placeholder="Enter Keyword" required></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="p_btn" class="btn btn-primary">Submit</button>
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

<script>
    function subcategory(id)
    {
        // alert(id);
        jQuery.ajax({
            url:'subcategoryfetch.php',
            type:'post',
            data:'id='+id,
            success:function(result){
                // alert(result);
                    jQuery('#sub_categories_id').html(result);
            }  
        });
    }
</script>

<?php

if(isset($_POST['p_btn']))
{


    // echo "<script>alert('helllo');</script>";

    $p_category = @$_POST['p_category'];
    $p_subcategory = @$_POST['p_subcategory'];
    $p_title = @$_POST['p_title'];
    $p_reguler_price = @$_POST['p_reguler_price'];
    $p_sale_price = @$_POST['p_sale_price'];
    $p_qty = @$_POST['p_qty'];
    //$p_image = @$_FILES['p_image']['name'];
    $p_short_disc = @$_POST['p_short_disc'];
    $p_disc = @$_POST['p_disc'];
    $p_add_info = @$_POST['p_add_info'];
    $p_meta_title = @$_POST['p_meta_title'];
    $p_meta_disc = @$_POST['p_meta_disc'];
    $p_meta_key = @$_POST['p_meta_key'];
    // $p_status = "not_cart";
    //$p_image = @$_FILES['p_image']['name'];
    $target = "images/";
    $target = $target . basename( $_FILES['p_image']['name']); 
    $pic=($_FILES['p_image']['name']); 

if(move_uploaded_file($_FILES['p_image']['tmp_name'],$target))
{ echo "<script>alert('The file ". basename( $_FILES['p_image']
    ['name']). " has been uploaded, and your information has been added to the directory');</script>";
    }
    else {
        echo "<script>alert('Sorry, there was a problem uploading your file.')</script>"; 
    }

// exit();
    $q2 = "INSERT INTO `products`(`category`, `subcategory`, `title`, `reguler_price`, `sale_price`, `qty`, `image`, `short_disc`, `disc`, `add_info`, `meta_title`, `meta_disc`, `meta_key`) VALUES ('$p_category','$p_subcategory','$p_title','$p_reguler_price','$p_sale_price','$p_qty','$pic','$p_short_disc','$p_disc','$p_add_info','$p_meta_title','$p_meta_disc','$p_meta_key')";

    if(mysqli_query($con,$q2))
    {
        echo "<script>alert('success');</script>";
        header('location:products.php');
    }
    else
    {
        echo "<script>alert('Error....');</script>";
    }

    
}


?>