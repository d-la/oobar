<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
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
    <title>Events | Dashboard</title>
    
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
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Events</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <?php 
                    $successMessage = '';
                    $errorMessage = '';
                    if (isset($_SESSION['action'])){
                        if ($_SESSION['action'] == 'delete'){
                            $successMessage = 'Event deleted successfully!';
                            $errorMessage = 'Unable to delete event successfully!';
                        }

                        unset($_SESSION['action']);
                    }

                    // Determine if the user entered an incorrect email/password combo
					if (isset($_SESSION['alert'])){

						if ($_SESSION['alert'] == 'error'){
							$alertBanner = new AlertBanner($_SESSION['alert'], $errorMessage);
							echo $alertBanner->getAlertBannerHtml();
						} else if ($_SESSION['alert'] == 'success'){
                            $successMessage = 'Event added successfully!';
                            $alertBanner = new AlertBanner($_SESSION['alert'], $successMessage);
							echo $alertBanner->getAlertBannerHtml();
                        }
						
						unset($_SESSION['alert']);
					}
                ?>
                <div class="col-lg-7">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                All Events
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="upcoming-events" class="table">
                                    <thead>
                                        <th>Event Name</th>
                                        <th>Event Description</th>
                                        <th>Event Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Edit</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sqlQuery = 'SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC';
                                        $rs = $mysqli->query($sqlQuery);
                                        $upcomingEventCount = 0;
                                        if ($rs->num_rows > 0){
                                            while ($row = $rs->fetch_assoc()){
                                                ?>  
                                                <tr>
                                                    <td><?= htmlentities($row['event_name']) ?></td>
                                                    <td><?= htmlentities($row['event_desc']) ?></td>
                                                    <td><?= date('M d, Y', strtotime($row['event_date'])) ?></td>
                                                    <td><?= date('h:i a', strtotime($row['start_time'])) ?></td>
                                                    <td><?= date('h:i a', strtotime($row['end_time'])) ?></td>
                                                    <td><a href="editevent.php?id=<?= $row['id'] ?>" class="edit-button"><i class="fa fa-cogs"></i></a></td>
                                                </tr>

                                                <?php
                                                $upcomingEventCount++;
                                            }   

                                            $mysqli->next_result();

                                            ?>
                                        <?php
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6">No upcoming events!</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive --> 
                        </div> <!-- end .panel-body -->
                    </div> <!-- end .panel -->
                </div> <!-- end .col-lg-8 -->

                <!-- begin .col-lg-4 -->
                <div class="col-lg-5">
                    <?php 
                    if (isset($_SESSION['alert'])){

						if ($_SESSION['alert'] == 'file error'){
							$alertBanner = new AlertBanner('error', 'File already exists!');
							echo $alertBanner->getAlertBannerHtml();
						}
						
						unset($_SESSION['alert']);
					}
                    ?>
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Add New Event
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form action="/controllers/add-event.php" method="post" id="add-event" enctype="multipart/form-data">
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Name</label>
									<div class="col-md-9">
										<input type="text" name="eventName" class="form-control m-b-5" placeholder="Enter event name" required="required" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Enter event Description</label>
									<div class="col-md-9">
										<textarea name="eventDesc" class="form-control m-b-5" placeholder="Event description" required="required"></textarea>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Date</label>
									<div class="col-md-9">
										<input type="text" name="eventDate" class="form-control" id="datepicker-default" placeholder="Select Date" required="required" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Start Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="startTime" data-provide="timepicker" type="text" class="form-control" required="required" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
										</div>
									</div>
                                </div>
                                
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">End Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="endTime" data-provide="timepicker" type="text" class="form-control" required="required" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
										</div>
									</div>
                                </div>

                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Banner Image</label>
									<div class="col-md-9">
										<div class="">
											<input name="bannerImage" type="file" class="form-control" accept="image/png, image/jpeg, image/jpg" />
										</div>
									</div>
                                </div>

                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Registration Link</label>
									<div class="col-md-9">
										<div class="">
											<input name="registrationLink" type="text" class="form-control" />
										</div>
									</div>
                                </div>


                                <div class="form-group row m-b-15">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
                            </form>
                        </div> <!-- end .panel-body -->
                    </div> <!-- end .panel -->
                </div> <!-- end .col-lg-4 -->
            </div> <!-- end .row -->

            <div class="row">
                <!-- begin col-8 -->
                <div class="col-lg-8">
                    <div class="widget-chart with-sidebar inverse-mode">
                        <div class="widget-chart-content bg-black">
                            <h4 class="chart-title">
                                All Events
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Event Name</th>
                                        <th>Event Description</th>
                                        <th>Event Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </thead>
                                    <?php 
                                    $sqlQuery = 'SELECT * FROM events;';
                                    $rs = $mysqli->query($sqlQuery);
                                    $allEventCount = 0;
                                    if ($rs->num_rows > 0){
                                        while ($row = $rs->fetch_assoc()){
                                            ?>

                                            <tr>
                                                <td><?= htmlentities($row['event_name']) ?></td>
                                                <td><?= htmlentities($row['event_desc']) ?></td>
                                                <td><?= date('M d, Y', strtotime($row['event_date'])) ?></td>
                                                <td><?= date('h:i a', strtotime($row['start_time'])) ?></td>
                                                <td><?= date('h:i a', strtotime($row['end_time'])) ?></td>
                                            </tr>
                                            <?php
                                            $allEventCount++;
                                        }   
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5">No events found</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                        <div class="widget-chart-sidebar bg-black-darker">
                            <div class="chart-number">
                                <?= $allEventCount ?>
                                <small>Total Events</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-8 -->
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
	<script src="/admin/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/admin/admin_assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-daterangepicker/moment.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/admin/admin_assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            App.init();
            
            $('#datepicker-default').datepicker({
                format: 'mm/dd/yyyy'
            });

            $('#upcoming-events').DataTable();
        });
    </script>
</body>

</html>