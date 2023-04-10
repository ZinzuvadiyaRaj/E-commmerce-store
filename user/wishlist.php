<?php

include_once '../log-reg/conn.php';
include 'master_header.php';

ob_start();
session_start();

$wishlist_product = "select * from wishlist_master";
$wishlist_res = mysqli_query($con,$wishlist_product);


?>


    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

   

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Wishlist</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    
                   
                    <div class="row p-5" style="mardin: 0px;">
                        <?php
                            while($r = mysqli_fetch_array($wishlist_res))
                            {

                        
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            
                            <div class="product__item">
                            <img src="../admin/images/<?php echo $r[1]; ?>" alt="" height="300px" width="300px">
                                <div class="product__item__text">
                                    <h6><?php echo $r[2]; ?></h6>
                                    <a href="shop-details.php?id=<?php echo $r[5]; ?>" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                    <h5>$<?php echo $r[4]; ?> &nbsp;<sub><del>$<?php echo $r[3]; ?></del></sub></h5>
                                </div>
                                <a href="wishlist.php?id=<?php echo $r[0]; ?>"><button class="btn btn-outline-dark mt-3" type="submit" name="remove">Remove Wishlist</button></a>

                            </div>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
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


<?php
if(isset($_GET['id']))
{
    $get_id = $_GET['id'];
    // echo $get_email;
    $q = "delete from wishlist_master where id='$get_id'";

    if(mysqli_query($con,$q))
    {
        header("location:wishlist.php");
    }
    else 
    {
        echo "error";
    }
}

?>