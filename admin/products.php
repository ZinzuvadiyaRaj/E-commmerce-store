<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';
include_once('../log-reg/conn.php');

?>


<?php

$fatch_all_products = "SELECT * FROM products";
$res_products = mysqli_query($con,$fatch_all_products);

?>
<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#products').DataTable();
    });
  </script>
</head>
<div class="content-wrapper" style="height: 950px;">

    <!-- breadcomes -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <hr>
    </section>
    <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
      
            <a href="products_form.php"><button class="btn btn-outline-primary">Add product</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title">Products</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="overflow-x: scroll;">
            <!-- <table id="example2" class="table table-bordered table-hover"> -->
            <div class="table-responsive-xxl">
              <table class="table" id="products">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Title</th>
                    <th>reguler_price</th>
                    <th>sale_price</th>
                    <th>qty</th>
                    <th>image</th>
                    <th>short_disc</th>
                    <th>disc</th>
                    <th>add_info</th>
                    <th>meta_title</th>
                    <th>meta_disc</th>
                    <th>meta_key</th>
                    <th>Deals</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while ($r1 = mysqli_fetch_row($res_products))
                    {
                      
                    ?>
                  <tr>
                    <td><?php echo $r1[0]; ?></td>
                    <td><?php echo $r1[1]; ?></td>
                    <td><?php echo $r1[2]; ?></td>
                    <td><?php echo $r1[3]; ?></td>
                    <td><?php echo $r1[4]; ?></td>
                    <td><?php echo $r1[5]; ?></td>
                    <td><?php echo $r1[6]; ?></td>
                    <td><img src="images/<?php echo $r1[7]; ?>" alt="images" hight="100px" width="100px"></td>
                    <td><?php echo $r1[8]; ?></td>
                    <td><?php echo $r1[9]; ?></td>
                    <td><?php echo $r1[10]; ?></td>
                    <td><?php echo $r1[11]; ?></td>
                    <td><?php echo $r1[12]; ?></td>
                    <td><?php echo $r1[13]; ?></td>
                    <td>      <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal<?php echo $r1[0]; ?>">
  deals
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $r1[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Deals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Product Title</label>
        <input type="text" class="form-control" value="<?php echo $r1[3]; ?>" disabled>
        <input type="hidden" name="deal_title" class="form-control" value="<?php echo $r1[3]; ?>">
        <input type="hidden" name="deal_id" class="form-control" value="<?php echo $r1[0]; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product image</label><br>
        <img src="images/<?php echo $r1[7]; ?>" alt="images" hight="100px" width="100px">
        <input type="hidden" name="deal_image" class="form-control" value="<?php echo $r1[7]; ?>">

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product Sale Price</label><br>
        <input type="text" class="form-control" value="<?php echo $r1[5]; ?>" disabled>
        <input type="hidden" name="deal_sale_price" class="form-control" value="<?php echo $r1[5]; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Month</label><br>
        <select name="deal_month" class="form-control">
          <option value="January">January</option>
          <option value="February">February</option>
          <option value="March">March</option>
          <option value="April">April</option>
          <option value="May">May</option>
          <option value="June">June</option>
          <option value="July">July</option>
          <option value="August">August</option>
          <option value="September">September</option>
          <option value="Octomber">Octomber</option>
          <option value="November">November</option>
          <option value="December">December</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Days</label><br>
        <input type="number" name="deal_day" class="form-control" placeholder="Enter Days">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Year</label><br>
        <input type="number" name="deal_year" class="form-control" placeholder="Enter Year">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Hours</label><br>
        <input type="number" name="deal_hours" class="form-control" placeholder="Enter Hours">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Minutes</label><br>
        <input type="number" name="deal_minutes" class="form-control" placeholder="Enter Minutes">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Secound</label><br>
        <input type="number" name="deal_secound" class="form-control" placeholder="Enter Secound">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="deal_btn" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Product form -->
    
</div>

<?php
include 'master-footer.php';
?>


<?php 
if(isset($_POST['deal_btn']))
{
    $deal_id = $_POST['deal_id'];
    $deal_title = $_POST['deal_title'];
    $deal_image = $_POST['deal_image'];
    $deal_sale_price = $_POST['deal_sale_price'];
    $deal_month = $_POST['deal_month'];
    $deal_day = $_POST['deal_day'];
    $deal_year = $_POST['deal_year'];
    $deal_hours = $_POST['deal_hours'];
    $deal_minutes = $_POST['deal_minutes'];
    $deal_secound = $_POST['deal_secound'];


    $deal_q = "UPDATE `manage_deals` SET `prod_id`='$deal_id',`title`='$deal_title',`image`='$deal_image',`sale_price`='$deal_sale_price',`month`='$deal_month',`day`='$deal_day',`year`='$deal_year',`hour`='$deal_hours',`minutes`='$deal_minutes',`second`='$deal_secound' WHERE `id`='1' ";
    if(mysqli_query($con,$deal_q))
    {
      echo "<script>alert('success');</script>";
    }
    else
    {
      echo "<script>alert('Error...!');</script>";
    }

}
?>
