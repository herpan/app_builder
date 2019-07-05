<?php
/**
 * Class MY_Model
 * Author : Herpan Safari/herpan.safari@gmail.com
 * 
 */
class MY_Model  extends CI_Model {    
    public $tbl = null;
    
    public function get_all()
    {
        return $this->db->get('appinfo')->result();
    }
    
    public function get_id($id,$key='id')
    {
        return $this->db->get_where($this->tbl, [$key => $id])->row();
    }
    
    public function db_insert_batch($data)
    {
        return $this->db->insert_batch($this->tbl, $data);
    }
    public function import($col=array(),int $startCol=1,int $endCol=5)
    {
        if (isset($_FILES["file"]["name"])) {
                if(empty($col)){
                    $fields     = $this->db->list_fields($this->_tbl);
                    $num_fields = sizeof($fields)-$endCol;                    
                    for ($i =$startCol; $i < $num_fields; $i++) {
                        $col[] = $fields[$i];
                    }
                }
                $col_num = sizeof($col);
                $path    = $_FILES["file"]["tmp_name"];
                $object  = PHPExcel_IOFactory::load($path);
                foreach ($object->getWorksheetIterator() as $worksheet) {
                        $highestRow = $worksheet->getHighestRow();
                        $$highestRow = $worksheet->getHighestColumn();
                        for ($row = 2; $row <= $highestRow; $row++) {                                
                                for($i=0;$i<$col_num;$i++){                                    
                                    $d[$col[$i]] = $worksheet->getCellByColumnAndRow($i, $row)->getValue();                                    
                                }
                                $d['created_by'] = $this->session->userdata('user_id');
                                $data[] = $d;                                
                            }
                }               
                try {
                    $this->db->trans_start(FALSE);
                    $this->db_insert_batch($data);
                    $this->db->trans_complete();
                    $db_error = $this->db->error();
                    if (!($db_error['code'] == 0)) {
                        throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                        return false; // unreachable retrun statement !!!
                    }
                    //echo 'Data berhasil di import';
                    return TRUE;
                } catch (Exception $e) {
                    // this will not catch DB related errors. But it will include them, because this is more general. 
                    log_message('error: ', $e->getMessage());
                    //echo 'Data gagal di import';
                    return false;
                }
            }
    }   
    public function set_table($tbl)
    {
        $this->tbl = $tbl;
    }

}