<?php
    function check_session() {
        $CI =& get_instance();
        
        if(!$CI->session->userdata('username')){
            redirect('login');
        }else if (!$CI->session->userdata('staff_name')){
            redirect('staff');
        } 
    }

?>