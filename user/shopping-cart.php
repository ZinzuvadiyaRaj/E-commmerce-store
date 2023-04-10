<?php
include 'master_header.php';


$current_user = "SELECT * FROM register_master WHERE email='$current_user_email' AND password='$current_user_password' ";
$current_user_res = mysqli_query($con,$current_user);
$current_user_r = mysqli_fetch_array($current_user_res);

$id = $current_user_r[0];
// echo "<script>alert('$id');</script>";
$cart_q = "select * from add_cart where user_id='$id'";
$res = mysqli_query($con,$cart_q);



?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                                while($r = mysqli_fetch_array($res))
                                { 
                                    if($r[7] == 'In-Cart' || $r[7] == 'Buy-now')
                                    {
                                ?>

                            <form method="post">
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="../admin/images/<?php echo $r[1]; ?>" alt="Product Image" height="100px" width="100px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $r[2] ?></h6>
                                            <h5><?php echo $r[4] ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">

                                            <!-- <div class="pro-qty-2"> -->
                                                <input type="number" name="cart_qty" value="<?php echo $r[3]; ?>" style="width: 30%;">
                                                <input type="hidden" name="id" value="<?php echo $r[0]; ?>">
                                                <input type="hidden" name="cart_total" value="<?php echo $r[4]; ?>">
                                                <input type="hidden" name="total" value="<?php echo $r[5]; ?>">

                                            <!-- </div> -->
                                           

                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $r[5] ?></td>
                                    <td class="cart__close"> <button name="update" class="btn btn-light" type="submit">Upadte</a></td>
                                    <td class="cart__close"> <a href="shopping-cart.php?id=<?php echo $r[0]; ?>"><i class="fa fa-close"></a></i></td>
                                </tr>
                                </form>

                                
                                <?php
                                $total += $r[5];
                               if(isset($_POST['update']))
                               {
                                   $cart_qty = $_POST['cart_qty'];
                                   $get_id_update =$_POST['id'];
                                   $cart_total = $_POST['cart_total']* $cart_qty;

                                //    echo "<script>alert('$cart_total'); </script>";
                                //    exit();
                               
                                   $update_q = "UPDATE `add_cart` SET `prod_qty` = '$cart_qty',`prod_price` = '$cart_total' WHERE `id` = '$get_id_update';";
                                   if(mysqli_query($con,$update_q))
                                   {
                                       // echo "<script>alert('Product Update Successfully'); </script>";
                                       header("location:shopping-cart.php");   
                               
                                   }
                                   else
                                   {
                                       echo "<script>alert('Error...!'); </script>";
                                   }
                               
                               
                                }
                                ?>    
                                <?php }} 
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="sumbit" name="update_cart"><i class="fa fa-spinner"></i> Update cart</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    
                    <div class="cart__total mt-5">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>$<?php echo $total; ?></span></li>
                        </ul>
                        
       
       <form method="post">
            <button type="submit" name="checkout" class="primary-btn">Proceed to checkout</button>
       </form>
<?php
        if(isset($_POST['checkout']))
        {
           
            $update_cart_status = "UPDATE `add_cart` SET `status`='Buy-now' WHERE `user_id`='$id' AND `status`='In-Cart' ";
            if(mysqli_query($con,$update_cart_status))
            {
                echo "<script>alert('success');</script>";
                header("location:checkout.php");    
            }
           else
           {
             echo "<script>alert('Error...!');</script>";
           }
        }
        ?>     </div>
                </div>
            </div>
        </div>
    </section>



    
    <!-- Shopping Cart Section End -->

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

<!-- delete cart -->
<?php

if(isset($_GET['id']))
{
    $get_id = $_GET['id'];
    // echo $get_email;
    $q = "delete from add_cart where id='$get_id'";

    if(mysqli_query($con,$q))
    {
            header("location:shopping-cart.php");
    }
    else 
    {
        echo "error";
    }
}
?>