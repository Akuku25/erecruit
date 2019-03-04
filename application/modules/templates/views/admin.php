<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>E-Recruitment</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url(); ?>adminfiles/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>adminfiles/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>adminfiles/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url(); ?>adminfiles/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="<?php echo base_url(); ?>adminfiles/css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="<?php echo base_url(); ?>adminfiles/css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>adminfiles/<?php echo base_url(); ?>adminfiles/img/favicon.ico">
	<!-- end: Favicon -->
	
</head>

<body>
<!-- start: Header -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="index.html"><span>SHOP</span></a>

			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="halflings-icon white user"></i> Dennis Ji
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-title">
								<span>Account Settings</span>
							</li>
							<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
							<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
						</ul>
					</li>
					<!-- end: User Dropdown -->
				</ul>
			</div>
			<!-- end: Header Menu -->

		</div>
	</div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
	<div class="row-fluid">

		<!-- start: Main Menu -->
		<div id="sidebar-left" class="span2">
			<div class="nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
					<li><a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
					<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
					<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
				</ul>
			</div>
		</div>
		<!-- end: Main Menu -->

		<noscript>
			<div class="alert alert-block span10">
				<h4 class="alert-heading">Warning!</h4>
				<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
			</div>
		</noscript>

		<!-- start: Content -->
		<div id="content" class="span10">

			<?php

				if (!isset($view_file)) {
					$view_file = "";
				}

				if (!isset($view_module)) {
					$view_module = $this->uri->segment(1);
				}

				if (($view_file!="") && ($view_module!="")) {
					$path = $view_module."/".$view_file;
					$this->load->view($path);
				}

			?>

		</div><!--/.fluid-container-->

		<!-- end: Content -->
	</div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="clearfix"></div>

<footer>

</footer>

<!-- start: JavaScript-->

<script src="<?php echo base_url(); ?>adminfiles/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>adminfiles/js/jquery-migrate-1.0.0.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.ui.touch-punch.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/modernizr.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.cookie.js"></script>

<script src='<?php echo base_url(); ?>adminfiles/js/fullcalendar.min.js'></script>

<script src='<?php echo base_url(); ?>adminfiles/js/jquery.dataTables.min.js'></script>

<script src="<?php echo base_url(); ?>adminfiles/js/excanvas.js"></script>
<script src="<?php echo base_url(); ?>adminfiles/js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>adminfiles/js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>adminfiles/js/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>adminfiles/js/jquery.flot.resize.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.chosen.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.uniform.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.cleditor.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.noty.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.elfinder.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.raty.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.iphone.toggle.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.uploadify-3.1.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.gritter.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.imagesloaded.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.masonry.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.knob.modified.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/jquery.sparkline.min.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/counter.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/retina.js"></script>

<script src="<?php echo base_url(); ?>adminfiles/js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>
