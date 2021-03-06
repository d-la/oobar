<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/validate-user.php';
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
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact Submissions</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Contact Submissions</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <div class="col-lg-8">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            List of visitors who've filled out our form
                            </h4>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table id="contacts" class="table">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Date Contacted</th>
                                    <th>Message</th>
                                </thead>
                                <?php 
                                $sqlQuery = 'SELECT * FROM contact_submissions;';
                                $rs = $mysqli->query($sqlQuery);
                                $contactSubmissionCount = 0;
                                if ($rs->num_rows > 0){
                                    while ($row = $rs->fetch_assoc()){

                                        ?>
                                        <tr>
                                            <td><?= htmlentities($row['first_name']) ?> <?= htmlentities($row['last_name']) ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= htmlentities($row['phone_number']) ?></td>
                                            <td><?= date('M d Y, h:i', strtotime($row['contact_date'])) ?></td>
                                            <td><?= htmlentities($row['message']) ?></td>
                                        </tr>

                                        <?php
                                        $contactSubmissionCount++;
                                    }   
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No contact submissions!</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div classs="col-lg-4">
                    <div class="widget-chart with-sidebar inverse-mode">
                        <div class="widget-chart-content bg-black">
                            <p>Total Submissions</p>
                        </div>
                        <div class="widget-chart-sidebar bg-black-darker">
                            <div class="chart-number">
                                <?= $contactSubmissionCount ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
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
            $('#contacts').DataTable();
        });
    </script>
</body>

</html>