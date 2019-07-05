            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo lang('edit_group_heading');?></h4>                          
                  <?php if (!empty($message)) : ?>
                  <div id="infoMessage" class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php echo $message; ?></strong>
                  </div>
                  <?php endif ?>
                  <div id="formcontrols">
                  <?php echo form_open(current_url());?>                                         
                        <div class="form-group row">											
                        <label class="col-sm-3 col-form-label" for="group_name"><?php echo lang('edit_group_name_label', 'group_name');?> </label>
                        <div class="col-sm-9">
                              <?php echo form_input($group_name);?>									
                        </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                        <div class="form-group row">											
                        <label class="col-sm-3 col-form-label" for="group_name"> <?php echo lang('edit_group_desc_label', 'description');?></label>
                        <div class="col-sm-9">
                              <?php echo form_input($group_description);?>								
                        </div> <!-- /controls -->				
                        </div> <!-- /control-group --> 
                        <table class="table table-striped table-bordered">
                              <thead>
                                    <tr>
                                    <th> Modul  </th>
                                    <th> Aktif </th>
                                    <th> Baca Saja </th>                    
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($modul as $row) : ?>
                                    <tr>
                                    <td><?=$row->modul?></td>
                                    <td><input type="checkbox" name="enable[]" value="<?=$row->id?>" <?=$row->enable?>></td>
                                    <td><input type="checkbox" name="readonly[]" value="<?=$row->id?>" <?=$row->readonly?>></td>
                                    </tr>
                                    <?php endforeach?>                  
                              </tbody>
                        </table>
                        <div class="form-actions">
                              <button type="submit" class="btn btn-primary"><?php echo  lang('edit_group_submit_btn') ?></button> 								
                        </div> <!-- /form-actions -->              

                  <?php echo form_close();?>
                  </div>
		    </div>
              </div>
            </div>