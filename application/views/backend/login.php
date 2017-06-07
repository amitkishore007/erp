<?php
	$system_name	=	$this->db->get_where('settings' , array('type' => 'company_name'))->row()->description;
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo $system_name;?> | <?php echo translate('login');?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link rel="icon" href="uploads/logo/favicon.png">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/backend/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/backend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/backend/css/animate.min.css" rel="stylesheet" />
	<link href="assets/backend/css/style.min.css" rel="stylesheet" />
	<link href="assets/backend/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/backend/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="assets/backend/login.png" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <img src="uploads/logo/logo.png" style="height: 30px;"> <?php echo $system_name;?>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
	            <?php 
	                echo form_open(base_url() . 'index.php?login/do_login/' , array(
	                    'class' => 'margin-bottom-0'
	                ));
	            ?>
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" 
                        	placeholder="<?php echo translate('enter_email');?>" name="email" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" 
                        	placeholder="<?php echo translate('enter_password');?>" name="password" />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg"><?php echo translate('sign_me_in');?></button>
                    </div>
                    <div class="m-t-20">
                        <a href="<?php echo base_url();?>index.php?login/forgot_password"><?php echo translate('forgot_password');?> ?</a>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
        <!-- end login -->
        
        
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/backend/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/backend/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/backend/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/backend/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/backend/crossbrowserjs/respond.min.js"></script>
		<script src="assets/backend/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/backend/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/backend/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/backend/js/login-v2.demo.min.js"></script>
	<script src="assets/backend/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>


<!-- Localized -->