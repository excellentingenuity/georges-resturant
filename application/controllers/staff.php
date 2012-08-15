<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Staff extends CI_Controller {
    protected $Name = "", $Version = "";    
    function __construct(){
        parent::__construct();

         
        $this->load->model('Config_model');
        $this->Config_model->load_config();
        $this->load->model('Staff_model');
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        
    }
     
     function index() {
         
         if($this->session->userdata('staff_name')){
             redirect('home');
         }
         
         $this->load->library('form_validation');
         $this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
         $this->form_validation->set_rules('passcode', 'Passcode', 'required|min_length[4]');
         
         if ($this->form_validation->run() !== false) {
            $authen =  $this->Staff_model->authenticate_staff($this->input->post('staff_name'), $this->input->post('passcode'));
                    //echo $authen;
                      if ($authen !== false ){
                            $this->session->set_userdata('staff_name', $this->input->post('staff_name'));
                            $my_perms = $this->Staff_model->get_permission($this->input->post('staff_name'));
                            $this->session->set_userdata('permission_level', $my_perms->permission);
							$myid = $this->Staff_model->get_my_id($this->input->post('staff_name'));
							$this->session->set_userdata('staff_id', $myid);
                            redirect('home');
                 }
         }
         
         $data['all_staff'] = $this->Staff_model->get_staff();
         $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Staff Login');
         $this->load->view('partials/header', $hdata);
         $this->load->view('staff_login', $data);
         $this->load->view('partials/footer', $hdata);
         //else login staff
         ///change to check for config variable first then check session

     }
     public function staff_logout() {
        //only remove staff variable from session
        $this->session->unset_userdata('staff_name');
        redirect('home');
     }
	 public function crud(){
	 	
		 $this->load->library('form_validation');
         $this->form_validation->set_rules('first_name', 'First Name', 'required');
		 $this->form_validation->set_rules('last_name', 'Last Name', 'required');
		 $this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
         $this->form_validation->set_rules('passcode', 'Passcode', 'required|min_length[4]');
		 $this->form_validation->set_rules('permission', 'Permission', 'required');
		 $data = array(
		 	'firstname'=>$this->input->post('first_name'),
			'lastname'=>$this->input->post('last_name'),
			'staff_name'=>$this->input->post('staff_name'),
			'passcode'=>$this->input->post('passcode'),
			'permission'=>$this->input->post('permission'),
		 );
		 if ($this->form_validation->run() !== false) {
			$result = $this->Staff_model->addupdate($data);
		 }
	 	$r = $this->Staff_model->get_all_staff();
		$this->load->model('Permission_model');
		$s = $this->Permission_model->get_permission_list();
	 	$data = array('staff' => $r, 'mypermissions'=>$s);
		$this->fb->log($data);
		 $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Staff Login');
         $this->load->view('partials/header', $hdata);
		 $this->load->view('staff/crud', $data);
         $this->load->view('partials/footer', $hdata);
	 }
	 public function get_member(){
	 	$id;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
	 	$r = $this->Staff_model->get_staff_member($id);
		$p = $this->Staff_model->get_permission_by_id($id);
		$this->fb->log($p);
		$this->fb->log($r);
		$foo = new stdClass();
		foreach ($r as $key=>$value){
			$foo->$key=$value;
		}
		foreach ($p as $key=>$value){
			$foo->$key=$value;
		}
		$return = json_encode($foo);
		
		echo $return;
	 }
 }