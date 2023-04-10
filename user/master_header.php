    <?php 
include_once '../log-reg/conn.php';
 ob_start();
 session_start();

 if(!(isset($_SESSION['email'])) && !(isset($_SESSION['password'])))
{
  header("location:../log-reg/login.php");
}

$current_user_email = $_SESSION['email'];
$current_user_password = $_SESSION['password'];
 

 function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
  }
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<header class="header">
    <div class="container">
        <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class=""><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a> </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="shopping-cart.php">Shopping Cart</a></li>
                                    <li><a href="checkout.php">Check Out</a></li>
                                    <li><a href="log-details.php">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contacts</a></li>
                            <li><a href="master_header.php?logout" class="nav-link">&nbsp;Logout </a></li>
          <?php
            if(isset($_GET['logout']))
            {
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                session_destroy();
                header("location:../log-reg/login.php");
            }
          ?>
                            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="wishlist.php"><img src="img/icon/heart.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""></a>
                        
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
