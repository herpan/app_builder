<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class App
 * Author : Herpan Safari
 * Email : herpan.safari@gmail.com
 */
class App extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->_render((object)array(
			'output' => '',
			'title' => AppName,
			'inc' => 'dashboard',
			'active_module'=> $this->active_module,
			'menu' => $this->user_menu(),
			'js_files' => array(),
			'css_files' => array()
		));			
	}	
}
