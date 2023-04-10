
<?php
include 'master-nevbar.php';
?>
<?php 
$fetch_product = "SELECT * FROM `products`";
$fetch_product_res = mysqli_query($con,$fetch_product);
?>

<div class="content-wrapper" style="height: auto;">

<!-- breadcomes -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Deals Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="deals_details.php">Deals</a></li>
              <li class="breadcrumb-item active">Deals Form</li>
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
                    <h3 class="card-title">Add Deals</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Title</label>
                      <select class="custom-select" id="exampleSelectBorder" onchange="product(this.options[this.selectedIndex].value)" name="p_category" required>
                          <option value="">Select product Title</option>
                          <?php while($r = mysqli_fetch_row($fetch_product_res))
                          { ?>
                            <option value="<?php echo $r[3]; ?>"><?php echo $r[3]; ?></option>
                          <?php } ?>
                           
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product image</label>
                      <div id="image_div">
  
                      </div>
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


<script>
    function product(id)
    {
        // alert(id);
        jQuery.ajax({
            url:'dealproductfetch.php',
            type:'post',
            data:'id='+id,
            success:function(result){
              var img = $('<img id="image_id" height="100px" width="100px">')
              img.attr('src', 'images/' + result);
              img.appendTo('#image_div');
            }  
        });
    }
</script>

<?php
include 'master-footer.php';
?>


