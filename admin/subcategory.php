<?php
include 'master-nevbar.php';
?>


<?php
$q = "select * from category";
$res = mysqli_query($con,$q);


$fatch_all_subcategory = "SELECT * FROM sub_category";
$res1 = mysqli_query($con,$fatch_all_subcategory);
$total_rows = mysqli_num_rows($res1);


?>

<head>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#subcategory1').DataTable();
    });
  </script>
</head>
<div class="content-wrapper" style="height:auto;">

  <!-- breadcomes -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sub Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Sub Category</li>
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
        <div class="col-md-12">
          <div class="form-group">
            <a href="subcategory_form.php"><button class="btn btn-outline-primary">Add Sub Category</button></a>
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
              <h3 class="card-title">Sub Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- <table id="example2" class="table table-bordered table-hover"> -->
              <div class="table-responsive-xxl">
                <table class="table" id="subcategory">

                  <div class="row">
                    <div class="col-lg-8">      
                      <?php if(isset($_GET['show']))
                      { ?>
                        <form method='post' action='' id='myform'>
                        <h6><b>Show <select name='entries' onchange='submitForm();'>
                            <option value='10' <?php if(isset($_POST['entries']) && $_POST['entries']=='10'){
                              echo "selected" ; } ?>>10</option>
                            <option value='5' <?php if(isset($_POST['entries']) && $_POST['entries']=='5'){
                              echo "selected" ; } ?> >5</option>
                            <option value='100' <?php if(isset($_POST['entries']) && $_POST['entries']=='100'){
                              echo "selected" ; } ?> >100</option>
                          </select> entries </b></h6>
                      </form><?php
                      } 
                      else
                      {
                        ?> 
                      <form method='post' action='' id='myform'>
                        <h6><b>Show <select name='entries' onchange='submitForm();'>
                            <option value='10' <?php if(isset($_POST['entries']) && $_POST['entries']=='10'){
                              echo "selected" ; } ?>>10</option>
                            <option value='5' <?php if(isset($_POST['entries']) && $_POST['entries']=='5'){
                              echo "selected" ; } ?> >5</option>
                            <option value='100' <?php if(isset($_POST['entries']) && $_POST['entries']=='100'){
                              echo "selected" ; } ?> >100</option>
                          </select> entries </b></h6>
                      </form>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4">
                      <div class="row">
                        <form action="" method="post">
                          <div class="col-lg-8">
                            <input type="text" name="search_query" class="form-control" placeholder="Search Data">
                          </div>
                          <div class="col-lg-4">
                            <input type="submit" class="btn btn-outline-dark" value="Search">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Script -->
                  <script type='text/javascript'>
                    function submitForm() {
                      // Call submit() method on <form id='myform'>
                      document.getElementById('myform').submit();
                    } 
                  </script>

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                     $current_entry = $_POST['entries'];
                     if($current_entry == "")
                     {
                      $current_entry = 10;
                     }
                    //  $current_entry = 2;

                     // Retrieve the search query from the form input
                     $search_query = $_POST['search_query'];
               
                     // Sanitize and validate the search query
                     $search_query = trim($search_query); // Remove any leading/trailing white space
                     $search_query = filter_var($search_query, FILTER_SANITIZE_STRING); // Sanitize the string to prevent SQL injection attacks
               
                     // Construct the SQL query using the search query
                     if(isset($_GET['entry']))
                     {
                      if($_GET['entry'] == "1")
                      {
                        $sql_query = "SELECT * FROM sub_category WHERE 
                        sub_category LIKE '%" . $search_query . "%' OR 
                        category LIKE '%" . $search_query . "%' LIMIT ". $current_entry;
                                            
                        // Execute the SQL query using mysqli_query()
                        $result = mysqli_query($con, $sql_query);
                      }
                      else
                      {
                        $sum = $_GET['entry'] - 1;
                        $limit = $sum * $current_entry; 
                        $sql_query = "SELECT * FROM sub_category WHERE 
                        sub_category LIKE '%" . $search_query . "%' OR 
                        category LIKE '%" . $search_query . "%' LIMIT ". $limit.",". $current_entry;
  
                        // Execute the SQL query using mysqli_query()
                        $result = mysqli_query($con, $sql_query);
                      }
                         
              
                     }
                     else
                     {
                        $sql_query = "SELECT * FROM sub_category WHERE 
                        sub_category LIKE '%" . $search_query . "%' OR 
                        category LIKE '%" . $search_query . "%' LIMIT ". $current_entry;
                                            
                        // Execute the SQL query using mysqli_query()
                        $result = mysqli_query($con, $sql_query);
                        
                      }
                      
                      $pages1 = $total_rows/$current_entry;
                      $pages = (int)$pages1+1;
                      $showing = 0; 
                    while ($r1 = mysqli_fetch_row($result))
                    {
                        $showing = $showing +1
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
                    </tr>
                    <?php } ?>


                  </tbody>
                </table>
                <hr style="border: 1px solid gray;">
                <div class="row">
                  <div class="col-lg-6 ">
                    <h6><b> Showing 1 to <?php echo $showing." of ". $total_rows; ?> entries  </b></h6>
                  </div>
                  <div class="col-lg-6 d-flex justify-content-end">
                      <a href="#">Previous</a>
                      <?php for($i = 1  ;$i<=$pages;$i++)
                      {
                        ?>
                        <a href="subcategory.php?entry=<?php echo $i; ?>&show=<?php echo $current_entry; ?>" class="ml-2" style="border: 1px solid lightgray;"><?php echo $i; ?></a>
<?php
                      } ?>
                      <a href="#" class="ml-2">Next</a>

                  </div>
                </div>
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
if(isset($_POST['subcategory_btn']))
{
  $select_category = @$_POST['select_category'];
  $sub_category = @$_POST['sub_category'];



  $q = "INSERT INTO `sub_category`(`category`,`sub_category`) VALUES ('$select_category','$sub_category');";

  if(mysqli_query($con,$q))
  {
    header("location:subcategory.php");
    echo "<script> alert('successfully add category'); </script>";
  }
  else
  {
    echo "<script> alert('Error in add category'); </script>"; 
  }
}
?>  