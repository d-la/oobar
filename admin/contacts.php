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
    <title>Contacts | Dashboard</title>
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
                <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span></a>
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
                    <!-- <li class="has-sub">
                        <a href="javascript:;">
                            <span class="badge pull-right">10</span>
                            <i class="fa fa-hdd"></i>
                            <span>Email</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="email_inbox.html">Inbox</a></li>
                            <li><a href="email_compose.html">Compose</a></li>
                            <li><a href="email_detail.html">Detail</a></li>
                        </ul>
                    </li> -->
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
                <li class="breadcrumb-item active">Contact Submissions</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Contact Submissions</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <div class="col-lg-12">
                    <div class="widget-chart with-sidebar inverse-mode">
                        <div class="widget-chart-content bg-black">
                            <h4 class="chart-title">
                                Upcoming Events
                                <small>List of visitors who've filled out our form</small>
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Date Contacted</th>
                                        <th>Message</th>
                                    </thead>
                                    <?php 
                                    $sqlQuery = 'CALL spSelectAllContactSubmissions();';
                                    $rs = $mysqli->query($sqlQuery);
                                    $count = 0;
                                    if ($rs->num_rows > 0){
                                        while ($row = $rs->fetch_assoc()){
                                            echo '<tr>';
                                            echo '<td>' . htmlentities($row['first_name']) . ' ' . htmlentities($row['last_name']) . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . htmlentities($row['phone_number']) . '</td>';
                                            echo '<td>' . date('M d Y, h:i', strtotime($row['contact_date'])) . '</td>';
                                            echo '<td>' . htmlentities($row['message']) . '</td>';
                                            echo '</tr>';
                                            $count++;
                                        }   
                                    }
                                    
                                    
                                    ?>

                                </table>
                            </div>
                        </div>
                        <div class="widget-chart-sidebar bg-black-darker">
                            <div class="chart-number">
                                <?= $count ?>
                                <small>Total submissions</small>
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
                <!-- end col-12 -->
            </div>
            <!-- end row -->

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

    <script>
        $(document).ready(function () {
            App.init();
            DashboardV2.init();
        });
    </script>
</body>

</html>