<?php 
class System_login extends CI_Controller {
 
    function index(){
        $this->load->view('header');
        $this->load->view('system_login');
        $this->load->view('footer');
    }   
}
?>