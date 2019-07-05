<?php
/**
 * Class Employee
 * Author : Herpan Safari/herpan.safari@gmail.com
 * 
 */
class Group_auth  extends CI_Model {    
    //get all modul by group
    public function list_group_modul($group_id=null){
        $data[]=array();
        $this->db->select('appmodul.id as id,appmodul.name as modul, if(group_auth.readonly=1, "checked","" ) as readonly,if(group_auth.group_id is null, "", "checked") as enable')
                 ->from('appmodul')
                 ->join('(select * from `group_auth` WHERE `group_auth`.`group_id` = '.$group_id.') as group_auth', 'appmodul.id = group_auth.modul_id','left');                 
        return $this->db->get()->result();        
       
    }
    //get logged user module
    public function list_user_modul(){        
        $data[]=array();
        $current_group = $this->session->userdata( 'group');
        $this->db->select('appmodul.name as modul, group_auth.readonly as readonly')
                 ->from('group_auth')
                 ->join('appmodul',  'appmodul.id = group_auth.modul_id')
                 ->where('group_auth.group_id',$current_group);
        $query=$this->db->get();
        foreach ($query->result() as $row) {
           $data[$row->modul]=$row->readonly;
        }        
        return $data;
    }
     //get logged user menu
    public function list_user_menu($parent=NULL){        
        return $this->db
                    ->select('appmenu.id,icon,label,link')
                    ->from('appmenu')
                    ->join('appmodul','appmenu.modul_id=appmodul.id','left')
                    ->where('parent_id',$parent)
                    ->where_in('appmenu.id',$this->list_all_menu_id())
                    ->order_by('sort','asc')
                    ->get()->result();            
     // echo $this->db->last_query();die();   
    }
    public function list_all_menu_id(){
        $current_group=$this->session->userdata( 'group');
        return 
        flatten($this->db->query("select id from appmenu where id in 
                (select id from appmenu where modul_id in(select modul_id from group_auth WHERE group_id= $current_group)) 
                or id in (select parent_id from appmenu where modul_id in(select modul_id from group_auth WHERE group_id= $current_group))")->result_array());                     
    }
    public function update($id){
        $enable = $this->input->post('enable');
        $readonly = $this->input->post('readonly');
        if(!empty($enable)){
            foreach($enable as $modul){
                $r= (!empty($readonly) && in_array($modul,$readonly)) ? 1:0;
                
                $this->load->helper('date');
                $updated_by = $this->session->userdata('user_id');
                $updated_at = date('Y-m-d H:i:s', now());
    
                $data=array('group_id' => $id, 'modul_id'=>$modul, 'readonly'=>$r,'created_by'=>logged_user());	
                                
                $sql = $this->db->insert_string('group_auth', $data) . 
                                                ' ON DUPLICATE KEY UPDATE readonly='.$data['readonly'].
                                                ", updated_by=$updated_by, updated_at='$updated_at'";
                $this->db->query($sql);
    
            }
        }        
        $this->db->where('group_id', $id)
                 ->where_not_in('modul_id',$enable);
        return $this->db->delete('group_auth');             
    }     
}