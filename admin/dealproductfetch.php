<?php
include_once('../log-reg/conn.php');

    $product_id = $_POST['id'];
    // echo "category id is".$category_id;

    $fetch_product_q = "SELECT * FROM products WHERE title='$product_id' ";
    $fetch_product_res = mysqli_query($con,$fetch_product_q);
    while($fetch_product_r = mysqli_fetch_array($fetch_product_res))
    {
        echo $fetch_product_r[7];
    }

?>