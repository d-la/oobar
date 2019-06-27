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
    <meta property="og:title" content="Oobar and lounge home page" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://oobarloungeny.com/" />
    <meta property="og:image" content="http://oobarloungeny.com/img/oobar_logo_transparent_all_gold_1.png" />

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

<body>
    <main class="main">
        <section class="construction">
            <h1 class="construction__title text-center">Sorry, our website is under construction!</h1>
            <p class="construction__desc text-center"><small>Check back later!</small></p>
        </section>
    </main>

    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>