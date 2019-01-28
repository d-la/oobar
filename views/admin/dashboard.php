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
    <title>Dashboard</title>
    
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
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Dashboard</h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <div class="col-lg-6">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Contact Form Submissions
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
                                    <tbody>
                                        <?php 
                                        $sqlQuery = 'SELECT * FROM contact_submissions ORDER BY contact_date DESC;';
                                        $rs = $mysqli->query($sqlQuery);

                                        if ($rs->num_rows > 0){
                                            while ($row = $rs->fetch_assoc()){
                                                ?>

                                                <tr>
                                                    <td><?= htmlentities($row['first_name']); ?> <?= htmlentities($row['last_name']); ?></td>
                                                    <td><?= $row['email'] ;?></td>
                                                    <td><?= htmlentities($row['phone_number']); ?></td>
                                                    <td><?= date('M d Y, h:i', strtotime($row['contact_date'])); ?></td>
                                                    <td><?= htmlentities($row['message']); ?></td>
                                                </tr>

                                                <?php
                                            }
                                                
                                                $mysqli->next_result();
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="5">No contact submissions to display!</td>
                                            </tr>
                                            <?php
                                        }
                                        
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Upcoming Events
                            </h4>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Event Name</th>
                                    <th>Event Description</th>
                                    <th>Event Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Edit</th>
                                </thead>
                                <?php
                                // This should be moved into a stored procedure 
                                $sqlQuery = 'SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC;';
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
                                            <td><a href="/admin/editevent/<?= $row['id'] ?>" class="edit-button"><i class="fa fa-cogs"></i></a></td>
                                        </tr>

                                        <?php
                                        $upcomingEventCount++;
                                    }   
                                    $mysqli->next_result();
                                    ?>
                                    <tr>
                                        <td colspan="6">Number of upcoming events: <?= $upcomingEventCount; ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No upcoming events!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->

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