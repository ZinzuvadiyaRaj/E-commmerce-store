<?php
include 'master-nevbar.php';

ob_start();
session_start();

?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <div class="container" style="border: 2px solid black; width: 50%;">
    <hr>
    <div class="container d-flex justify-content-center" >
      <h3>Username :
        <?php echo $femail; ?>
      </h3>
    </div>
    <hr>
    <div class="container d-flex justify-content-center">
      <h3>Password :
        <?php echo $fpassword; ?>
      </h3>
    </div>
    <hr>
  </div>

</div>
<?php
include 'master-footer.php';

?>