<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Sign In - MY Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

<!-- Open Sans font from Google CDN -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

<!-- Pixel Admin's stylesheets -->
<link href="<?= base_url()?>resource/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>resource/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>resource/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>resource/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>resource/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
	<script src="<?= base_url()?>resource/javascripts/ie.min.js"></script>
<![endif]-->
	
<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- Pixel Admin's javascripts -->
<script src="<?= base_url()?>resource/javascripts/bootstrap.min.js"></script>
<script src="<?= base_url()?>resource/javascripts/pixel-admin.min.js"></script>

<script type="text/javascript">
window.PixelAdmin.start([
	function () {
		$("#signin-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
		
		// Validate username
		$("#username_id").rules("add", {
			required: true,
			minlength: 3
		});

		// Validate password
		$("#password_id").rules("add", {
			required: true,
			minlength: 6
		});
	}
]);

$(function(){
	var show_alert='<?= $alert_type;?>';
	if(show_alert==='error')
	{
		$("#signin-alert-login-error").removeClass('hidden');
	}else if(show_alert==='unable')
	{
		$("#signin-alert-login-unable").removeClass('hidden');
	}
});
	
</script>

</head>


<!-- 1. $BODY ======================================================================================
	
	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'     - Sets text direction to right-to-left
-->
<body class="theme-default page-signin-alt">
<!-- Demo script --> <script src="<?= base_url()?>resource/demo/demo.js"></script> <!-- / Demo script -->



<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->
	<div class="signin-header">
		<a href="index.html" class="logo">
			<div class="demo-logo bg-primary"><img src="<?= base_url()?>resource/demo/logo-big.png" alt="" style="margin-top: -4px;"></div>&nbsp;
			<strong>MY</strong>Admin
		</a> <!-- / .logo -->
		<a href="pages-signup-alt.html" class="btn btn-primary">Sign Up</a>
	</div> <!-- / .header -->

	<h1 class="form-header">Sign in to your Account</h1>


	<!-- Form -->
	<form action="<?= base_url()?>login/login" id="signin-form_id" method="post" class="panel">
		<div class="form-group">
			<input type="text" name="signin_account" id="username_id" class="form-control input-lg" placeholder="Username or email">
		</div> <!-- / Username -->

		<div class="form-group signin-password">
			<input type="password" name="signin_password" id="password_id" class="form-control input-lg" placeholder="Password">
			<a href="#" class="forgot">Forgot?</a>
		</div> <!-- / Password -->

		<div class="form-actions">
			<input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg">
		</div> <!-- / .form-actions -->
	</form>
	<!-- / Form -->
	
	<div class="signin-with">
		<div class="alert alert-danger hidden" id="signin-alert-login-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>錯誤！</strong>帳號不存在或密碼錯誤。
		</div>
		<div class="alert hidden" id="signin-alert-login-unable">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>警告！</strong>無法登入，請洽系統管理員。
		</div>
	</div>
	
	
	<!--
	<div class="signin-with">
		<div class="header">or sign in with</div>
		<a href="index.html" class="btn btn-lg btn-facebook rounded"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
		<a href="index.html" class="btn btn-lg btn-info rounded"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
		<a href="index.html" class="btn btn-lg btn-danger rounded"><i class="fa fa-google-plus"></i></a>
	</div>
	-->


</body>
</html>
