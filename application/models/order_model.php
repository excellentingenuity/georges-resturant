<?php
Class Order_model extends CI_Model {
 
     function __construct() {
        parent::__construct();
        
        
    }
    function load_orders() {
        $query = $this->db->get('Orders');
        if ($query->num_rows() > 0) {
            return $query->result();
           
        }
    }
       
}
?>