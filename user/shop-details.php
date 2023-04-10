<?php

include 'master_header.php';
// include_once '../log-reg/conn.php';

ob_start();
session_start();


$current_user_email = $_SESSION['email'];
$current_user_password = $_SESSION['password'];

        // echo $current_user_password;
        // echo $current_user_email;
// exit();
$current_user = "SELECT id FROM register_master WHERE email='$current_user_email' AND password='$current_user_password' ";
$current_user_res = mysqli_query($con,$current_user);
$current_user_r = mysqli_fetch_array($current_user_res);

// echo "<script>alert('$current_user_r[0]');</script>";
// exit();

// $current_user = "SELECT * FROM register_master WHERE email='$current_user_email' AND password='$current_user_password' ";
// $current_user_res = mysqli_fetch_array($con,$q);


$id = $_GET['id'];
// echo "<script>alert('$id');</script>";

$fetch_product = "select * from products where id='$id'";
$fetch_res = mysqli_query($con,$fetch_product);
$r = mysqli_fetch_row($fetch_res);

$cart_q = "select * from add_cart where prod_id='$id'";
$cart_res = mysqli_query($con,$cart_q);
$cart_r = mysqli_fetch_row($cart_res);
 
?>

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <!-- <form action="" method="post"> -->
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./index.php">Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="../admin/images/<?php echo $r[7]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>
                            <?php echo $r[3]; ?>
                        </h4>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h3>$
                            <?php echo $r[5]; ?><span>$
                                <?php echo $r[4]; ?>
                            </span>
                        </h3>
                        <p>
                            <?php echo $r[8]; ?>
                        </p>

                        <form method="post">
                            <input type="hidden" name="prod_id" value="<?php echo $r[0]; ?>">
                            <input type="hidden" name="prod_img" value="<?php echo $r[7]; ?>">
                            <input type="hidden" name="prod_title" value="<?php echo $r[3]; ?>">
                            <input type="hidden" name="reguler_price" value="<?php echo $r[4]; ?>">
                            <input type="hidden" name="prod_price" value="<?php echo $r[5]; ?>">
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="prod_qty" value="1">
                                    </div>
                                </div>
                            <?php 
        
                                if($cart_r[7] == "In-Cart" || $cart_r[7] == "Buy-now")
                                { 
                                    if($cart_r[6] == $current_user_r[0])
                                    {
                            ?>
                                    <a href="shopping-cart.php" class="primary-btn">Go to cart </a>
                            <?php
                                    }
                                    else
                                    {
                            ?>   
                                    <button type="submit" name="add-cart" class="primary-btn">add to to cart</button>
                            <?php        
                                    }

                                }
                                else
                                {
                            ?>
                                    <button type="submit" name="add-cart" class="primary-btn">add to cart</button>
                            <?php 
                                }
                            ?>
                            </div>
                            <div class="product__details__btns__option">
                                <button type="submit" name="add-wishlist" style="border:none; background: white;"> <i
                                        class="fa fa-heart"></i> add to wishlist</button>
                            </div>
                        </form>

                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="img/shop-details/details-payment.png" alt="">
                            <ul>
                                <li><span>SKU:</span> 3812912</li>
                                <li><span>Categories:</span> Clothes</li>
                                <li><span>Tag:</span> Clothes, Skin, Body</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>
                                            <?php echo $r[9]; ?>
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">
                                        <?php echo $r[10]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
</section>
<!-- Shop Details Section End -->

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
<script>
    function manage_cart(pid, type) {
        if (type == 'update') {
            var qty = jQuery("#" + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function (result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = window.location.href;
                }
                if (result == 'not_avaliable') {
                    alert('Qty not avaliable');
                } else {
                    jQuery('.htc__qua').html(result);
                }
            }
        });
    }</script>
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

<?php
if(isset($_POST['add-cart']))
{


    $prod_id = $_POST['prod_id'];
    $prod_img = $_POST['prod_img'];
    $prod_title = $_POST['prod_title'];
    $prod_rel_price = $_POST['prod_price'];
    $prod_qty = $_POST['prod_qty'];
    $prod_price = $_POST['prod_price'] * $prod_qty;
    $status = "In-Cart";
    // echo "<script>alert('$prod_price');</script>";

    $q = "INSERT INTO `add_cart`(`prod_img`, `prod_title`, `prod_qty`, `prod_rel_price`, `prod_price`, `user_id`, `status`, `prod_id`) VALUES ('$prod_img','$prod_title','$prod_qty','$prod_rel_price','$prod_price','$current_user_r[0]','$status','$prod_id')";

    if(mysqli_query($con,$q))
    {
        $cart_prod_q = "UPDATE `products` SET `status`='in-cart' WHERE `id`='$prod_id' ";
        if(mysqli_query($con,$cart_prod_q))
        {
            echo "<script>alert('Product Add successfully in the cart ');</script>";
            header("location:shop-details.php?id=$prod_id");
        }
    }
    else
    {
        echo "<script>alert('Error...!');</script>";
    }
}
?>
<?php

if(isset($_POST['add-wishlist']))
{
    $product_id = $_POST['prod_id'];
    $wishlist_img = $_POST['prod_img'];
    $wishlist_title = $_POST['prod_title'];
    $wishlist_reguler_price = $_POST['reguler_price'];
    $wishlist_sale_price = $_POST['prod_price'];


    $q = "INSERT INTO `wishlist_master`(`wishlist_img`, `wishlist_title`, `reguler_price`, `sale_price`,`product_id`) VALUES ('$wishlist_img','$wishlist_title','$wishlist_reguler_price','$wishlist_sale_price','$product_id')";

    if(mysqli_query($con,$q))
    {

        echo "<script>alert('Product Add successfully in the Wishlist ');</script>";
        // header("location:shop-details.php");
    }
    else
    {
        echo "<script>alert('Error...!');</script>";
    }
    
}
?>