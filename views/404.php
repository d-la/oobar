<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();

$activeNav = ' nav-link--active';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131383503-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-131383503-1');
    </script>

    <meta charset="utf-8" />
    <title>Oo bar | Flushing Queens</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Website for Oo bar and lounge located in Flushing Queens, NYC" name="description" />
    <meta content="" name="author" />

    <link rel="shortcut icon" type="image/png" href="img/the_one_favicon1.png"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="/css/custom-styles.min.css" id="custom-styles" rel="stylesheet" />

    <!-- Owl CSS -->
    <link rel="stylesheet" href="/include/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="/include/owl/owl.theme.default.min.css">
</head>

<body class="oobar-new-design">
    <section class="logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="">
                        <img src="/img/oobar_logo_small.jpg" alt="Oobar and lounge logo" height="120">
                    </a>
                </div>  
            </div>
        </div>
    </section>
    <header class="header-container">
        <div class="container">
            <nav class="nav navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fa fa-bars"></i> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link hover-theme-color<?= $activeNav; ?>" href="/" data-click="scroll-to-target">HOME <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/#about" data-click="scroll-to-target">ABOUT <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/#events" data-click="scroll-to-target">EVENTS <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/gallery" data-click="scroll-to-target">GALLERY <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/contact" data-click="scroll-to-target">CONTACT <span>&nbsp;</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="home">
        <section class="not-found">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center">404</h1>
                        <p class="text-center">Sorry, the page you're looking for cannot be found!</p>
                        <p class="text-center"><a href="/">Return home</a></p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once 'footer.php'; ?>

    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>