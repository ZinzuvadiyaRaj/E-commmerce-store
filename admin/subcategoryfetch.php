<?php
include_once('../log-reg/conn.php');

    $category_id = $_POST['id'];
    // echo "category id is".$category_id;

    $fetch_subcategory_q = "SELECT * FROM sub_category WHERE category='$category_id' ";
    $fetch_subcategory_res = mysqli_query($con,$fetch_subcategory_q);
    while($fetch_subcategory_r = mysqli_fetch_array($fetch_subcategory_res))
    {
        echo "<option>".$fetch_subcategory_r[2]."</option>";
    }

?>