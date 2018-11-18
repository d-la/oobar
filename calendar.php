<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Oo bar | Flushing Queens</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="/assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/style.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/css/one-page-parallax/theme/default.css" id="theme" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="/admin/admin_assets/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print' />
	<link href="/admin/admin_assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- Custom CSS -->
    <link href="/css/custom-styles.min.css" id="custom-styles" rel="stylesheet" />

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body data-spy="scroll" data-target="#header" data-offset="51">
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">
                        <!-- <span class="brand-logo"></span> -->
                        <span class="brand-text">
                            <!-- <span class="text-theme">Color</span> Admin -->
                            <img src="/img/oobar-logo.jpg" alt="Oobar Logo">
                        </span>
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link active" href="#home" data-click="scroll-to-target" data-scroll-target="#home"
                                data-toggle="dropdown">HOME <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-left animated fadeInDown">
                                <a class="dropdown-item" href="index.html">Page with Transparent Header</a>
                                <a class="dropdown-item" href="index_inverse_header.html">Page with Inverse Header</a>
                                <a class="dropdown-item" href="index_default_header.html">Page with White Header</a>
                                <a class="dropdown-item" href="extra_element.html">Extra Element</a>
                            </div>
                        </li> -->
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#about" data-click="scroll-to-target">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#events" data-click="scroll-to-target">EVENTS</a></li>
                        <li class="nav-item"><a class="nav-link hover-theme-color" href="#contact" data-click="scroll-to-target">CONTACT</a></li>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->

        <!-- begin #home -->
        <div id="home" class="content has-bg home">
            <!-- begin content-bg -->
            <div id="main-content" class="content-bg" style="background-image: url(/img/oobar-view.jpg);" data-paroller="true"
                data-paroller-factor="0.5" data-paroller-factor-xs="0.25">
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
            <div class="container home-content">
                
            </div>
            <!-- end container -->
        </div>
        <!-- end #home -->

        <!-- begin #about -->
        <div id="about" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">Calendar</h2>
                <div id="calendar" class="vertical-box-column calendar"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end #about -->

        <!-- begin #footer -->
        <div id="footer" class="footer footer--bg-white">
            <div class="container">
                <div class="footer-brand">
                    <!-- <div class="footer-brand-logo"></div> -->
                    <img src="/img/oobar-logo.jpg" alt="Oobar Logo" width="auto" height="40">
                    
                </div>
                <p>
                    &copy; Copyright 2017 Oobar
                </p>
                <p class="social-list">
                    <a href="https://www.facebook.com/Oobarlounge/" class="theme-color theme-color--hover-blk"><i class="fab fa-facebook-f fa-fw"></i></a>
                    <a href="https://www.instagram.com/oobarlounge/?hl=en" class="theme-color theme-color--hover-blk"><i class="fab fa-instagram fa-fw"></i></a>
                    <a href="https://twitter.com/oobarlounge" class="theme-color theme-color--hover-blk"><i class="fab fa-twitter fa-fw"></i></a>
                </p>
            </div>
        </div>
        <!-- end #footer -->
    </div>
    <!-- end #page-container -->

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
	<script src="/admin/admin_assets/plugins/fullcalendar/lib/moment.min.js"></script>
	<script src="/admin/admin_assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- <script src="/admin/admin_assets/js/demo/calendar.demo.min.js"></script> -->
    <script>
        var handleCalendarDemo = function() {
            $('#external-events .fc-event').each(function() {
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true, // maintain when user navigates (see docs on the renderEvent method)
                    color: ($(this).attr('data-color')) ? $(this).attr('data-color') : ''
                });
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
            
            var date = new Date();
            var currentYear = date.getFullYear();
            var currentMonth = date.getMonth() + 1;
                    currentMonth = (currentMonth < 10) ? '0' + currentMonth : currentMonth;
            
            $('#calendar').fullCalendar({
                header: {
                    left: 'month,agendaWeek,agendaDay',
                    center: 'title',
                    right: 'prev,today,next '
                },
                droppable: false, // this allows things to be dropped onto the calendar
                drop: function() {
                    $(this).remove();
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    // Handles the event when a user clicks on a day
                    var title = prompt('Event Title:');
                    var eventData;
                    if (title) {
                        eventData = {
                            title: title,
                            start: start,
                            end: end
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    $('#calendar').fullCalendar('unselect');
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                    title: 'All Day Event',
                    start: currentYear + '-'+ currentMonth +'-01',
                    color: COLOR_GREEN
                }, {
                    title: 'Long Event',
                    start: currentYear + '-'+ currentMonth +'-07',
                    end: currentYear + '-'+ currentMonth +'-10'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: currentYear + '-'+ currentMonth +'-09T16:00:00',
                    color: COLOR_GREEN
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: currentYear + '-'+ currentMonth +'-16T16:00:00'
                }, {
                    title: 'Conference',
                    start: currentYear + '-'+ currentMonth +'-11',
                    end: currentYear + '-'+ currentMonth +'-13'
                }, {
                    title: 'Meeting',
                    start: currentYear + '-'+ currentMonth +'-12T10:30:00',
                    end: currentYear + '-'+ currentMonth +'-12T12:30:00',
                    color: COLOR_GREEN
                }, {
                    title: 'Lunch',
                    start: currentYear + '-'+ currentMonth +'-12T12:00:00',
                    color: COLOR_BLUE
                }, {
                    title: 'Meeting',
                    start: currentYear + '-'+ currentMonth +'-12T14:30:00'
                }, {
                    title: 'Happy Hour',
                    start: currentYear + '-'+ currentMonth +'-12T17:30:00'
                }, {
                    title: 'Dinner',
                    start: currentYear + '-'+ currentMonth +'-12T20:00:00'
                }, {
                    title: 'Birthday Party',
                    start: currentYear + '-'+ currentMonth +'-13T07:00:00'
                }, {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: currentYear + '-'+ currentMonth +'-28',
                    color: COLOR_RED
                }]
            });
        };

        var Calendar = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleCalendarDemo();
                }
            };
        }();
    </script>
    <script>
        $(document).ready(function () {
            App.init();
            Calendar.init();
        });
    </script>
</body>

</html>