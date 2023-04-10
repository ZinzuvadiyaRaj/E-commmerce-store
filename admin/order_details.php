<?php
include('master-nevbar.php');

$fatch_all_order = "SELECT * FROM order_management";
$res1 = mysqli_query($con,$fatch_all_order);

?>
<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#order_details').DataTable();
} );
</script>
</head>

<div class="content-wrapper">

<!-- breadcomes -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <hr>
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x: scroll;">
                <!-- <table id="example2" class="table table-bordered table-hover"> -->
                <div class="table-responsive-xxl">
                  <table class="table" id="order_details">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Country</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Notes</th>
                        <th>Status</th>
                        <th>user_id</th>
                        
                    </tr>
                </thead>
                    <tbody>
                    <?php 
                    while ($r1 = mysqli_fetch_row($res1))
                    {
                    ?>
                  <tr>
                    <td><a href="order_details_cart.php?id=<?php echo $r1[0]; ?>"><?php echo $r1[0]; ?></a></td>  
                    <td><?php echo $r1[1]; ?></td>
                    <td><?php echo $r1[2]; ?></td>
                    <td><?php echo $r1[3]; ?></td>
                    <td><?php echo $r1[4]; ?></td>
                    <td><?php echo $r1[5]; ?></td>
                    <td><?php echo $r1[6]; ?></td>
                    <td><?php echo $r1[7]; ?></td>
                    <td><?php echo $r1[8]; ?></td>
                    <td><?php echo $r1[9]; ?></td>
                    <td><?php echo $r1[10]; ?></td>
                    <td><?php echo $r1[11]; ?></td>

                    <!-- <td><select name="status" onchange="change(this.options[this.selectedIndex].value)"> 
                        <option value="<?php // echo $r1[11]; ?>">Current status : <?php // echo $r1[11]; ?></option>
                        <option value="progress">progress</option>
                        <option value="OnWay">On The Way</option>
                        <option value="delivered">delivered</option>

                        </select></td> -->
                        <td><?php echo $r1[12 ];?></td>
                    
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
  
</div>

<?php
include('master-footer.php');


?>