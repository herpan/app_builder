<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Employee
 * Author : Herpan Safari/herpan.safari@gmail.com
 *
 */
class Log_model extends CI_Model
{
    public function create_log($details)
    {
        $this->load->helper('date');
        $param      = array('user' => $this->session->userdata('user_id'), 'ip' => $this->input->ip_address(), 'details' => $details);
        $sql        = $this->db->insert_string('applogs', $param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
        
    }
}
