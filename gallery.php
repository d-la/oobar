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

</head>

<body data-spy="scroll" data-target="#header" data-offset="51" class="oobar-new-design">
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
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index2.php" data-click="scroll-to-target">HOME <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index2.php#about" data-click="scroll-to-target">ABOUT <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index2.php#events" data-click="scroll-to-target">EVENTS <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color<?= $activeNav; ?>" href="gallery.php" data-click="scroll-to-target">GALLERY <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="contact.php" data-click="scroll-to-target">CONTACT <span>&nbsp;</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="home">
        <section class="gallery">
            <div class="container">
                <div class="row">
                    <h2 class="content-title">Gallery</h2>
                        <?php
                        $sqlQuery = 'SELECT id, name, description, path FROM gallery_images;';
                        $resultSet = $mysqli->query($sqlQuery);
                        $numRows = $resultSet->num_rows;

                        if ($numRows == 0){
                        ?>
                        <p class="content-desc text-center">
                            No photos available!
                        </p>
                        <?php 
                        } else {
                        ?>
                        <!-- begin row -->
                        <div class="row row-space-10">
                            <?php
                            $count = 0;
                            if ($resultSet->num_rows > 0){
                                while ($row = $resultSet->fetch_assoc()){
                                    $title = $row['name'];
                                    $description = $row['description'];
                                    $path = $row['path'];
                                    ?>
                                    <!-- begin col-3 -->
                                    <div class="col-md-3 col-sm-6">
                                        <!-- begin work -->
                                        <div class="work" data-click="show-gallery-image" data-position="<?= $count; ?>"> 
                                            <div class="image">
                                                <a href="<?= $path ?>" target="_blank"><img src="<?= $path ?>" alt="<?= $title ?>" /></a>
                                            </div>
                                            <div class="desc">
                                                <span class="desc-title"><?= $title; ?></span>
                                                <!-- <span class="desc-text">Lorem ipsum dolor sit amet</span> -->
                                            </div>
                                        </div>
                                        <!-- end work -->
                                    </div>
                                    <!-- end col-3 -->

                                    <?php
                                    // Keep track of each photo's position
                                    $count++;
                                }

                                $resultSet->close();
                            }
                            ?>
                        </div>
                        <?php 
                        }
                        ?>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">
                                hotel information
                            </h3>
                            <p class="footer-widget__content">
                                <strong>Check-In: 3PM</strong>
                                <br />
                                <strong>Check-Out: 12PM</strong>
                                <br />
                                Non-Smoking
                                <br />
                                Street Parking
                                <br />
                                Pets not allowed!
                            </p>
                        
                        </div>
                    
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">
                                contact us
                            </h3>
                            <p class="footer-widget__content">
                                <strong>137-72 Northern Blvd, Flushing</strong>
                                <br />
                                <strong>NY 11354</strong>
                                <br />
                                <strong>Phone:</strong> <a href="tel:7188863555">(718) 886-3555</a>
                                <br />
                                <strong>Fax:</strong> (718) 886-3553
                                <br />
                                <a href="mailto:info@theone-ny.com">info@theone-ny.com</a>
                            </p>
                        </div>
                    
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">
                                spa castle new york
                            </h3>
                            <p class="footer-widget__content">
                                131-10 11 Ave College Point, NY 11356
                                <br />
                                <a href="http://www.nyspacastle.com" target="_blank">www.nyspacastle.com</a>
                            </p>

                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <p class="copy-right">&copy; Spa Castle Inc. 2013-2019. All rights reserved. Any redistribution or reproduction of part or all of the contents in any form is prohibited. </p>
                </div>
                <div class="col-lg-6 col-xs-12 text-right">
                    <p class="hotel-policy"><a href="http://theone-ny.com/hotel-policy/">Hotel Policy</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>