<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Events | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/css/default/style.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="/admin/admin_assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="/admin/admin_assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/admin/admin_assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/admin/admin_assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand"><img src="/img/oobar-logo.jpg" alt="Oobar Logo"></a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li>
                    <form class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list dropdown-menu-right">
                        <li class="dropdown-header">NOTIFICATIONS (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left">
                                    <i class="fa fa-bug media-object bg-silver-darker"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left">
                                    <img src="/admin/admin_assets/img/user/user-1.jpg" class="media-object" alt="" />
                                    <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">25 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left">
                                    <img src="/admin/admin_assets/img/user/user-2.jpg" class="media-object" alt="" />
                                    <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Olivia</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">35 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left">
                                    <i class="fa fa-plus media-object bg-silver-darker"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted f-s-11">1 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left">
                                    <i class="fa fa-envelope media-object bg-silver-darker"></i>
                                    <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted f-s-11">2 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/admin_assets/img/user/user-13.jpg" alt="" />
                        <span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                        <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span>
                            Inbox</a>
                        <a href="javascript:;" class="dropdown-item">Calendar</a>
                        <a href="javascript:;" class="dropdown-item">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:;" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;" data-toggle="nav-profile">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                <img src="/admin/admin_assets/img/user/user-13.jpg" alt="" />
                            </div>
                            <div class="info">
                                <b class="caret pull-right"></b>
                                Sean Ngu
                                <small>Front end developer</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                            <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li class="active">
                        <a href="dashboard.php">
                            <b class="caret"></b>
                            <i class="fa fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="contacts.php">
                            <i class="fab fa-simplybuilt"></i>
                            <span>Contact Submissions</span>
                        </a>
                    </li>
                    <li><a href="events.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->

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
            <h1 class="page-header">Events</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <div class="col-lg-8">
                    <div class="widget-chart with-sidebar inverse-mode">
                        <div class="widget-chart-content bg-black">
                            <h4 class="chart-title">
                                Upcoming Events
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
                                    $sqlQuery = 'CALL spSelectUpcomingEvents();';
                                    $rs = $mysqli->query($sqlQuery);
                                    $count = 0;
                                    if ($rs->num_rows > 0){
                                        while ($row = $rs->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td>' . htmlentities($row['event_name']) . '</td>';
                                            echo '<td>' . htmlentities($row['event_desc']) . '</td>';
                                            echo '<td>' . date('M d, Y', strtotime($row['event_date'])) . '</td>';
                                            echo '<td>' . date('h:i a', strtotime($row['start_time'])) . '</td>';
                                            echo '<td>' . date('h:i a', strtotime($row['end_time'])) . ' <a href="editevent.php?id=' . $row['id'] . '"> Edit</a></td>';
                                            echo '</tr>';
                                            $count++;
                                        }   

                                        $mysqli->next_result();
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                        <div class="widget-chart-sidebar bg-black-darker">
                            <div class="chart-number">
                                <?= $count ?>
                                <small>Total Upcoming Events</small>
                            </div>
                            <!-- <div id="visitors-donut-chart" class="nvd3-inverse-mode p-t-10" style="height: 180px"></div> -->
                            <!-- <ul class="chart-legend f-s-11">
                                <li><i class="fa fa-circle fa-fw text-primary f-s-9 m-r-5 t-minus-1"></i> 34.0% <span>New
                                        Visitors</span></li>
                                <li><i class="fa fa-circle fa-fw text-success f-s-9 m-r-5 t-minus-1"></i> 56.0% <span>Return
                                        Visitors</span></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- end col-8 -->
                <!-- begin col-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Add New Event
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form action="/controllers/add-event.php" method="post" id="add-event">
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Name</label>
									<div class="col-md-9">
										<input type="text" name="eventName" class="form-control m-b-5" placeholder="Enter event name" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Enter event Description</label>
									<div class="col-md-9">
										<textarea name="eventDesc" class="form-control m-b-5" placeholder="Event description"></textarea>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Event Date</label>
									<div class="col-md-9">
										<input type="text" name="eventDate" class="form-control" id="datepicker-default" placeholder="Select Date" value="12/1/2018" />
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Start Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="startTime" data-provide="timepicker" type="text" class="form-control" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
										</div>
									</div>
                                </div>
                                
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">End Time</label>
									<div class="col-md-9">
										<div class="input-group bootstrap-timepicker">
											<input name="endTime" data-provide="timepicker" type="text" class="form-control" />
											<span class="input-group-addon"><i class="fa fa-clock"></i></span>
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
                <!-- end col-4 -->
            </div>
            <!-- end row -->
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
                                    $sqlQuery = 'CALL spSelectAllEvents();';
                                    $rs = $mysqli->query($sqlQuery);
                                    $allEventCount = 0;
                                    if ($rs->num_rows > 0){
                                        while ($row = $rs->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td>' . htmlentities($row['event_name']) . '</td>';
                                            echo '<td>' . htmlentities($row['event_desc']) . '</td>';
                                            echo '<td>' . date('M d, Y', strtotime($row['event_date'])) . '</td>';
                                            echo '<td>' . date('h:i a', strtotime($row['start_time'])) . '</td>';
                                            echo '<td>' . date('h:i a', strtotime($row['end_time'])) . '</td>';
                                            echo '</tr>';
                                            $allEventCount++;
                                        }   
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
                            <!-- <div id="visitors-donut-chart" class="nvd3-inverse-mode p-t-10" style="height: 180px"></div> -->
                            <!-- <ul class="chart-legend f-s-11">
                                <li><i class="fa fa-circle fa-fw text-primary f-s-9 m-r-5 t-minus-1"></i> 34.0% <span>New
                                        Visitors</span></li>
                                <li><i class="fa fa-circle fa-fw text-success f-s-9 m-r-5 t-minus-1"></i> 56.0% <span>Return
                                        Visitors</span></li>
                            </ul> -->
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
    <script>
        $(document).ready(function () {
            App.init();
            DashboardV2.init();
            FormPlugins.init();
        });
    </script>
</body>

</html>