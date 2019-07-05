<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class Modul_manager
 * Author : Herpan Safari
 * Email : herpan.safari@gmail.com
 */
class Modul_manager extends MY_Crud_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$crud = $this->crud;
		$crud->set_table('appmodul')
			 ->set_subject('Daftar Modul')
			 ->display_as('name','Nama modul')
			 ->unset_edit()
			 ->callback_after_insert(function ($post_array, $primary_key) {
					create_new_modul($post_array['name']);
					return true;
				})
			 ->callback_before_delete(array($this,'after_delete'))
			 ->columns(array('name'));			 
		$output = $crud->render();	
		$output = (array)$output;
		$output['inc'] = 'master/crud';
		$output['active_module'] = $this->active_module();
		$output['title'] = AppName;
		$output['menu'] = $this->user_menu();
		$output = (object)$output;
		$this->_render($output);			
	}
	function after_delete($primary_key){
		$modul=$this->db->get_where('appmodul',array('id'=>$primary_key))->row();
		delete_modul($modul->name);
		return true;
	}
	function delete(){		
		return chmod(APPPATH.'controllers/Appinfo.php',0777);	
	}

}
