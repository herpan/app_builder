
        <div class="span12">
          <div class="widget">
            <div class="widget-content">
              <div class="media">
                <div class="media-left">
                  <img src="<?php echo base_url(EMPIMG.$data->picture)?>" class="media-object img-thumbnail" width="150px" height="100px" alt="<?php echo $data->first_name ?>"> 
                </div>
                <div class="media-body">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> <h3><?php echo $data->employee_id ?> </h3> </th>                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><h3><?php echo $data->first_name." ".$data->middle_name." ".$data->last_name?></h3></td>
                      </tr>
                      <tr>
                        <td><h4 class="profile-info"><?php echo $data->job_title?></h4></td>
                      </tr>
                      <tr>
                        <td><h4 class="profile-info"><?php echo $data->department?></h4></td>
                      </tr>
                    </tbody>
                  </table>                  
                  <i class="icon-large icon-phone"></i><span class="spacer" ><?php echo $data->mobile_phone ?></span>
                  <i class="icon-large icon-envelope"></i><span class="spacer" ><?php echo $data->work_email ?></span>
                  <hr>                                    
                </div>
              </div>           
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Informasi Pribadi </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content"> 
              <table class="table table-striped table-bordered">                
                <tbody>
                  <tr>
                    <td width="300px"> <h4 class="profile-label">No. KTP</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->id_card_no ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Tanggal Lahir</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->birthday ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Jenis Kelamin</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->gender ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Status Pernikahan</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->marital_status ?> </h4></td>                    
                  </tr>              
                </tbody>
              </table>              
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Informasi Pekerjaan </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content"> 
              <table class="table table-striped table-bordered">                
                <tbody>                
                  <tr>
                    <td width="300px"> <h4 class="profile-label">Supervisor</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->supervisor_name ?> </h4></td>                    
                  </tr>                                         
                </tbody>
              </table>               
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Kontak</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">                
                <tbody>
                  <tr>
                    <td width="300px"> <h4 class="profile-label">Alamat</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->address1."<br/>".$data->address2 ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Kota</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->city ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Propinsi</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->province ?> </h4></td>                    
                  </tr>
                  <tr>
                    <td> <h4 class="profile-label">Kode Pos</h4></td>
                    <td> <h4 class="profile-info"><?php echo $data->postal_code ?> </h4></td>                    
                  </tr>                                
                </tbody>
              </table>                
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
        </div>