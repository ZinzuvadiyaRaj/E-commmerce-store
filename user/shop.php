<?php

include_once '../log-reg/conn.php';
include 'master_header.php';

ob_start();
session_start();

$fetch_product = "select * from products";
$fetch_res = mysqli_query($con,$fetch_product);

$fetch_category = "select * from category";
$fetch_res1 = mysqli_query($con,$fetch_category);

$fetch_sub_category = "select * from sub_category";
$fetch_res2 = mysqli_query($con,$fetch_sub_category);


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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                <?php
                                                    $catagory = "SELECT * FROM category";
                                                    $category_res = mysqli_query($con,$catagory);
                                                    ?>
                                                    <form action="" method="GET">

                                                    <?php
                                                    if(mysqli_num_rows($category_res) > 0)
                                                    {
                                                        foreach($category_res as $category_list)
                                                        {
                                                            $checked = [];
                                                            if(isset($_GET['category']))
                                                            {
                                                                $checked = $_GET['category'];
                                                            }
                                                            ?>
                                                            <div>
                                                                <input type="checkbox" name="category[]" value="<?php echo $category_list['id']; ?>"
                                                                    <?php if(in_array($category_list['id'], $checked)) {echo "checked";}?>
                                                                />
                                                                <?= $category_list['category'] ?>
                                                            </div>
                                                        <?php 
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "Category Not Found";
                                                    }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Sub Categories</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                            <ul class="nice-scroll">
                                            <?php
                                                    if(isset($_GET['category']))
                                                    {
                                                        $category_checked = [];
                                                        $category_checked = $_GET['category'];
                                                        foreach($category_checked as $subcatagory_items)
                                                        {
                                                            $subcatagory = "SELECT * FROM sub_category WHERE category IN ($subcatagory_items)";
                                                            $subcategory_res = mysqli_query($con,$subcatagory);
                                                            
                                                            if(mysqli_num_rows($subcategory_res) > 0)
                                                            {
                                                                foreach($subcategory_res as $subcategory_list)
                                                                {
                                                                    $subchecked = [];
                                                                    if(isset($_GET['subcategory']))
                                                                    {
                                                                        $subchecked = $_GET['subcategory'];
                                                                    }
                                                                    ?>
                                                                    <div>
                                                                        <input type="checkbox" name="subcategory[]" value="<?php echo $subcategory_list['id']; ?>"
                                                                            <?php if(in_array($subcategory_list['id'], $subchecked)) {echo "checked";}?>
                                                                        />
                                                                        <?= $subcategory_list['sub_category'] ?>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            else
                                                            {   
                                                                echo "Not found";
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "";
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary">submit</button>

                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="row">
                    <?php

if(isset($_GET['subcategory']))
{
    $subcategory_checked = [];
    $subcategory_checked = $_GET['subcategory'];
    foreach($subcategory_checked as $product_items)
    {
        $products = "SELECT * FROM products WHERE subcategory IN ($product_items)";
        $products_res = mysqli_query($con,$products);
        
        if(mysqli_num_rows($products_res) > 0)
        {
            foreach($products_res as $product_list)
            {
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../admin/images/<?php echo $product_list['image']; ?>">
                                    
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $product_list['title']; ?></h6>
                                    <a href="shop-details.php?id=<?php echo $product_list['id']; ?>" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$<?php echo $product_list['reguler_price']; ?> &nbsp;<sub><del>$<?php echo $product_list['sale_price']; ?></del></sub></h5>
                                </div>
                            </div>
                        </div>
                <?php
            }
        }
        else
        {   
            echo "";
        }
    }
}
else
{
   while($r = mysqli_fetch_array($fetch_res))
   { ?>
    <div class="col-lg-4 col-md-6 col-sm-6">
                            
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="../admin/images/<?php echo $r[7]; ?>">
            
        </div>
        <div class="product__item__text">
            <h6><?php echo $r[3]; ?></h6>
            <a href="shop-details.php?id=<?php echo $r[0]; ?>" class="add-cart">+ Add To Cart</a>
            <div class="rating">
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <h5>$<?php echo $r[4]; ?> &nbsp;<sub><del>$<?php echo $r[5]; ?></del></sub></h5>
        </div>
    </div>
</div>
   <?php }
}

?>
                        
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