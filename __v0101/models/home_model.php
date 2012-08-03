<?php
class Home_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_all_items() {
        $query = $this->db->get('config');
        if ($query->num_rows() > 0) {
            //foreach ($query->result() as $row) {
                //$data[] = $row;
                //echo $data;
                
            //}
           return $query->result_array(); 
        }
        
    }
}
?> 