<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title><?php echo $this->lang->line('site_title'); ?></title>

    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

    <!-- Bootstrap Extended -->
    <link href="<?php echo base_url() ?>assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/scripts/select2/select2.css"/>

    <!-- JQueryUI v1.9.2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

    <!-- Glyphicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/glyphicons.css" />

    <!-- DataTables -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>assets/theme/scripts/DataTables/media/css/DT_bootstrap.css" />

    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>assets/theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

    <!-- JQuery v1.8.2 -->
    <script src="<?php echo base_url() ?>assets/theme/scripts/jquery-1.8.2.min.js"></script>

    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>assets/theme/scripts/jquery-miniColors/jquery.miniColors.css" />

    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/style.min.css?1363272430" />

    <!-- LESS 2 CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/print.css" media="print"/>
    <!--<script src="<?php /*echo base_url() */?>assets/theme/scripts/less-1.3.3.min.js"></script>
-->
</head>
<body>

<!-- Start Content -->
<div class="container-fluid container-new">

    <?php $this->load->view('admin/layouts/top'); ?>

    <div id="wrapper">
        <?php $this->load->view('admin/layouts/left'); ?>
        <?php echo $content_for_layout; ?>
    </div>
    <!-- End Wrapper -->

    <!-- Sticky Footer -->
    <div id="footer" class="visible-desktop">
        <div class="wrap" style="color: #ccc; padding: 5px; text-align: right">

        </div>
    </div>

</div>

<!-- JQueryUI v1.9.2 -->
<script src="<?php echo base_url() ?>assets/theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--&lt;!&ndash; JQueryUI Touch Punch &ndash;&gt;-->
<!--&lt;!&ndash; small hack that enables the use of touch events on sites using the jQuery UI user interface library &ndash;&gt;-->
<!--<script src="<?php //echo base_url() ?>/assets/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>-->

<!-- DataTables -->
<!--<script src="<?php /*echo base_url() */?>assets/theme/scripts/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php /*echo base_url() */?>assets/theme/scripts/DataTables/media/js/DT_bootstrap.js"></script>-->

<!--<script type="text/javascript" language="javascript" src="<?php /*echo base_url() */?>assets/media/js/jquery.dataTables.js"></script>-->

<!-- MiniColors -->
<script src="<?php echo base_url() ?>assets/theme/scripts/jquery-miniColors/jquery.miniColors.js"></script>


<script src="<?php echo base_url() ?>assets/theme/scripts/select2/select2.js"></script>

<!-- Themer -->
<script>var themerPrimaryColor = '#DA4C4C';</script>
<script src="<?php echo base_url() ?>assets/theme/scripts/jquery.cookie.js"></script>
<script src="<?php echo base_url() ?>assets/theme/scripts/themer.js"></script>

<!-- jQuery Validate -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/validationEngine.jquery.css" type="text/css">
<script src="<?php echo base_url()?>assets/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<!-- Form Elements Custom script -->
<script src="<?php echo base_url() ?>assets/theme/scripts/form_elements.js" type="text/javascript"></script>

<!-- Resize Script -->
<script src="<?php echo base_url() ?>assets/theme/scripts/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="<?php echo base_url() ?>assets/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>

<!-- Bootstrap Script -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap Extended -->
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootbox.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/multi-datepicker/js/jquery.timepicker.js" type="text/javascript"></script>

<!-- Theme -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css?var=1" />

<!-- Custom Onload Script -->
<script src="<?php echo base_url() ?>assets/theme/scripts/load.js"></script>

<!--Layout Options-->
<!--<script src="/assets/theme/scripts/layout.js"></script>-->

<script type="text/javascript" language="javascript">

    jQuery(document).ready(function () {

        jQuery('#timepicker').timepicker();

        jQuery("#form1, #form2, #form3, #form4").validationEngine({
            promptPosition: "topLeft"
        });

        jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });

        $("#category_id, #location_id, #flavour_id, #customer_id, #employee_id, #manager_id, .search_dropdown").select2();

    });

</script>

</body>
</html>