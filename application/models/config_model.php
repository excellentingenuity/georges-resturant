<?php
class Config_model extends CI_Model {
    protected $Restuarant_name = "", $Version = "";
    
    function __construct() {
        parent::__construct();
        
        
    }
    function load_config() {
        $query = $this->db->get('config');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                switch ($row->Name){
                    case 'Restuarant Name':
                        $this->Restuarant_name = $row->Value;
                    case 'Version':
                        $this->Version = $row->Value;
                }
            }
           
        }
        
        
        
    }
    public function get_Version(){
        return $this->Version;
    }
    public function get_Name() {
        return $this->Restuarant_name;
    }
}
?> 