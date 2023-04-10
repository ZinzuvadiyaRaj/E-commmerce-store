<?php
include 'master_header.php';

$current_user = "SELECT * FROM register_master WHERE email='$current_user_email' AND password='$current_user_password' ";
$current_user_res = mysqli_query($con,$current_user);
$current_user_r = mysqli_fetch_array($current_user_res);

$id = $current_user_r[0];
// echo "<script>alert('$id');</script>";
// exit();


// $order_q = "select * from order_master where user_id='$id'";
// $res = mysqli_query($con,$order_q);

$order_q = "select * from add_cart where user_id='$id' AND status='Buy-now' ";
$res = mysqli_query($con,$order_q);

if(isset($_GET['success']))
{
    echo "<script>alert('success');</script>";
    header("location:checkout.php");

}

?>

<style>
    input:disabled {
        background: lightgray;
        color: black;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" value="<?php echo $current_user_r[1]; ?>" disabled>
                                    <input type="hidden" name="checkout_first_name"
                                        value="<?php echo $current_user_r[1]; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" value="<?php echo $current_user_r[2]; ?>" disabled>
                                    <input type="hidden" name="checkout_last_name"
                                        value="<?php echo $current_user_r[2]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="checkout_country" required>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" name="checkout_address"
                                class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="checkout_city" required>
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="checkout_state" required>
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="checkout_zip" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" value="<?php echo $current_user_r[3]; ?>" disabled>
                                    <input type="hidden" name="checkout_phone"
                                        value="<?php echo $current_user_r[3]; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value="<?php echo $current_user_r[4]; ?>" disabled>
                                    <input type="hidden" name="checkout_email"
                                        value="<?php echo $current_user_r[4]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery."
                                name="checkout_notes" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <?php
        $total = 0;
        while($r = mysqli_fetch_array($res))
        {
            ?>
                                <li>
                                    <?php echo $r[2]; ?> <span>$
                                        <?php echo $r[5]; ?>
                                    </span>
                                </li>
                                <?php $total += $r[5]; } 
    ?>

                            </ul>
                            <ul class="checkout__total__all">
                            <li>Sub Total <span>$<?php echo $total; ?></span></li>
                            <li>coupon code : <a id="couden_code"></a> <span id="coupon_discount"></span></li>
                            <li>Total <span id="total">$<?php echo $total; ?></span></li>
                            </ul>
                            <div class="col-lg-12">
                                <div class="cart__discount">
                                    <h6>Discount codes</h6>
                                    <input type="text" id="myInput" placeholder="Coupon Code">
                                    <button onclick="showValue()">Apply</button><br>
                                    <span id="cart_min_value"></span>
                                </div>
                            </div>  
                            <script>
                                function showValue() {
                                    var inputValue = document.getElementById("myInput").value;
                                    var total = <?php echo $total; ?>
                                    // alert(inputValue);
                                    jQuery.ajax({
                                        url:'couponfetch.php',
                                        type:'post',
                                        data:'id='+inputValue+'&total='+total,
                                        success:function(data){
                                            // alert(result);
                                            var data = $.parseJSON(data);
                                            
                                            jQuery('#cart_min_value').html(data.cart_min_value);
                                            jQuery('#couden_code').html(data.coupon_code);
                                            jQuery('#coupon').html(data.coupon_min_value);
                                            jQuery('#coupon_discount').html(data.coupon_discount);
                                            jQuery('#total').html(data.total);
                                            // jQuery('#total').html(result.total);

                                        },
                                    });
                                }
	                        </script>
                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Check Payment
                                            <input type="checkbox" id="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Paypal
                                            <input type="checkbox" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <button type="submit" name="checkout" class="site-btn">PLACE ORDER</button>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
<?php

if(isset($_POST['checkout']))
{

    $firstname = $_POST['checkout_first_name'];
    $lastname = $_POST['checkout_last_name'];
    $country = $_POST['checkout_country'];
    $address = $_POST['checkout_address'];
    $city = $_POST['checkout_city'];
    $state = $_POST['checkout_state'];  
    $zip = $_POST['checkout_zip'];  
    $phone = $_POST['checkout_phone'];  
    $email = $_POST['checkout_email'];  
    $notes = $_POST['checkout_notes'];
    $user_id = $id;
    $status = "progress";


    $order_q = "INSERT INTO `order_management`(`firstname`, `lastname`, `country`, `address`, `city`, `state`, `zip`, `phone`, `email`, `notes`, `status`,`user_id`) VALUES ('$firstname','$lastname','$country','$address','$city','$state','$zip','$phone','$email','$notes','$status','$user_id')";

    if(mysqli_query($con,$order_q))
    {
        // echo "<script>alert('success');</script>";

        $update_cart_status = "UPDATE `add_cart` SET `status`='order' WHERE `user_id`='$id' ";
            if(mysqli_query($con,$update_cart_status))
            {
                header("location:checkout.php?success");
            }
           else
           {
             echo "<script>alert('Error...!');</script>";
           }
    }
    else
    {
        echo "<script>alert('Error...!');</script>";

    }

}
?>

<?php
        include('master_footer.php');
    ?>
<!-- Search Begin -->

<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">    
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>