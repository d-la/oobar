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
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/" data-click="scroll-to-target">HOME <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/#about" data-click="scroll-to-target">ABOUT <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/#events" data-click="scroll-to-target">EVENTS <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/gallery" data-click="scroll-to-target">GALLERY <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color<?= $activeNav; ?>" href="/contact" data-click="scroll-to-target">CONTACT <span>&nbsp;</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="home">
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="contact__title">Contact Us</h1>
                    </div>
                    <div class="col-md-6">
                        <h4>Oo Bar & Lounge</h4>
                        <p>
                            <!-- <strong>Oobar </strong><br /> -->
                            137-72 Northern Blvd<br />
                            Flushing, New York 11354<br />
                            8th Floor <br />
                            P: <a href="tel:7188863555">(718) 886-3555</a><br />
                        </p>
                        <p>
                        <strong>
                        Dress Code Strictly Enforced Thursday Through Sunday
                        </strong>
                        <br />
                        <br />
                        Dress to impress, No baggy jeans, athletic wear, timbs, hats, sneakers, t-shirts, or beanies.
                        <br />
                        <br />
                        <strong>
                        Suggested attire for men:
                        </strong>
                        <br />
                        Collar shirt are a must, business casual, dress shirts are not required.
                        <br />
                        <br />
                        <strong>
                        Suggested attire for women:
                        </strong>
                        <br />
                        Classy and sexy, heels and dresses are suggested.
                        <br />
                        <br />
                        Management reserves the right to refuse admission to guests that are not properly dressed.
                        </p>
                    </div>
                    <!-- end col-6 -->
                    <!-- begin col-6 -->
                    <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
                        <form id="contact-submission" action="controllers/contact-submission.php" method="POST" class="form-horizontal">
                            <div id="firstName" class="form-group row m-b-15">
                                <div class="col-md-9">
                                    <label for="privacy">By checking the checkbox, you agree to allowing us to use your information</label>
                                    <input type="checkbox" name="privacy" class="form-control" />
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
                                    <button type="submit" class="btn btn-gold btn-block">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end col-6 -->
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once 'footer.php'; ?>

    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.min.js"></script>
</body>

</html>