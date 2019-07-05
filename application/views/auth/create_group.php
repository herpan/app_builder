			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				  <h4 class="card-title"><?= lang('create_user_group') ?></h4>
				  	<?php if (!empty($message)) : ?>
					<div id="infoMessage" class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><?php echo $message; ?></strong>
					</div>
					<?php endif ?>
					<div id="formcontrols">
					<?php echo form_open("auth/create_group",'class="form-horizontal"');?>													
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="group_name"><?php echo lang('create_group_name_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($group_name);?>									
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="form-group row">											
							<label class="col-sm-3 col-form-label" for="description"><?php echo lang('create_group_desc_label')?></label>
							<div class="col-sm-9">
								<?php echo form_input($description);?>									
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->							
						<div class="form-actions">
							<button type="submit" class="btn btn-primary"><?php echo  lang('create_group_submit_btn') ?></button> 								
						</div> <!-- /form-actions -->						
					</form>
					</div>
				</div>
              </div>
            </div>