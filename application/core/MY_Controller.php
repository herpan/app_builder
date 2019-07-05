<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class MY_Controller
 * Author : Herpan Safari/herpan.safari@gmail.com
 * 
 */
class MY_Controller extends CI_Controller
{
	private $readonly=true;
	private $user_menu;
	public $active_module;
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth'));
		if ($this->ion_auth->logged_in()) {
			$this->load->model('group_auth');
			$user_moduls = $this->group_auth->list_user_modul();
			$modul_name = get_class($this);
			$allow = array_key_exists($modul_name, $user_moduls);
			if (!$allow) {
				return show_error('Anda tidak berhak untuk mengakses halaman ini');
				die();
			}
			else{ 
				$user_moduls = $this->group_auth->list_user_modul();
				$this->user_menu = $this->group_auth->list_user_menu();
				$this->active_module=$modul_name;
				$this->readonly = $user_moduls[$modul_name];								
			}	
			init();  
		} else {
			redirect('login', 'refresh');			
		}
	}
	public function index()
	{
		
	}
	public function _render($output = null,$page='main')
	{
		$this->load->view($page,(array)$output);
	}
	public function readonly()
	{
		return $this->readonly;
	}
	public function user_menu()
	{
		return $this->user_menu;
	}
	public function active_module()
	{
		return $this->active_module;
	}	
}