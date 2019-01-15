<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();

$eventId = $_GET['eventid'];
if (intval($eventId)){
    $sqlQuery = 'SELECT * FROM events WHERE id = ' . $eventId;
    $rs = $mysqli->query($sqlQuery);
    if ($rs->num_rows > 0){
        while ($row = $rs->fetch_assoc()){
            $eventName = $row['event_name'];
            $eventDesc = $row['event_desc'];
            $eventDate = date('M d, Y', strtotime($row['event_date']));
            $eventTime = date('h:i a', strtotime($row['start_time'])) . ' ' . date('h:i a', strtotime($row['end_time']));
            $bannerPath = $row['banner_path'];

            if (empty($bannerPath)){
                $bannerPath = '/img/banner.jpg';
            }
            $registrationUrl = $row['registration_url'];
        }
    }
}
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
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta property="og:title" content="<?= $eventName ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://oobarloungeny.com/eventdetails.php?eventid=<?= $eventId ?>" />
    <meta property="og:image" content="http://oobarloungeny.com<?= $bannerPath ?>" />

    <link rel="shortcut icon" type="image/png" href="img/the_one_favicon1.png"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="/css/custom-styles.min.css" id="custom-styles" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->
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

    <div class="row event-details-main">
        <div class="col-md-12">
            <section class="event-detail">
                <div class="event-detail__container">
                    <div class="event">
                        <div class="event__banner">
                            <img src="<?= $bannerPath; ?>" alt="banner image" class="event__image">
                        </div>
                        <h1 class="event__title">
                            <?= $eventName ?>
                        </h1>
                        <p class="event__date-time">
                            <?php echo $eventDate . ': ' . $eventTime; ?>
                        </p>
                        <p class="event__desc">
                            <?= $eventDesc ?>
                        </p>
                        <?php 
                        if (!empty($registrationUrl)){ ?>
                        <div class="event__cta">
                            <a href="<?= $registrationUrl ?>" class="btn btn-gold">Register here!</a>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>

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

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
</body>

</html>