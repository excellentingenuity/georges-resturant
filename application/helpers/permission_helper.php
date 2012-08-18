<?php
    function check_permission() {
        $CI =& get_instance();
        $myperm = $CI->session->userdata('permission_level');
		switch ($myperm){
			case 777:
				
			break;
			
			case 666:
				
			break;
			
			case 555:
				redirect('order/all_orders');
			break;
			case 444:
				redirect('order/kitchen');
			break;
			case 333:
				redirect('order');
			break;
			default:
				redirect('order');
			break;
		}
     
    }
	    function check_page_permission($page_permission) {
        $CI =& get_instance();
        $myperm = $CI->session->userdata('permission_level');
		$CI->fb->log($myperm);
		$CI->fb->log($page_permission);
		if($myperm <= $page_permission){
			switch ($myperm){
				case 777:
					
				break;
				
				case 666:
					
				break;
				
				case 555:
					redirect('order/all_orders');
				break;
				case 444:
					redirect('order/kitchen');
				break;
				case 333:
					redirect('order');
				break;
				default:
					redirect('order');
				break;
			}
		}
     
    }

?>