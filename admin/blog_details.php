<?php
include 'master-nevbar.php';

// include_once '../log-reg/conn.php';

$fatch_all_blog = "SELECT * FROM blog_master";
$res1 = mysqli_query($con,$fatch_all_blog);
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

<div class="content-wrapper" style="height:auto;">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Blog Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Blog</li>
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
            <a href="blog_form.php"><button class="btn btn-outline-primary">Add Blog</button></a>
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
            <h3 class="card-title">Blog</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- <table id="example2" class="table table-bordered table-hover"> -->
            <div class="table-responsive-xxl">
              <table class="table" id="category">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>blog Date</th>
                    <th>blog title</th>
                    <th>blog Image</th>
                    <th>status</th>
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
                      <a href="blog_imaegs/<?php echo $r1[3]; ?>  " target="_blank"><img src="blog_imaegs/<?php echo $r1[3]; ?>" alt="blog_image" height="80px" width="80px">
                      
                    </td>
                    <td>
                      <?php echo $r1[4]; ?>
                    </td>
                    <td>
                      <?php if($r1[4] == 'active'){ ?>
                      <a href="blog_details.php?inactive=<?php echo $r1[0]; ?>"><button type="submit" class="btn btn-outline-danger btn-sm">in-active</button></a>
                      <?php }
                      else 
                      {?>
                        <a href="blog_details.php?active=<?php echo $r1[0]; ?>"><button type="submit" class="btn btn-outline-success btn-sm">active</button></a>
                      <?php } ?>
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
if(isset($_GET['inactive']))
{
    $inactive = $_GET['inactive'];

    $inactive_q = "UPDATE `blog_master` SET `status`='in-active' WHERE `id` = '$inactive' ";
    if(mysqli_query($con,$inactive_q))
    {
        header("location:blog_details.php");
    }
    else
    {
      echo "<scrpit>alert('Error...!'); </script>";
    }
}

?>

<?php
if(isset($_GET['active']))
{
    $active = $_GET['active'];

    $active_q = "UPDATE `blog_master` SET `status`='active' WHERE `id` = '$active' ";
    if(mysqli_query($con,$active_q))
    {
        header("location:blog_details.php");
    }
    else
    {
      echo "<scrpit>alert('Error...!'); </script>";
    }
}

?>