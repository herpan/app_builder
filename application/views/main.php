<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title?></title>
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
  <?php 
    if (isset($css_files)) {
      foreach ($css_files as $file) {
  ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php 
      }
    };
  ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    
    
    
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="<?=base_url()?>assets/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="<?=base_url()?>assets/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?=base_url('assets/images/user/'.$this->session->userdata('picture'))?>" alt="profile"/>
              <span class="nav-profile-name"><?=$this->session->userdata('username')?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="<?=base_url('login/logout')?>" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    
    
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
<?php 
    foreach($menu as $row)  {
      if($sub=$this->group_auth->list_user_menu($row->id)){
?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic<?=$row->id?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi <?=$row->icon?> menu-icon"></i>
              <span class="menu-title"><?=$row->label?></span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic<?=$row->id?>">
              <ul class="nav flex-column sub-menu">
<?php foreach($sub as $rsub) :?>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url($rsub->link)?>"><?=$rsub->label?></a></li>                
<?php endforeach ?>              
              </ul>
            </div>
          </li>
<?php
      }
      else{
      
?>  
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url($row->link)?>">
              <i class="mdi <?=$row->icon?> menu-icon"></i>
              <span class="menu-title"><?=$row->label?></span>              
            </a>           
          </li>
<?php }//endif
    } //endforeach
?>          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
<?php $this->load->view($inc)?>            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.kaffahs.com/" target="_blank">Kaffah Soft</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Herpan Safari made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
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
  <!-- Custom js for this page-->
  <script src="<?=base_url()?>assets/js/file-upload.js"></script>
  <!-- End custom js for this page-->
  <?php 
    if (isset($js_files)) {
      foreach ($js_files as $file) {
  ?>
      <script src="<?php echo $file; ?>"></script>
  <?php
      }
    }
  ?>
</body>

</html>