<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();

$eventId = $_GET['eventid'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Oo bar | Flushing Queens</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
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
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index.php#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index.php#events">EVENTS</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="index.php#contact">CONTACT</a></li>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->    

        <?php 
        
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

        <div class="row">
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
    <!-- ================== END BASE JS ================== -->

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
</body>

</html>