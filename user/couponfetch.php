<?php
include_once("../log-reg/conn.php");

$coupon_code = $_POST['id'];
$coupon_total = $_POST['total'];


$fetch_coupon_q = "SELECT * FROM coupon_master WHERE `coupon_code`='$coupon_code' ";
$fetch_coupon_res = mysqli_query($con,$fetch_coupon_q);
$count=mysqli_num_rows($fetch_coupon_res);
$fetch_coupon_r=mysqli_fetch_row($fetch_coupon_res);

if($count > 0)
{   
    // echo $coupon_total;
    // echo $fetch_coupon_r[4];
    if($coupon_total >= $fetch_coupon_r[4])
    {
        $update_total = $coupon_total - $fetch_coupon_r[2]; 
        $data =  array(
            'cart_min_value' => '',
            'coupon_code' => $fetch_coupon_r[1],
            'coupon_min_value' => $fetch_coupon_r[4],
            'coupon_discount' => '$'.$fetch_coupon_r[2],
            'total' => '$'.$update_total 
        );
    }
    else
    {
        $data = array(
            'cart_min_value' => 'cart min value is : '.$fetch_coupon_r[4],
        );
    }
    
    
}
else
{
    $data = array(
        'cart_min_value' => 'Coupon was Not found',
    );
}
echo json_encode($data);



// echo $coupon_code;
?>