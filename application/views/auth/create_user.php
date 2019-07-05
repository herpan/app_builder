			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				  <h4 class="card-title"><?= lang('create_user') ?></h4>
				  	<?php if (!empty($message)) : ?>
					<div id="infoMessage" class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><?php echo $message; ?></strong>
					</div>
					<?php endif ?>
					<div id="formcontrols">					
						<form class="forms-sample" id="edit-profile" action="<?php echo base_url("auth/create_user") ?>" method="post" class="form-horizontal">
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="first_name"><?php echo lang('create_user_fname_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($first_name); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label for="last_name"><?php echo lang('create_user_lname_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($last_name); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<?php if ($identity_column !== 'email') : ?>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label" for="identity"><?php echo lang('create_user_identity_label') ?></label>
									<div class="col-sm-9">
										<?php
										echo form_error('identity');
										echo form_input($identity);
										?>
									</div> <!-- /controls -->
								</div> <!-- /control-group -->
							<?php endif ?>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="company"><?php echo lang('create_user_company_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($company); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="email"><?php echo lang('create_user_email_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($email); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="phone"><?php echo lang('create_user_phone_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($phone); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="password"><?php echo lang('create_user_password_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($password); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="password_confirm"><?php echo lang('create_user_password_confirm_label') ?></label>
								<div class="col-sm-9">
									<?php echo form_input($password_confirm); ?>
								</div> <!-- /controls -->
							</div> <!-- /control-group -->
							<div class="form-actions">
								<button type="submit" class="btn btn-primary"><?php echo  lang('create_user_submit_btn') ?></button>
							</div> <!-- /form-actions -->
							
						</form>
					</div>
				</div>
              </div>
            </div>