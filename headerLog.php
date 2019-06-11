<?php if($_SESSION['panier'] == NULL) {
    unset($_SESSION['panier']);
}
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}

require_once '_header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Billetterie Agence la DS !</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- FORM  -->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">


    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">

                <li><a href="mailto:contact@agencelads.com"><i class="fa fa-envelope-o"></i> contact@agencelads.com</a></li>
                <li><a href="https://urlz.fr/8OFM" target="_blank"><i class="fa fa-map-marker"></i>12 Allée du Grand Pavois, 34200 Sète</a></li>
                <?php  if(isset($_SESSION['auth'])){ ?>
                <li><a href="index.php" style="margin-left: 400px"><i class="fas fa-users"></i><?= $_SESSION['auth']['email'];?></a></li>
                <li><a href="logout.php""><i class="fas fa-users"></i>Déconnection</a></li>

                    <?php
                } else{ ?>
                <li><a href="register.php" style="margin-left: 400px"><i class="fas fa-users"></i>S'inscrire</a></li>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Se connecter</a></li>

                <?php } ?>



            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <a href="index.php"><img src="./img/logo.png" alt=""></a>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->


                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix" style="margin-left:555px; margin-top: 20px;">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown">
                            <a href="cart.php?checkout" >
                                <i class="fa fa-shopping-cart" ></i>
                                <span>Votre panier</span>
                                <?php if(isset($_SESSION['panier'])): ?>
                                    <div class="qty"><?= $panier->count() ?></div>
                                <?php endif; ?>
                            </a>




                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <?php  if(isset($_SESSION['panier']) && !isset($_GET['checkout']) && !isset($_GET['delPanier']) && $_SESSION['panier'] != NULL){ ?>
                <div class="alert alert-success checkout" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="far fa-times-circle"></i></button>
                    <h4 class="alert-heading">Billet(s) ajouté(s) au panier !</h4>
                    <p>Finalisez votre commande en allant <a href="cart.php?checkout">dans votre panier. </a></p>
                </div>
            <?php } ?>

            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="index.php">Accueil</a></li>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
