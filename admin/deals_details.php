
<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';

$fatch_all_category = "SELECT * FROM manage_deals";
$res1 = mysqli_query($con,$fatch_all_category);
?>

<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#category').DataTable();
    });
  </script>
</head>

<div class="content-wrapper" style="height: auto;">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Deals Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Deals Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    <hr>
  </section>


  <!-- <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <a href="deals_form.php"><button class="btn btn-outline-primary">Add Deals</button></a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title">Deals</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- <table id="example2" class="table table-bordered table-hover"> -->
            <div class="table-responsive-xxl">
              <table class="table" id="category">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>image</th>
                    <th>sale price</th>
                    <th>day</th>
                    <th>hours</th>
                    <th>minutes</th>
                    <th>secound</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while ($r1 = mysqli_fetch_row($res1))
                    {
                    ?>
                  <tr>
                    <td>
                      <?php echo $r1[0]; ?>
                    </td>
                    <td>
                      <?php echo $r1[1]; ?>
                    </td>
                    <td>
                      <?php echo $r1[2]; ?>
                    </td>
                    <td>
                      <?php echo $r1[3]; ?>
                    </td>
                    <td>
                      <?php echo $r1[4]; ?>
                    </td>
                    <td>
                      <?php echo $r1[5]; ?>
                    </td>
                    <td>
                      <?php echo $r1[6]; ?>
                    </td>
                    <td>
                      <?php echo $r1[7]; ?>
                    </td>
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
include 'master-footer.php';
?>