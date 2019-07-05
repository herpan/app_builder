			<div class="widget widget-table action-table">
				<div class="widget-header"> <i class="icon-group"></i>
				  <h3><?=lang('deactivate_heading')?></h3>
				</div>
				<!-- /widget-header -->
				<div class="widget-content">
				    <div class="row span12"><br/><p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p></div>
					<?php if (!empty($message)): ?>
					<div id="infoMessage" class="alert alert-error">				  
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?php echo $message;?></strong>
					</div>
					<?php endif ?>
					<div id="formcontrols">
					<?php echo form_open("auth/deactivate/".$user->id,'class="form-horizontal"');?>
						<fieldset>							
							<div class="form-group row">											
								<label class="col-sm-3 col-form-label" for="confirm"></label>
								<div class="col-sm-9">
									<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
									<input type="radio" name="confirm" value="yes" checked="checked" />
									<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
									<input type="radio" name="confirm" value="no" />							
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->											
							<div class="form-actions">
							      <?php echo form_hidden($csrf); ?>
								  <?php echo form_hidden(array('id'=>$user->id)); ?>
								<button type="submit" class="btn btn-primary"><?php echo  lang('deactivate_submit_btn') ?></button> 								
							</div> <!-- /form-actions -->
						</fieldset>
					</form>
				   </div>				  
				</div>
				<!-- /widget-content --> 
          </div>
        <!-- /widget -->                    
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row -->    