<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/validate-user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AlertBanner.php';
$mysqli = initializeMysqlConnection();

$galleryImageId = -1;
if (isset($_SERVER['REQUEST_URI'])){

    $requestUriArray = explode('/', $_SERVER['REQUEST_URI']);

    $galleryImageId = filter_var($requestUriArray[3], FILTER_VALIDATE_INT);

    if ($galleryImageId !== false){
        $sqlQuery = "SELECT * FROM gallery_images WHERE id = $galleryImageId;";
        $rs = $mysqli->query($sqlQuery);
        $count = 0;
        if ($rs->num_rows > 0){
            while ($row = $rs->fetch_assoc()){
                $galleryImageName = htmlentities($row['name']);
                $galleryImageDesc = htmlentities($row['description']);
                $galleryImagePath = $row['path'];
            }   
        }
    } else {
        header('Location: /admin/dashboard');
        die();
    }
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title> Edit Gallery Image | Dashboard</title>
    
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
                <li class="breadcrumb-item"><a href="/admin/gallery">Gallery</a></li>
                <li class="breadcrumb-item active">Edit Gallery</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Edit Gallery Image</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <?php 
                    // Determine if the user entered an incorrect email/password combo
					if (isset($_SESSION['alert'])){

						if ($_SESSION['alert'] == 'error'){
                            if (isset($_SESSION['editGalleryIssue'])){
                                $errorMessage = '';
                                
                                switch ($_SESSION['editGalleryIssue']){
                                    case 'File name exists':
                                        $errorMessage = 'This file name already exists! Please rename the file and try again.';
                                        break;
                                    case 'Database Query':
                                        $errorMessage = 'Unable to edit image due to database error. Please contact database admin for more details.';
                                        break;
                                    default:
                                        $errorMessage = 'Unable to edit image!';
                                        break;
                                }
                            } else if (isset($_SESSION['galleryController'])){
                                $errorMessage = 'Unable to delete gallery image!';
                            }

							$alertBanner = new AlertBanner($_SESSION['alert'], $errorMessage);
                            echo $alertBanner->getAlertBannerHtml();
                            unset($_SESSION['editGalleryIssue']);
						} else if ($_SESSION['alert'] == 'success'){
                            $alertBanner = new AlertBanner($_SESSION['alert'], 'Edits to gallery image successful!');
							echo $alertBanner->getAlertBannerHtml();
                        }
						
                        unset($_SESSION['alert']);
					}
                    ?>
                <!-- begin col-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Edit/Delete gallery image
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form action="/controllers/update-gallery-image.php" method="post" id="add-event" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $galleryImageId ?>" name="galleryImageId">
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Image Name</label>
									<div class="col-md-9">
										<input type="text" name="galleryImageName" class="form-control m-b-5" value="<?= $galleryImageName; ?>" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Image Description</label>
									<div class="col-md-9">
										<textarea name="galleryImageDesc" class="form-control m-b-5"><?= $galleryImageDesc; ?></textarea>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">New Image</label>
									<div class="col-md-9">
										<div>
											<input name="newGalleryImage" type="file" class="form-control" accept="image/png, image/jpg, image/jpeg"/>
										</div>
									</div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Current Image:</label>
                                    <div class="col-md-9">
                                        <img class="rounded mx-auto d-block" src="<?= $galleryImagePath ?>" alt="Gallery Image to be edited" height="auto" width="auto" style="max-width: 100%;">
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
									<button type="submit" name="update" class="btn btn-default" style="margin-right: 1em">Update Gallery Image</button>
                                    <button type="submit" name="delete" class="btn btn-danger">Delete Gallery Image</button>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
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

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/views/admin/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/views/admin/admin_assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="/views/admin/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="/views/admin/admin_assets/plugins/bootstrap-daterangepicker/moment.js"></script>
	<script src="/views/admin/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/views/admin/admin_assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            App.init();

            let datePickerInput = $('#datepicker-default');

            $(datePickerInput).datepicker({
                format: 'mm/dd/yyyy'
            });

            $(datePickerInput).datepicker('update', $(datePickerInput).data('event-date'));
        });
    </script>
</body>

</html>