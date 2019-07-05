<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function init(){
  $ci =& get_instance();
  $ci->load->model('MY_Model');
  $ci->MY_Model->tbl='appinfo';
  $data=$ci->MY_Model->get_all();
  // Custom
  foreach($data as $row){
    defined($row->name)        OR define($row->name, $row->value); // Application Name
  }
}
function logged_user(){
    $CI =& get_instance();
    return $CI->session->userdata('user_id');
}
function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}
function create_new_modul($class_name,$crud=true){
  // Create Controller
  $controller = fopen(APPPATH.'controllers/'.$class_name.'.php', "a")
  or die("Unable to open file!");
  
  if($crud){
  $table_name= strtolower($class_name);
  $controller_content ="<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class $class_name extends MY_Crud_Controller  {

public function __construct()
{
  parent::__construct();

  }
public function index()
  {
    \$crud = \$this->crud;
    \$crud->set_table('$table_name')
          ->set_subject('$class_name');         		 
    \$output = \$crud->render();	
    \$output = (array)\$output;
    \$output['inc'] = 'master/crud';
    \$output['active_module'] = \$this->active_module();
    \$output['title'] = AppName;
    \$output['menu'] = \$this->user_menu();
    \$output = (object)\$output;
    \$this->_render(\$output);
    

  }

  }";
  }
  else{
  $controller_content ="<?php defined('BASEPATH') or exit('No direct script access allowed');
  /**
   * Class $class_name
   * Author : Herpan Safari
   * Email : herpan.safari@gmail.com
   */
  class $class_name extends MY_Controller
  {
    public function __construct()
    {
      parent::__construct();
    }
    public function index()
    {
      $this->_render((object)array(
        'output' => '',
        'title' =>AppName,
        'inc' => 'dashboard',
        'active_module'=> \$this->active_module,
        'menu' => \$this->user_menu(),
        'js_files' => array(),
        'css_files' => array()
      ));			
    }	
  }
  }";
  }
  
  fwrite($controller, "\n". $controller_content);
  fclose($controller);
  //chown($controller, 'Herpan');
  chmod(APPPATH.'controllers/'.$class_name.'.php', 0777);
  }
  
  /* Create Model
  $model = fopen(APPPATH.'models/'.$class_name.'_model'.'.php', "a") 
  or die("Unable to open file!");
  
   $model_content ="<?php if ( ! defined('BASEPATH')) exit('No direct script 
   access allowed');
  
   class ".$class_name."_model"." extends CI_Model
  {
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
  }
  
  }
  ";
  fwrite($model, "\n". $model_content);
  fclose($model);
  
  // Create Twig Page
  
  $page = fopen(APPPATH.'views/'.$page_name.'.twig', "a") or die("Unable to    
  open file!"); 
  
  $page_content ='{% extends "base.twig" %}
  {% block content %}
  
  <div class="row">
    <div class="col-md-12">
        <h1>TO DO {{ site_title }}</h1>
  
    </div>
    <!-- /.col -->
  </div>
  
   {% endblock %}';
  fwrite($page, "\n". $page_content);
  fclose($page);
  */

  function delete_modul($class_name){
      $controller = fopen(APPPATH.'controllers/'.$class_name.'.php', "a") or die("Unable to open file!");
      fclose($controller);
      $modul = APPPATH.'controllers/'.$class_name.'.php';
      unlink($modul) or die("Couldn't delete file");
  }