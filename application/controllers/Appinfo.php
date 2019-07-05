
<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class Appinfo extends MY_Crud_Controller  {

public function __construct()
{
  parent::__construct();

  }
public function index()
  {
    $crud = $this->crud;
    $crud->set_table('appinfo')
          ->set_subject('Appinfo')
          ->columns(array('name', 'value','description'))
          ->display_as('name','Nama Info')
          ->display_as('value','Isi Info')
          ->display_as('description','Keterangan');         		 
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