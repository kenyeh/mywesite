<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url()?>resource/images/blog/k.png">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>resource/css/blog/bootstrap-flatly.min.css" rel="stylesheet">
    <!-- Font-awesome -->
    <link href="<?= base_url()?>resource/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?= base_url()?>resource/css/blog/blog.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="<?= base_url()?>resource/js/jquery.min.js"></script>
    <script src="<?= base_url()?>resource/js/bootstrap.min.js"></script>
    
	<!--my.js-->
	<script src="<?= base_url()?>resource/js/MY_main.js"></script>
	
	<!--lazyload-->
	<script src="<?= base_url()?>resource/js/jquery.lazyload.min.js"></script>
  </head>

  <body>
	<div class="modal fade" id="login_alert">
		<div class="modal-dialog modal-sm">
			<div id="login_alert_div" class="alert alert-warning" role="alert">帳密錯誤。</div>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	
	<div class="modal fade" id="login_modal">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Sign in</h4>
				</div>
				<div class="modal-body">
			      <form class="form-signin">
			        <label for="signin_id" class="sr-only">ID</label>
			        <input type="email" id="signin_id" name="signin_id" class="form-control" placeholder="ID" autofocus>
			        <br/>
			        <label for="signin_password" class="sr-only">Password</label>
			        <input type="password" id="signin_password" name="signin_password" class="form-control" placeholder="Password" >
			        <br/>
			        <button class="btn btn-primary btn-block" id="btn_signin" type="button">Sign in</button>
			      </form>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	
    <div class="blog-masthead container-fluid">
      
        <nav class="blog-nav navbar-fixed-top">
         	<a id="Blog_index_link" class="blog-nav-item navbar-brand" href="<?= base_url()?>blog">
         		<img class="Brand" src="<?= base_url()?>resource/images/blog/k.png" height="28">
         	</a>
         	
         	<?php if (!empty($this->session_name)): ?>
          	<a id="Blog_signout_link" class="blog-nav-item pull-right" href="#">
          		<i class="fa fa-power-off fa-lg tip" data-toggle="tooltip" data-placement="bottom" title="登出"></i>
          	</a>
		  		<?php if (isset($archive_id_code)): ?>
		      	<a id="Blog_edit_link" class="blog-nav-item pull-right" href="<?= base_url()?>blog/post/<?= $archive_id_code?>">
		     		<i class="fa fa-pencil-square-o fa-lg tip" data-toggle="tooltip" data-placement="bottom" title="編輯"></i>
		     	</a>
		     	
		     	<?php elseif(isset($edit_id)): ?>
		     	<a id="Blog_edit_link" class="blog-nav-item pull-right" href="<?= base_url()?>blog/<?= $edit_id?>">
		     		<i class="fa fa-undo fa-lg tip" data-toggle="tooltip" data-placement="bottom" title="返回"></i>
		     	</a>
		     	<?php else: ?>
		     	<a id="Blog_post_link" class="blog-nav-item pull-right" href="<?= base_url()?>blog/post">
		      		<i class="fa fa-pencil fa-lg tip" data-toggle="tooltip" data-placement="bottom" title="新增"></i>
		      	</a>
		  		<?php endif; ?>
          		
      		<?php endif; ?>
        </nav>
        
    </div>

    