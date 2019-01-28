<?php 
$requestUri = $_SERVER['REQUEST_URI'];

$requestedPath = explode('/', $requestUri);
$classActive = '<li class="active">';
$notActive = '<li>';
if (!empty($requestedPath[2])){
    $currentPage = $requestedPath[2];
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
                        <img src="/views/admin/admin_assets/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        Welcome <?= $_SESSION['firstName']; ?>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href=""><i class="fa fa-cog"></i> Settings</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <?php 
            if ($currentPage == 'dashboard'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="/admin/dashboard">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php 
            if ($currentPage == 'contacts'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="/admin/contacts">
                    <i class="fa fa-list-ol"></i>
                    <span>Contact Submissions</span>
                </a>
            </li>
            <?php 
            if ($currentPage == 'events'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="/admin/events">
                    <i class="fa fa-calendar"></i> 
                    <span>Events</span>
                </a>
            </li>
            <?php 
            if ($currentPage == 'gallery'){
                echo $classActive;
            } else {
                echo $notActive;
            }
            ?>
                <a href="/admin/gallery">
                    <i class="fa fa-image"></i> 
                    <span>Gallery</span>
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