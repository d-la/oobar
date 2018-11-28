<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
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