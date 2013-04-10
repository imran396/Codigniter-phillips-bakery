<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<title>St. Phillips Bakery Admin Panel</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<!-- Bootstrap -->
	<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="/assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="/assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
	<link href="/assets/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="/assets/theme/scripts/select2/select2.css"/>
	
	<!-- Notyfy -->
	<link rel="stylesheet" href="/assets/theme/scripts/notyfy/jquery.notyfy.css"/>
	<link rel="stylesheet" href="/assets/theme/scripts/notyfy/themes/default.css"/>
	
	<!-- JQueryUI v1.9.2 -->
	<link rel="stylesheet" href="/assets/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
	
	<!-- Glyphicons -->
	<link rel="stylesheet" href="/assets/theme/css/glyphicons.css" />
	
	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="/assets/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="/assets/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	
	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

	<!-- JQuery v1.8.2 -->
	<script src="/assets/theme/scripts/jquery-1.8.2.min.js"></script>
	
	<!-- Modernizr -->
	<script src="/assets/theme/scripts/modernizr.custom.76094.js"></script>
	
	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="theme/scripts/jquery-miniColors/jquery.miniColors.css" />
	
	<!-- Theme -->
	<link rel="stylesheet" href="/assets/theme/css/style.min.css?1363272390" />
	
	<!-- LESS 2 CSS -->
	<script src="/assets/theme/scripts/less-1.3.3.min.js"></script>
	
	
	<!--[if IE]><script type="text/javascript" src="/assets/theme/scripts/excanvas/excanvas.js"></script><![endif]-->
	<!--[if lt IE 8]><script type="text/javascript" src="/assets/theme/scripts/json2.js"></script><![endif]-->
</head>
<body>
	
	<!-- Start Content -->
	<div class="container-fluid">
		
		<div class="navbar main">
			<a href="http://www.bakery.local" class="appbrand"><span>St. P. Bakery <span>Admin Panel</span></span></a>
			
						<button type="button" class="btn btn-navbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
						
			<ul class="topnav pull-right">

				<li class="account">
					<a data-toggle="dropdown" href="form_demo.html?lang=en" class="glyphicons logout lock"><span class="hidden-phone text">User</span><i></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="form_demo.html?lang=en" class="glyphicons cogwheel">Settings<i></i></a></li>
						<li>
							<span>
								<a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="/auth/logout">Sign Out</a>
							</span>
						</li>
					</ul>
									</li>
			</ul>
		</div>
		
				<div id="wrapper">
		<div id="menu" class="hidden-phone">
			<div id="menuInner">
				<div id="search">
					<input type="text" placeholder="Quick search ..." />
					<button class="glyphicons search"><i></i></button>
				</div>
				<ul>
					<li class="heading"><span>Menu</span></li>
					<li class="glyphicons home active"><a href="/admin/dashboard"><i></i><span>Dashboard</span></a></li>
<!--					<li class="glyphicons coins"><a href="/admin/openingBalance"><i></i><span>Opening Balance</span></a></li>-->
<!--					<li class="glyphicons calendar"><a href="/admin/sop"><i></i><span>SOP</span></a></li>-->
<!--                    <li class="glyphicons calendar"><a href="/admin/distribution_houses"><i></i><span>Distribution House</span></a></li>-->
<!--                    <li class="glyphicons calendar"><a href="/admin/distribution_points"><i></i><span>Distribution Point</span></a></li>-->
<!--                    <li class="glyphicons calendar"><a href="/admin/routes"><i></i><span>Rout</span></a></li>-->


				</ul>
<!--				<ul>-->
<!--					<li class="heading"><span>Reports</span></li>-->
<!--					<li class="glyphicons coins"><a href="finances.html?lang=en"><i></i><span>Daily Sales Report</span></a></li>-->
<!--				</ul>-->
			</div>
		</div>

		<div id="content">
            <strong><b style="color:red;"><?php echo (empty($message)) ? "" : $message ?></b></strong>
        <?php echo $content_for_layout; ?>

		</div>
		<!-- End Wrapper -->
		</div>

		<!-- Sticky Footer -->
		<div id="footer" class="visible-desktop">
	      	<div class="wrap">

	      	</div>
	    </div>
				
	</div>
	
	<!-- JQueryUI v1.9.2 -->
	<script src="/assets/theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="/assets/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- MiniColors -->
	<script src="/assets/theme/scripts/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Select2 -->
	<script src="/assets/theme/scripts/select2/select2.js"></script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = '#DA4C4C';
	</script>
	<script src="/assets/theme/scripts/jquery.cookie.js"></script>
	<script src="/assets/theme/scripts/themer.js"></script>
	
	<!-- Notyfy -->
	<script type="text/javascript" src="/assets/theme/scripts/notyfy/jquery.notyfy.js"></script>
	
	<!-- Dashboard Custom Script -->
	<script type="text/javascript" src="/assets/theme/scripts/index.js"></script>
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<!-- Sparkline -->
	<script src="/assets/theme/scripts/jquery.sparkline.js" type="text/javascript"></script>
	<script type="text/javascript">
	function genSparklines()
	{
		if ($('.sparkline').length)
		{
			$.each($('.sparkline'), function(k,v) 
			{
				var data = [[1, 3+charts.utility.randNum()], [2, 5+charts.utility.randNum()], [3, 8+charts.utility.randNum()], [4, 11+charts.utility.randNum()],[5, 14+charts.utility.randNum()],[6, 17+charts.utility.randNum()],[7, 20+charts.utility.randNum()], [8, 15+charts.utility.randNum()], [9, 18+charts.utility.randNum()], [10, 22+charts.utility.randNum()]];
			 	$(v).sparkline(data, 
				{ 
					width: 100,
					height: 28,
					lineColor: themerPrimaryColor,
					fillColor: '#fafafa',
					spotColor: '#467e8c',
					maxSpotColor: '#9FC569',
					minSpotColor: '#ED7A53',
					spotRadius: 3,
					lineWidth: 2
				});
			});
		}
	}
	$(function()
	{
		genSparklines();
	});
	</script>
		
	<!--  Flot (Charts) JS -->
	<script src="/assets/theme/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="/assets/theme/scripts/flot/jquery.flot.pie.js" type="text/javascript"></script>
	<script src="/assets/theme/scripts/flot/jquery.flot.tooltip.js" type="text/javascript"></script>
	<script src="/assets/theme/scripts/flot/jquery.flot.selection.js"></script>
	<script src="/assets/theme/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="/assets/theme/scripts/flot/jquery.flot.orderBars.js" type="text/javascript"></script>
	
	<!-- Resize Script -->
	<script src="/assets/theme/scripts/jquery.ba-resize.js"></script>
	
	<!-- Uniform -->
	<script src="/assets/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- Bootstrap Script -->
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap Extended -->
	<script src="/assets/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="/assets/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="/assets/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="/assets/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="/assets/bootstrap/extend/bootbox.js" type="text/javascript"></script>
	<script src="/assets/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
	<script src="/assets/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
	
	<!-- Custom Onload Script -->
	<script src="/assets/theme/scripts/load.js"></script>
	
	<!-- Layout Options -->
	<script src="/assets/theme/scripts/layout.js"></script>
	
	<script>
	//Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['table', 'corechart']});
	
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
	</script>

</body>
</html>