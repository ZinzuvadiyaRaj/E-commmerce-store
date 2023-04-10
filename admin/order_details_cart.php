<?php
include('master-nevbar.php');

$order_id = $_GET['id'];
    $order_cart_q = "SELECT * FROM `order_management` WHERE `id`='$order_id' ";
    $order_cart_res = mysqli_query($con,$order_cart_q);
    $order_cart_r = mysqli_fetch_array($order_cart_res);
    $order_user_id = $order_cart_r[12];
    
    $add_cart_q = "SELECT * FROM `add_cart` WHERE `user_id`='$order_user_id' AND `status`='order' ";
    $add_cart_res = mysqli_query($con,$add_cart_q);

    
?>
<head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
  


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>










<script>
//   $(document).ready( function () {
//     $('#simple_table').DataTable();
// } );

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


</script>

</head>

<div class="content-wrapper">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="order_details.php">Order details</a></li>
            <li class="breadcrumb-item active">Order products</li>
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
              <h3 class="card-title">Order products</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- <table id="example2" class="table table-bordered table-hover"> -->
              <div class="table-responsive-xxl">
                <table class="table" id="example">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>QTY</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $total_cart;
                        while($add_cart_r = mysqli_fetch_array($add_cart_res))
                        {
                        ?>
                    <tr>
                      <td><?php echo $add_cart_r[0]; ?></td>
                      <td><img src="images/<?php echo $add_cart_r[1]; ?>" alt="Product Image" height="80px" width="80px"></td>
                      <td><?php echo $add_cart_r[2]; ?></td>
                      <td><?php echo $add_cart_r[3]; ?></td>
                      <td><?php echo $add_cart_r[5]; ?></td>
                         <?php $total = $total + $add_cart_r[5];?> 
                    </tr>
                    <?php 
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end align-items-end">
                  <h3 class="card-title ">Total : <span class='text-danger'> $ <?php echo $total; ?></span> </h3>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

</div>


</script>
<?php
include('master-footer.php');
?>