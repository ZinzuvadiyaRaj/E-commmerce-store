<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';

$fatch_all_slider = "SELECT * FROM slider_master";
$res1 = mysqli_query($con,$fatch_all_slider);
?>

<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#slider').DataTable();
    });
  </script>
</head>

<div class="content-wrapper" style="">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slider Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Slider</li>
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
            <a href="slider_form.php"><button class="btn btn-outline-primary">Add slider</button></a>
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
            <h3 class="card-title">Slider</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- <table id="example2" class="table table-bordered table-hover"> -->
            <div class="table-responsive-xxl">
              <table class="table" id="slider">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Slider Title</th>
                    <th>Slider Discription</th>
                    <th>Slider Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                      <a href="slider_edit.php?edit=<?php echo $r1[0]; ?>"><button class="btn btn-outline-primary btn-sm">EDIT</button></a>
                    </td>
                    <td>
                      <a href="slider.php?delete=<?php echo $r1[0]; ?>"><button class="btn btn-outline-danger btn-sm">DELETE</button></a>
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

<?php 
  if(isset($_GET['delete']))
  {
    $delete_id = $_GET['delete'];

    $delete_slider_q = "UPDATE `slider_master` SET `status`='In-active' WHERE id='$delete_id' "; 
    if(mysqli_query($con,$delete_slider_q))
    {
      // echo "<script>alert('delete successfully');</script>";
      header('location:slider.php');
    }
    else
    {
      echo "<script>alert('Error...!');</script>";
    }
  }

?>