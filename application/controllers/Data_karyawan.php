
<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class Data_karyawan extends MY_Crud_Controller  {

public function __construct()
{
  parent::__construct();

  }
public function index()
  {
    $crud = $this->crud;
    $crud->set_table('data_karyawan')
          ->set_subject('Data_karyawan');         		 
    $output = $crud->render();	
    $output = (array)$output;
    $output['inc'] = 'master/crud';
    $output['active_module'] = $this->active_module();
    $output['title'] = AppName;
    $output['menu'] = $this->user_menu();
    $output = (object)$output;
    $this->_render($output);
    

  }

  }