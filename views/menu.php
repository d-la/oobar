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
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta property="og:title" content="Oobar and Lounge menu page" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://oobarloungeny.com/menu" />
    <meta property="og:image" content="http://oobarloungeny.com/img/oobar_logo_transparent_all_gold_1.png" />

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
                        <!-- <img src="/img/oobar_logo_small.jpg" alt="Oobar and lounge logo" height="120"> -->
                        <img src="/img/oobar_logo_transparent_all_gold_1.png" alt="Oobar and lounge logo" height="120">
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

    <!-- <div class="row event-details-main">
        <div class="col-md-12"> -->
        <main class="menu-page">
            <section class="menu">
                <div class="menu__header">
                    <img src="/img/oobar_logo_transparent_white_letters.png" alt="Oobar logo with transparent background and white letters" width="200px">
                </div>
                <div class="menu__container flex flex--row flex--no-wrap">
                    <div class="menu__packages">
                        <h2 class="menu__title">
                            Bottle Packages
                        </h2>
                        <ul class="packages">
                            <li class="packages__title">bronze package $300</li>
                            <li class="packages__item">1 Premium Bottle</li>
                            <li class="packages__item">1 House rose or champagne</li>
                            <li class="packages__item">1 assorted appetizer</li>
                        </ul>
                        <ul class="packages">
                            <li class="packages__title">gold package $500</li>
                            <li class="packages__item">2 Premium Bottle</li>
                            <li class="packages__item">1 House rose or champagne</li>
                            <li class="packages__item">1 assorted appetizer</li>
                        </ul>
                        <ul class="packages">
                            <li class="packages__title">platinum package $1000</li>
                            <li class="packages__item">4 Premium Bottle</li>
                            <li class="packages__item">2 House rose or champagne</li>
                            <li class="packages__item">2 assorted appetizer</li>
                        </ul>
                        <ul class="packages">
                            <li class="packages__title">diamond package $1400</li>
                            <li class="packages__item">6 Premium Bottle</li>
                            <li class="packages__item">3 House rose or champagne</li>
                            <li class="packages__item">2 assorted appetizer</li>
                        </ul>
                        <ul class="packages">
                            <li class="packages__title">champagne shower $1500</li>
                            <li class="packages__item">4 bottles of moet rose</li>
                            <li class="packages__item">2 bottles of moet imperial</li>
                            <li class="packages__item">2 bottles of veuve clicquot</li>
                        </ul>
                    </div>
                    <div class="menu__bottles">
                        <h2 class="menu__title">
                            Bottle Menu
                        </h2>

                        <ul class="bottles">
                            <li class="bottles__title">Vodka</li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">Smirnoff</span> 
                                <span class="bottles__price">$175</span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">tito's</span> 
                                <span class="bottles__price">$200</span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">ketel one family made vodka</span> 
                                <span class="bottles__price">$240</span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">ciroc (any flavor)</span> 
                                <span class="bottles__price">$240</span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">belvedere</span> 
                                <span class="bottles__price">$240</span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">grey goose</span> 
                                <span class="bottles__price">$275</span>
                            </li>
                        </ul>

                        <ul class="bottles">
                            <li class="bottles__title">Scotches & Whiskey</li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                Buchanan's deluxe
                                </span>
                                <span class="bottles__price">
                                $240
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                    jack daniel's (1l)
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                    jameson
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                    chivas regal
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                johnny walker black label
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                johnny walker blue label
                                </span>
                                <span class="bottles__price">
                                $600
                                </span>
                            </li>
                        </ul>

                        <ul class="bottles">
                            <li class="bottles__title">Cognac</li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                    hennessy vs
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                    hennessy vsop
                                </span>
                                <span class="bottles__price">
                                $300
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                hennessy xo
                                </span>
                                <span class="bottles__price">
                                $600
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                remy martin vs
                                </span>
                                <span class="bottles__price">
                                $275
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                remy martin 1738
                                </span>
                                <span class="bottles__price">
                                $325
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                dusse
                                </span>
                                <span class="bottles__price">
                                $300
                                </span>
                            </li>
                        </ul>

                        <ul class="bottles">
                            <li class="bottles__title">tequila</li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                don julio blanco
                                </span>
                                <span class="bottles__price">
                                $250
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                don julio 1942
                                </span>
                                <span class="bottles__price">
                                $600
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                patron silver
                                </span>
                                <span class="bottles__price">
                                $275
                                </span>
                            </li>
                        </ul>

                        <ul class="bottles">
                            <li class="bottles__title">champagne & wine</li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                moet rose imperial
                                </span>
                                <span class="bottles__price">
                                $200
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                moet rose nechtar
                                </span>
                                <span class="bottles__price">
                                $275
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                veuve clicquot
                                </span>
                                <span class="bottles__price">
                                $225
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                dom perignon
                                </span>
                                <span class="bottles__price">
                                $600
                                </span>
                            </li>
                            <li class="bottles__item clearfix">
                                <span class="bottles__name">
                                ace of spades
                                </span>
                                <span class="bottles__price">
                                $900
                                </span>
                            </li>
                        </ul>
                    </div>
                </div><!-- end .menu__container -->
                <div class="menu__footer">
                    <p class="menu__footer-title">
                        packages include
                    </p>
                    <p class="menu__footer-desc">
                        Your choice of any premium bottle valued up to $250
                        <br />
                        Taxes are included
                        <br />
                        A $25 gratuity charge will be added to each bottle purchased
                    </p>
                </div>

            </section>
        </main>
        <!-- </div>
    </div> -->

    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>