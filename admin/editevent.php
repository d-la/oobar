<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/validate-user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AlertBanner.php';
$mysqli = initializeMysqlConnection();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title> Edit Events | Dashboard</title>
    
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
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Edit Event</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-lg-12">
                    <?php 
                    $successMessage = '';
                    $errorMessage = '';
                    if (isset($_SESSION['action'])){
                        if ($_SESSION['action'] == 'update'){
                            $successMessage = 'Event updated successfully!';
                            $errorMessage = 'Unable to update event successfully!';
                        }

                        unset($_SESSION['action']);
                    }

                    // Determine if the user entered an incorrect email/password combo
					if (isset($_SESSION['alert'])){

						if ($_SESSION['alert'] == 'error'){
							$alertBanner = new AlertBanner($_SESSION['alert'], $errorMessage);
							echo $alertBanner->getAlertBannerHtml();
						} else if ($_SESSION['alert'] == 'success'){
                            $alertBanner = new AlertBanner($_SESSION['alert'], $successMessage);
							echo $alertBanner->getAlertBannerHtml();
                        }
						
						unset($_SESSION['alert']);
					}
                    ?>
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Edit/Update the event
                            </h4>
                        </div>
                        <div class="panel-body">
                            <?php 
                            $eventId = -1;
                            if (isset($_GET['id'])){
                                $eventId = filter_var($_GET['id'], FILTER_VALIDATE_INT);
                            }
                            $sqlQuery = "SELECT * FROM events WHERE id = $eventId;";
                            $rs = $mysqli->query($sqlQuery);
                            $count = 0;
                            if ($rs->num_rows > 0){
                                while ($row = $rs->fetch_assoc()){
                                    $eventName = htmlentities($row['event_name']);
                                    $eventDesc = htmlentities($row['event_desc']);
                                    $eventDate = date('m/d/y', strtotime($row['event_date']));
                                    $startTime = date('h:i A', strtotime($row['start_time']));
                                    $endTime = date('h:i A', strtotime($row['end_time']));
                                }   
                            }
                            ?>
                            <form action="/controllers/update-event.php" method="post" id="add-event">
                                <input type="hidden" value="<?= $eventId ?>" name="eventId">
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Name</label>
									<div class="col-md-9">
										<input type="text" name="eventName" class="form-control m-b-5" value="<?= $eventName; ?>" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Description</label>
									<div class="col-md-9">
										<textarea name="eventDesc" class="form-control m-b-5"><?= $eventDesc; ?></textarea>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Date</label>
									<div class="col-md-9">
										<input type="text" name="eventDate" class="form-control" id="datepicker-default" value="<?= $eventDate; ?>" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Start Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="startTime" data-provide="timepicker" type="text" class="form-control" value="<?= $startTime; ?>" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
										</div>
									</div>
                                </div>
                                
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">End Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="endTime" data-provide="timepicker" type="text" class="form-control" value="<?= $endTime; ?>" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
										</div>
									</div>
                                </div>

                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Banner Image</label>
									<div class="col-md-9">
										<div>
											<input name="bannerImage" type="file" class="form-control" accept="image/png, image/jpg, image/jpeg"/>
										</div>
									</div>
                                </div>

                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Registration Link</label>
									<div class="col-md-9">
										<div>
											<input name="registrationLink" type="text" class="form-control" />
										</div>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<button type="submit" name="update" class="btn btn-default" style="margin-right: 1em">Update</button>
                                    <button type="submit" name="delete" class="btn btn-danger">Delete Event</button>
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
    <script src="/admin/admin_assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/admin/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/admin/admin_assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
		<script src="/admin/admin_assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/admin/admin_assets/crossbrowserjs/respond.min.js"></script>
		<script src="/admin/admin_assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="/admin/admin_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/admin/admin_assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="/admin/admin_assets/js/theme/default.min.js"></script>
    <script src="/admin/admin_assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/admin/admin_assets/plugins/d3/d3.min.js"></script>
    <script src="/admin/admin_assets/plugins/nvd3/build/nv.d3.js"></script>
    <script src="/admin/admin_assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/admin/admin_assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>
    <script src="/admin/admin_assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
    <script src="/admin/admin_assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="/admin/admin_assets/js/demo/dashboard-v2.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/admin/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/admin/admin_assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="/admin/admin_assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="/admin/admin_assets/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
	<script src="/admin/admin_assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-daterangepicker/moment.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/admin/admin_assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
	<script src="/admin/admin_assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script src="/admin/admin_assets/plugins/clipboard/clipboard.min.js"></script>
	<script src="/admin/admin_assets/js/demo/form-plugins.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            App.init();
            DashboardV2.init();
            FormPlugins.init();
        });
    </script>
</body>

</html>