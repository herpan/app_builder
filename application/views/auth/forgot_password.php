<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=AppPath?>/Lupa Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="content-wrapper d-flex align-items-center auth px-0">
			<div class="row w-100 mx-0">
			<div class="col-lg-4 mx-auto">
				<div class="auth-form-light text-left py-5 px-4 px-sm-5">
				<div class="brand-logo">
					<img src="<?=base_url()?>assets/images/logo.svg" alt="logo">
				</div>				
				<h2><?php echo lang('forgot_password_heading');?></h2>
				<small class="font-weight-light"><?php echo lang('forgot_password_subheading');?></small>
				<?php if ($this->session->flashdata('message')) : ?>
				<div id="infoMessage" class="alert alert-error">				  
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $message;?></strong>
				</div>
				<?php endif ?>
				<?php echo form_open("login/forgot_password",'class="pt-3"');?>
					<div class="form-group">						
						<?php echo form_input($identity);?>						
					</div>					
					<div class="mt-3">
						<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"><?=lang('forgot_password_submit_btn')?></button>					
					</div>										
				<?php echo form_close();?>
				</div>
			</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="<?=base_url()?>assets/vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="<?=base_url()?>assets/js/off-canvas.js"></script>
	<script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
	<script src="<?=base_url()?>assets/js/template.js"></script>
	<!-- endinject -->
</body>
</html>