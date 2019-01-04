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
                        <li class="nav-item"><a class="nav-link hover-theme-color<?= $activeNav; ?>" href="index2.php" data-click="scroll-to-target">HOME <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#about" data-click="scroll-to-target">ABOUT <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#events" data-click="scroll-to-target">EVENTS <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="gallery.php" data-click="scroll-to-target">GALLERY <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="contact.php" data-click="scroll-to-target">CONTACT <span>&nbsp;</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="home">
        <section class="home__carousel">
            <div class="container-fluid">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/oobar_front_view_new.jpg" alt="" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/oobar_new_banner_compressed.jpg" alt="" class="d-block w-100">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </section>
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="about__title text-center">
                            About Us 
                        </h2>
                        <p class="about__desc">
                            Located on our 8th and 9th floor, Oo Bar and Lounge provides a trendy and upscale lounge for our guests. Here you will find all the luxuries of Manhattan, without the hassle of city transit. Enjoy divine appetizers and delicious cocktails in a gorgeous marble stone space, flooded with LED lights. No reservations are required for Oo Bar and Lounge. Head upstairs to our rooftop glass house to enjoy sweeping views of the Manhattan skyline or to cozy up at one of our handmade fire pits. 
                            <br />
                            <br />
                            For access, please use the designated elevator located on the lobby floor.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="events" class="events">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="events__title text-center">
                            Upcoming Events 
                        </h2>
                        <div id="events-carousel">
                            <?php 
                                // $sqlQuery = 'CALL spSelectUpcomingEvents();';
                                $sqlQuery = 'SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC;';
                                $rs = $mysqli->query($sqlQuery);
                                $count = 0;
                                $dotsCount = 0;

                                if ($rs->num_rows > 0){
                                    $rowCount = $rs->num_rows;
                                ?>
                                <div class="carousel__container">
                                    <div class="carousel__left-arrow carousel__left-arrow--color-black">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="carousel__content">
                                    <?php
                                        while ($row = $rs->fetch_assoc()){ 
                                            if ( ($count == 0) || (($count % 4) == 0) ){
                                                echo '<div class="carousel__slide fade-carousel">';
                                                echo '<ul class="grid grid--events grid--gap-1 grid--justify-items-center grid--align-items-center fade-carousel">';
                                            }
                                            $bannerPath = $row['banner_path'];
                                            if (empty($bannerPath)){
                                                $bannerPath = $_SERVER['DOCUMENT_ROOT'] . '/img/banner.jpg';
                                            }
                                            $startTime = date('h:i a', strtotime($row['start_time']));
                                            $endTime = date('h:i a', strtotime($row['end_time']));
                                            ?>
                                                <!-- <div class="carousel__slide fade-carousel"> -->
                                                    <!-- <ul class="grid grid--events grid--gap-1 grid--justify-items-center grid--align-items-center fade-carousel"> -->
                                                        <li class="grid__item flex flex--column flex--no-wrap flex--align-items-center flex--justify-content-center">
                                                            <div class="card-custom">
                                                                <div class="card-custom__banner">

                                                                    <img src="<?= $bannerPath ?>" width="100%" height="100%" alt="banner image">
                                                                </div>
                                                                <div class="card-custom__title">
                                                                    <h2 class="card-custom__header"><?= $row['event_name'] ?></h2>
                                                                </div>
                                                                <div class="card-custom__info">
                                                                    <p class="card-custom__date"><?= date('M d, Y', strtotime($row['event_date'])); ?></p>
                                                                    <p class="card-custom__time"><?php echo $startTime . ' - ' . $endTime ?></p>
                                                                </div>
                                                                <div class="btn-container">
                                                                    <a href="/event-details.php?eventid=<?= $row['id'] ?>" class="button">More Details</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <!-- </ul>
                                                </div> -->
                                                <?php

                                            $count++;
                                            if (($count == $rowCount) || (($count % 4) == 0)){
                                                echo '</ul>';
                                                echo '</div>';
                                                $dotsCount++;
                                            }
                                        }
                                    ?>
                                    </div>
                                    <div class="carousel__right-arrow carousel__right-arrow--color-black">
                                            <i class="fa fa-angle-right"></i>
                                    </div>
                                    </div>
                                    <div class="carousel__dots margin-top-small">
                                        <?php 
                                        for ($i = 0; $i < $dotsCount; $i++){
                                            echo '<span class="carousel__dot carousel__dot--small carousel__dot--color-black"></span>';
                                        }
                                        ?>
                                        <!-- <span class="carousel__dot carousel__dot--small carousel__dot--color-black"></span>
                                        <span class="carousel__dot carousel__dot--small carousel__dot--color-black"></span> -->
                                    </div>
                                <?php
                                    $rs->close();
                                } else { ?>
                                    <p class="content-desc text-center">
                                        No upcoming events! Contact us if you'd like to book an event.
                                    </p>
                                    <?php 
                                }
                                ?>
                        </div>
                    </div>
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