<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();
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
    <link href="/assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/style.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/theme/default.css" id="theme" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- Custom CSS -->
    <link href="/css/custom-styles.min.css" id="custom-styles" rel="stylesheet" />

    <!-- Light slider CSS -->
    <!-- <link type="text/css" rel="stylesheet" href="/include/css/lightslider.css" />     -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body data-spy="scroll" data-target="#header" data-offset="51">
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">
                        <!-- <span class="brand-logo"></span> -->
                        <span class="brand-text">
                            <!-- <span class="text-theme">Color</span> Admin -->
                            <img src="/img/oobar-logo.jpg" alt="Oobar Logo">
                        </span>
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link active" href="#home" data-click="scroll-to-target" data-scroll-target="#home"
                                data-toggle="dropdown">HOME <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-left animated fadeInDown">
                                <a class="dropdown-item" href="index.html">Page with Transparent Header</a>
                                <a class="dropdown-item" href="index_inverse_header.html">Page with Inverse Header</a>
                                <a class="dropdown-item" href="index_default_header.html">Page with White Header</a>
                                <a class="dropdown-item" href="extra_element.html">Extra Element</a>
                            </div>
                        </li> -->
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#about" data-click="scroll-to-target">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#events" data-click="scroll-to-target">EVENTS</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#gallery" data-click="scroll-to-target">GALLERY</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#contact" data-click="scroll-to-target">CONTACT</a></li>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->

        <div id="home-new" >
            <img src="/img/oobar_view_moet_compressed.jpg" class="home-new__banner" alt="Banner">
        </div>

        <!-- begin #home -->
        <!-- <div id="home" class="content has-bg home"> -->
            <!-- begin content-bg -->
            <!-- <div id="main-content" class="content-bg" style="background-image: url(/img/oobar-view.jpg);" data-paroller="true"
                data-paroller-factor="0.5" data-paroller-factor-xs="0.25">
            </div> -->
            <!-- end content-bg -->
            <!-- begin container -->
            <!-- <div class="container home-content">
                
            </div> -->
            <!-- end container -->
        <!-- </div> -->
        <!-- end #home -->

        <!-- begin #about -->
        <div id="about" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">About Us</h2>
                <p class="content-desc">
                    Located on our 8th and 9th floor, Oo Bar and Lounge provides a trendy and upscale lounge for our guests. 
                    Here you will find all the luxuries of Manhattan, without the hassle of city transit. Enjoy divine appetizers 
                    and delicious cocktails in a gorgeous marble stone space, flooded with LED lights. No reservations are 
                    required for Oo Bar and Lounge. Head upstairs to our rooftop glass house to enjoy sweeping views of the 
                    Manhattan skyline or to cozy up at one of our handmade fire pits.

                    <br />
                    <br />
                    For access, please use the designated elevator located on the lobby floor.
                </p>
            </div>
            <!-- end container -->
        </div>
        <!-- end #about -->

        <!-- begin #milestone -->
        <div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">
            <!-- begin content-bg -->
            <div class="content-bg" style="background-image: url(/img/oobar_new_banner_compressed.jpg)" data-paroller="true"
                data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01"></div>
            <!-- end content-bg -->
            <!-- begin container -->
            <div class="container">
            </div>
            <!-- end container -->
        </div>
        <!-- end #milestone -->

        <!-- begin #events -->
        <div id="events" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">Upcoming Events</h2>
                <!-- begin row -->
                <div class="row row-space-10">
                    <div id="events-carousel" class="carousel">
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
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #events -->

        <!-- begin #gallery -->
		<div id="gallery" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInDown">
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
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #gallery -->

        <!-- begin #contact -->
        <div id="contact" class="content bg-silver-lighter" data-scrollview="true">
            <!-- begin container -->
            <div class="container">
                <h2 class="content-title">Contact Us</h2>
                <p class="content-desc">
                    For Event Inquiries or questions, please contact us through the form below.
                </p>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6" data-animation="true" data-animation-type="fadeInLeft">
                        <h4>Oo Bar & Lounge</h4>
                        <p>
                            <!-- <strong>Oobar </strong><br /> -->
                            137-72 Northern Blvd<br />
                            Flushing, New York 11354<br />
                            8th Floor <br />
                            P: (718) 886-3555<br />
                        </p>
                    </div>
                    <!-- end col-6 -->
                    <!-- begin col-6 -->
                    <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
                        <form id="contact-submission" action="controllers/contact-submission.php" method="POST" class="form-horizontal">
                            <div id="firstName" class="form-group row m-b-15">
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right">First Name <span class="text-theme">*</span></label>
                                <div class="col-md-9">
                                    <input required="required" type="text" name="firstName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right">Last Name <span class="text-theme">*</span></label>
                                <div class="col-md-9">
                                    <input required="required" type="text" name="lastName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right">Email <span class="text-theme">*</span></label>
                                <div class="col-md-9">
                                    <input required="required" type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right">Phone Number <span class="text-theme">*</span></label>
                                <div class="col-md-9">
                                    <span class="input-error" id="phone-number-error">Wrong format! Phone number must match 000-000-0000 format</span>
                                    <input required="required" type="text" id="masked-input-phone" name="phoneNumber" class="form-control" placeholder="000-000-0000" size="12" />
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right">Message <span class="text-theme">*</span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="message" rows="10" required="required"></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3 text-md-right"></label>
                                <div class="col-md-9 text-left">
                                    <button type="submit" class="btn btn-theme btn-block">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end col-6 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #contact -->

        <!-- begin #footer -->
        <div id="footer" class="footer footer--bg-white">
            <div class="container">
                <div class="footer-brand">
                    <!-- <div class="footer-brand-logo"></div> -->
                    <img src="/img/oobar-logo.jpg" alt="Oobar Logo" width="auto" height="40">
                    
                </div>
                <p>
                    &copy; Copyright 2017 Oobar
                </p>
                <p class="social-list">
                    <a href="https://www.facebook.com/Oobarlounge/" class="theme-color theme-color--hover-blk"><i class="fab fa-facebook-f fa-fw"></i></a>
                    <a href="https://www.instagram.com/oobarlounge/?hl=en" class="theme-color theme-color--hover-blk"><i class="fab fa-instagram fa-fw"></i></a>
                    <a href="https://twitter.com/oobarlounge" class="theme-color theme-color--hover-blk"><i class="fab fa-twitter fa-fw"></i></a>
                </p>
            </div>
        </div>
        <!-- end #footer -->
    </div>
    <!-- end #page-container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
		<script src="/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/assets/crossbrowserjs/respond.min.js"></script>
		<script src="/assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="/assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="/assets/plugins/scrollMonitor/scrollMonitor.js"></script>
    <script src="/assets/plugins/paroller/jquery.paroller.min.js"></script>
    <script src="/assets/js/one-page-parallax/apps.min.js"></script>
    <script src="/admin/admin_assets/plugins/masked-input/masked-input.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <script src="/js/app.js"></script>
    <script src="/include/js/carousel.min.js"></script>
    <!-- <script src="/include/js/lightslider.js"></script> -->
        <script>
            let eventsCarousel = new Carousel({
                carousel: '#events-carousel',
                slides: '.carousel__slide',
                nextSlideBtn: '.fa-angle-right',
                prevSlideBtn: '.fa-angle-left',
                carouselDots: '.carousel__dot',
                slideIndex: 1
            });
            eventsCarousel.assignEventListenerToDots();
        </script>

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
</body>

</html>