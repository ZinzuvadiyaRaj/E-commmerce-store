<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';

$fatch_all_contact = "SELECT * FROM contact_master WHERE `status`='active' ";
$res1 = mysqli_query($con,$fatch_all_contact);
?>

<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#contact').DataTable();
    });
  </script>
</head>

<div class="content-wrapper" style="">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Contact Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Contact details</li>
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
            <h3 class="card-title">Contact Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- <table id="example2" class="table table-bordered table-hover"> -->
            <div class="table-responsive-xxl">
              <table class="table" id="contact">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                      <th>Massage</th>
                      <th>Status</th>
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
                        <a href="contact_details.php?delete=<?php echo $r1[0]; ?>"><button class="btn btn-outline-danger btn-sm">DELETE</button></a>
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
    $delete = $_GET['delete'];

    $delete_q = "UPDATE `contact_master` SET `status`='in-active' WHERE `id` = '$delete' ";
    if(mysqli_query($con,$delete_q))
    {
        header("location:contact_details.php");
    }
    else
    {
      echo "<scrpit>alert('Error...!'); </script>";
    }
}

?>

