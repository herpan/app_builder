<?php
/**
 * Class Employee
 * Author : Herpan Safari/herpan.safari@gmail.com
 *
 */
class MY_grocery_Model  extends grocery_CRUD_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function db_update($post_array, $primary_key_value)
    {
        if ($this->field_exists('updated_by') && $this->field_exists('updated_at')) {
                $this->load->helper('date');
                $post_array['updated_by'] = $this->session->userdata('user_id');
                $post_array['updated_at'] = date('Y-m-d H:i:s', now());
            }        
        return parent::db_update($post_array, $primary_key_value);
    }

    function db_insert($post_array)
    {
        if ($this->field_exists('created_by') && $this->field_exists('created_at')) {
                $this->load->helper('date');
                $post_array['created_by'] = $this->session->userdata('user_id');
                $post_array['created_at'] = date('Y-m-d H:i:s', now());
            }
        return parent::db_insert($post_array);
    }
    /*function db_insert_batch($tbl, $data)
    {
        return $this->db->insert_batch($tbl, $data);
    }*/
}
