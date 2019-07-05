<?php
class MY_crud extends grocery_CRUD{
  
    public function __construct()
	{
		parent::__construct();
		$this->change_field_type('created_by', 'hidden')
			 ->change_field_type('created_at', 'hidden')
			 ->change_field_type('updated_by', 'hidden')
			 ->change_field_type('updated_at', 'hidden'); 		
	}
}