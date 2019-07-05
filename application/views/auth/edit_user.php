			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				  <h4 class="card-title"><?= lang('edit_user_subheading') ?></h4>
				  	<?php if (!empty($message)) : ?>
					<div id="infoMessage" class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><?php echo $message; ?></strong>
					</div>
					<?php endif ?>
					<div id="formcontrols">
					<?php echo form_open(uri_string(),'class="form-horizontal"');?>													
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="first_name"><?php echo lang('edit_user_fname_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($first_name);?>									
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="last_name"><?php echo lang('edit_user_lname_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($last_name);?>									
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->								
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="company"><?php echo lang('edit_user_company_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($company);?>									
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="phone"><?php echo lang('edit_user_phone_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($phone);?>								
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="password"><?php echo lang('edit_user_password_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($password);?>								
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="password_confirm"><?php echo lang('edit_user_password_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($password_confirm);?>								
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<?php if ($this->ion_auth->is_admin()): ?>
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="groups"><?php echo lang('edit_user_groups_heading')?></label>
							<div class="col-sm-9">
								<?php foreach ($groups as $group):?>
									<label class="checkbox">
									<?php
										$gID=$group['id'];
										$checked = null;
										$item = null;
										foreach($currentGroups as $grp) {
											if ($gID == $grp->id) {
												$checked= ' checked="checked"';
											break;
											}
										}
									?>
									<input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
									<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
									</label>
									<?php endforeach?>								
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->					  

						<?php endif ?>

						<?php echo form_hidden('id', $user->id);?>
						<?php echo form_hidden($csrf); ?>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary"><?php echo  lang('edit_user_submit_btn') ?></button> 								
						</div> <!-- /form-actions -->						
					</form>
					</div>
				</div>
              </div>
            </div>