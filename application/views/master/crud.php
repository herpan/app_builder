            <div class="col-lg-12">              
                <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                  <strong>Informasi!</strong> <?php echo $this->session->flashdata('message');?>
                </div>
                <?php endif ?>           
              <?php echo $output ?>           
            </div>        