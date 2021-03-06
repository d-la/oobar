<?php 
// require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Gallery.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/validate-user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AlertBanner.php';
$mysqli = initializeMysqlConnection();

// $now = new DateTime(null, new DateTimeZone('America/New_York'));
date_default_timezone_set('America/New_York'); 
$todaysDate = date('m/d/y');
// var_dump($now);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Gallery | Dashboard</title>
    
    <?php require_once 'include/header-assets.php'; ?>
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <?php require_once 'include/navigation.php' ?> 
        
        <?php require_once 'include/sidebar.php'; ?>

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Gallery</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <?php 
                    // Check if the alert session variable is assigned so we can show the proper UI based on the controller's actions
					if (isset($_SESSION['alert'])){

						if ($_SESSION['alert'] == 'error'){
                            $errorMessage = 'Unable to upload gallery image!';
                            // $errorMessage = '';

                            // if ($_SESSION['img_name'] == true){
                            //     $errorMessage = 'Image already exists, please upload with a new name!';
                            // } else {
                            //     $errorMessage = 'Unable to upload gallery image!';
                            // }
							$alertBanner = new AlertBanner($_SESSION['alert'], $errorMessage);
							echo $alertBanner->getAlertBannerHtml();
						} else if ($_SESSION['alert'] == 'success'){

                            if ($_SESSION['galleryController'] == 'delete'){
                                $successMessage = 'Gallery image deleted successfully!';
                            } else {
                                $successMessage = 'Gallery image uploaded successfully!';
                            }
                            $alertBanner = new AlertBanner($_SESSION['alert'], $successMessage);
							echo $alertBanner->getAlertBannerHtml();
                        } else if ($_SESSION['alert'] == 'warning'){\
                            error_log('We in the code block that handles existing images on the UI');
                            $warningMessage = 'The following uploaded files already exist on our server. Please rename them and try uploading again! ';
                            foreach ($_SESSION['existingGalleryImageFiles'] as $key => $value){
                                $warningMessage .= $value . ', ';
                            }
                            $warningMessage = substr($warningMessage, 0, strlen($warningMessage) - 2);

                            $alertBanner = new AlertBanner($_SESSION['alert'], $warningMessage);
                            echo $alertBanner->getAlertBannerHtml();
                            
                            unset($_SESSION['existingGalleryImageFiles']);
                        }
						
						unset($_SESSION['alert']);
					}
                    ?>
                <!-- begin col-8 -->
                <div class="col-lg-8">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    Add Gallery Image
                                </h4>
                        </div>
                        <div class="panel-body">
                            <form action="/controllers/add-gallery-image.php" method="post" id="add-event" enctype="multipart/form-data">
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Image Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="imageName" class="form-control m-b-5" placeholder="Enter event name" required="required" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Image Description</label>
                                    <div class="col-md-9">
                                        <input type="text" name="imageDesc" class="form-control m-b-5" placeholder="Event description" required="required">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Banner Image</label>
                                    <div class="col-md-9">
                                        <div class="">
                                            <input name="galleryImage[]" type="file" class="form-control" accept="image/png, image/jpeg, image/jpg" multiple="multiple" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col-8 -->
                <!-- begin col-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    Gallery Images
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="gallery" class="table table-hover">
                                        <thead>
                                            <th>Image Name</th>
                                            <th>Image Desc</th>
                                            <th>Edit</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $gallery = new Gallery();
                                            
                                            $allGalleryImages = $gallery->selectAllGalleryImages();
                                            foreach ($allGalleryImages as $image){
                                                echo '<tr>';
                                                echo '<td>' . $image['name'] . '</td>';
                                                echo '<td>' . $image['description'] . '</td>';
                                                echo '<td><a href="/admin/editgallery/' . $image['id'] . '" data-gallery-id="' . $image['id'] . '" data-click="edit"><i class="fa fa-cogs"></i></a>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
                class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/views/admin/admin_assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/views/admin/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/views/admin/admin_assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
		<script src="/views/admin/admin_assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/views/admin/admin_assets/crossbrowserjs/respond.min.js"></script>
		<script src="/views/admin/admin_assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="/views/admin/admin_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/views/admin/admin_assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="/views/admin/admin_assets/js/theme/default.min.js"></script>
    <script src="/views/admin/admin_assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            App.init();
            $('#gallery').DataTable();
        });
    </script>
</body>

</html>