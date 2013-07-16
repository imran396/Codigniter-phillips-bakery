<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<title>St. Phillips Bakery</title>

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

	<!-- JQueryUI v1.9.2 -->
	<link rel="stylesheet" href="/assets/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

	<!-- Glyphicons -->
	<link rel="stylesheet" href="/assets/theme/css/glyphicons.css" />

	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="/assets/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="/assets/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="/assets/theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

	<!-- JQuery v1.8.2 -->
	<script src="/assets/theme/scripts/jquery-1.8.2.min.js"></script>

	<!-- Modernizr -->
	<script src="/assets/theme/scripts/modernizr.custom.76094.js"></script>

	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="/assets/theme/scripts/jquery-miniColors/jquery.miniColors.css" />

	<!-- Theme -->
	<link rel="stylesheet" href="/assets/theme/css/style.min.css?1363272449" />

	<!-- LESS 2 CSS -->
	<script src="/assets/theme/scripts/less-1.3.3.min.js"></script>

</head>
<body>

    <!-- Start Content -->
    <div class="container-fluid fixed" style="margin-top: 50px; padding-top: 20px; border: none; background: none;">

        <div id="login" style="background: none;">

            <div style="text-align: center">

<!--                <img src="/assets/img/bat_logo.png" />-->
                <h2 style="text-align: center; margin-bottom: 30px; margin-top: 20px;"><?php echo $this->lang->line('site_name');?></h2>

            </div>

            <form class="form-signin" method="POST" action="">

                <strong><b style="color:red;"><?php echo $message;?></b></strong>
                <h4 class="form-signin-heading">&nbsp;</h4>

                <div class="uniformjs">
                    <input type="text" class="input-block-level" placeholder="username" name="username">
                    <input type="password" class="input-block-level" placeholder="Password" name="password">
                    <select name="location_id" style="height: 25px; width: 220px;">
                        <option value="" >---Select Location---</option>
                        <?php foreach($query as $rows):?>
                        <option value="<?php echo $rows->location_id; ?>" ><?php echo $rows->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="checkbox"><input type="checkbox" value="1" name="remember">Remember me</label>
                </div>

                <div style="text-align: center"><button class="btn btn-large btn-primary" type="submit">Login</button></div>

            </form>

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
    <script type="text/javascript" language="javascript">
        jQuery(document).ready(function(){
            $("#location_id").select2();
        });

    </script>
</body>
</html>