<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class MY_Crud_Controller.
 * Author : Herpan Safari/herpan.safari@gmail.com
 * 
 */
class MY_Crud_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->library('grocery_CRUD');
		$this->load->library('MY_crud');			
		$this->crud =new MY_crud();
		$this->crud->set_model('MY_grocery_Model');
		if($this->readonly()){ 
			$this->crud->unset_add()
					   ->unset_edit()
					   ->unset_delete();
		}
		$this->crud->change_field_type('created_by', 'hidden')
			 	   ->change_field_type('created_at', 'hidden')
			       ->change_field_type('updated_by', 'hidden')
				   ->change_field_type('updated_at', 'hidden');
				   /*->callback_after_insert(function ($post_array, $primary_key) {
					$this->log_model->create_log( 'Tambah data di '.current_url().' dengan id:' . $primary_key);
					return true;
					})
					->callback_after_update(function ($post_array, $primary_key) {
					$this->log_model->create_log( 'Edit data '.current_url().' dengan id:' . $primary_key);
					return true;
					});*/
	}
}