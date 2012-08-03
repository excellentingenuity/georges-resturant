<?php
class Table_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_all_items() {
        $query = $this->db->get('Tables');
        return $query->result();
    }
}
?> 