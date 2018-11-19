<?php // require_once '/include/sessionstart.php'; ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Oo bar | Login Page</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/admin/admin_assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(/admin/admin_assets/img/login-bg/login-bg-11.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>Color</b> Admin App</h4>
					<p>
						Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
				<!-- begin login-header -->
				<div class="login-header">
					<div class="brand">
                        <strong>Oo bar & Lounge</strong> Admin
					</div>
					<div class="icon">
						<i class="fa fa-sign-in"></i>
					</div>
				</div>
				<!-- end login-header -->
				<!-- begin login-content -->
				<div class="login-content">
					<form action="/controllers/loginprocess.php" method="POST" class="margin-bottom-0">
						<div class="form-group m-b-15">
							<input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" required />
						</div>
						<div class="form-group m-b-15">
							<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
						</div>
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="remember_me_checkbox" value="0" />
							<label for="remember_me_checkbox">
							Remember Me
							</label>
						</div>
						<div class="login-buttons">
							<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
						</div>
						<div class="m-t-20 m-b-40 p-b-40 text-inverse">

						</div>
						<hr />
						<p class="text-center text-grey-darker">
							Oobar and Lounge &copy; 2018 
						</p>
					</form>
				</div>
				<!-- end login-content -->
			</div>
			<!-- end right-container -->
		</div>
		<!-- end login -->
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

    <script>
        let usersEmail = '';
        let checkBox = $('#remember_me_checkbox');
        let emailInput =$('input[type="email"]');

        $(checkBox).on('click', function(){
            if ($(checkBox).prop('checked') == true){
                if ($(emailInput).val() !== ''){
                    let email = $(emailInput).val();

                    localStorage.setItem('email', email);
                    } else {
                    $(emailInput).on('focusout', function(){
                        if ($(this).val() != ''){
                            localStorage.setItem('email', $(emailInput).val());
                        }
                    });
                }
            }
        });

        $(document).ready(function(){
            // Loads the remembered email into the input
            if (localStorage.getItem('email') !== null){
                $('input[type="email"').val(localStorage.getItem('email'));
            }
        });
    </script>


	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
