<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class Menu_manager
 * Author : Herpan Safari
 * Email : herpan.safari@gmail.com
 */
class Menu_manager extends MY_Crud_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$crud = $this->crud;
		$crud->set_table('appmenu')
			 ->set_subject('Daftar Menu')
			 //->basic_model->set_query_str("SELECT label, CASE WHEN parent_id IS NULL THEN id ELSE parent_id END AS Sort FROM appmenu ORDER BY Sort, id")
			 ->set_relation('modul_id','appmodul','name')
			 ->set_relation('parent_id','appmenu','label',array('parent_id' => NULL),'id asc')
			 ->display_as('modul_id','Modul')
			 ->display_as('parent_id','Induk')
			 ->display_as('sort','Urutan')
			 ->order_by('sort','asc')
			 ->columns(array('label', 'link','modul_id'));			 
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
