<?php 
$requestUri = $_SERVER['REQUEST_URI'];

$requestedPath = explode('/', $requestUri);
$classActive = '<li class="active">';
$notActive = '<li>';
if (!empty($requestedPath[2])){
    if (strpos($requestedPath[2], '.php') !== false){
        $positionOfDotPhp = strpos($requestedPath[2], '.php');

        $currentPage = ucwords(substr($requestedPath[2], 0, $positionOfDotPhp));
    }
}

?>

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
                        Oobar Admin
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <?php 
            if ($currentPage == 'Dashboard'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="dashboard.php">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php 
            if ($currentPage == 'Contacts'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="contacts.php">
                    <i class="fab fa-simplybuilt"></i>
                    <span>Contact Submissions</span>
                </a>
            </li>
            <?php 
            if ($currentPage == 'Events'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="events.php">
                    <i class="fa fa-calendar"></i> 
                    <span>Events</span>
                </a>
            </li>
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