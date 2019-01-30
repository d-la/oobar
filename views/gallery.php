<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Gallery.php';

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
                        <li class="nav-item"><a class="nav-link hover-theme-color<?= $activeNav; ?>" href="/gallery" data-click="scroll-to-target">GALLERY <span>&nbsp;</span></a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="/contact" data-click="scroll-to-target">CONTACT <span>&nbsp;</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="home">
        <section class="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="gallery__title">Gallery</h1>
                    </div>
                    
                        <?php
                        $gallery = new Gallery();
                        $allImages = $gallery->selectAllGalleryImages();
                        $totalImageCount = count($allImages);

                        if ($totalImageCount == 0){
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
                            foreach ($allImages as $image){
                                ?>
                                <!-- begin col-3 -->
                                <div class="col-md-3 col-sm-6">
                                    <!-- begin work -->
                                    <div class="work"> 
                                        <div class="image">
                                            <!-- <a href="<?= $image['path'] ?>" target="_blank"> -->
                                            <img class="lazy" src="/img/blurred_image.jpg" data-src="<?= $image['path'] ?>" alt="<?= $image['name'] ?>" data-click="show-gallery-image" data-position="<?= $count; ?>" />
                                            <!-- </a> -->
                                        </div>
                                        <div class="desc">
                                            <span class="desc-title"><?= $image['name']; ?></span>
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
                            ?>
                        </div>
                        <?php 
                        }
                        ?>
                </div>
            </div>
        </section>
    </main>
    
    <div class="open-image">
        <div class="open-image__container">
            <div class="open-image__close-container">
                <span class="open-image__close-button">&times;</span>
            </div>

            <div class="button-left">
                <i class="fas fa-angle-left"></i>
            </div> 

            <img src="" alt="">

            <div class="button-right">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="/js/handle-gallery-modal.js"></script>
    <script src="/include/js/yall/yall-2.2.1.min.js"></script>
    <script>
        // If theres more than 1 gallery image, initialize the modal 
        if ($('img[data-click="show-gallery-image"]').length > 1){
            let galleryImagesHandler = new galleryImageModal();
        }

        // Initiate lazy loading using yall
        document.addEventListener("DOMContentLoaded", yall);
    </script>
</body>

</html>