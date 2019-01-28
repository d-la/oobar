<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();

// $eventId = $_GET['eventid'];
// if (intval($eventId)){
//     $sqlQuery = 'SELECT * FROM events WHERE id = ' . $eventId;
//     $rs = $mysqli->query($sqlQuery);
//     if ($rs->num_rows > 0){
//         while ($row = $rs->fetch_assoc()){
//             $eventName = $row['event_name'];
//             $eventDesc = $row['event_desc'];
//             $eventDate = date('M d, Y', strtotime($row['event_date']));
//             $eventTime = date('h:i a', strtotime($row['start_time'])) . ' - ' . date('h:i a', strtotime($row['end_time']));
//             $bannerPath = $row['banner_path'];

//             if (empty($bannerPath)){
//                 $bannerPath = '/img/banner.jpg';
//             }
//             $registrationUrl = $row['registration_url'];
//         }
//     }
// }

$requestUri = explode('/', $_SERVER['REQUEST_URI']);

$eventId = $requestUri[2];
if (is_numeric($eventId)){
    $sqlQuery = 'SELECT * FROM events WHERE id = ' . $eventId;
    $rs = $mysqli->query($sqlQuery);
    if ($rs->num_rows > 0){
        while ($row = $rs->fetch_assoc()){
            $eventName = $row['event_name'];
            $eventDesc = $row['event_desc'];
            $eventDate = date('M d, Y', strtotime($row['event_date']));
            $eventTime = date('h:i a', strtotime($row['start_time'])) . ' - ' . date('h:i a', strtotime($row['end_time']));
            $bannerPath = $row['banner_path'];

            if (empty($bannerPath)){
                $bannerPath = '/img/banner.jpg';
            }
            $registrationUrl = $row['registration_url'];
        }
    }
} else {
    header('Location: /');
    die();
}

$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
    <title>Oo bar | Flushing Queens <?= $eventId; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta property="og:title" content="<?= $eventName ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://oobarloungeny.com/eventdetails/<?= $eventId ?>" />
    <meta property="og:image" content="http://oobarloungeny.com<?= $bannerPath ?>" />

    <link rel="shortcut icon" type="image/png" href="/img/the_one_favicon1.png"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="/css/custom-styles.min.css" id="custom-styles" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->
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

    <div class="row event-details-main">
        <div class="col-md-12">
            <section class="event-detail">
                <div class="event-detail__container">
                    <div class="event">
                        <div class="event__banner">
                            <img src="<?= $bannerPath; ?>" alt="banner image" class="event__image">
                        </div>
                        <div class="social">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $fullUrl; ?>" target="_blank">
                                <i class="fab fa-facebook-square facebook fa-2x"></i>
                            </a>
                            <a href="http://twitter.com/share?url=<?= $fullUrl; ?>">
                                <i class="fab fa-twitter twitter fa-2x"></i>
                            </a>
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

    <?php require_once 'footer.php'; ?>

    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>