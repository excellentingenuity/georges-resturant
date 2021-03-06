<?php

 if (! defined('BASEPATH')) exit('No direct script access allowed');

Class Options extends CI_Controller {
protected $Name = "", $Version = "";
    public function __construct(){
        parent::__construct();
		//echo "inside item constructor <br />";
        $this->load->model('Config_model');
		$this->load->model('Option_model');
		$this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        check_session();
	}
	public function index(){
		$hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Item');
		$this->load->view('partials/header', $hdata);
		$this->load->view('partials/footer', $hdata);
	}
	public function create(){

		$return = FALSE;
		//echo "inside create function <br />";
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[2]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[2]');

		
		if ($this->form_validation->run() !== false) {
			//echo "inside form validation <br />";
			     $post_array = array(
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Cost' => $this->input->post('price')              
             );
			 $return = $this->Option_model->create_option($post_array);
		}
		$hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Create Option');
        $this->load->view('partials/header', $hdata);
        if($return == 1){
            $t_message = array('message'=>'Option Successfully added to the Database.');
            $this->load->view('success_popup', $t_message);
        }
		$this->load->view('create_option');
        $this->load->view('partials/footer', $hdata);
	}
public function edit(){
  	$return = FALSE;
		//echo "inside create function <br />";
		if(isset($_POST['id'])){
			//echo "inside post isset <br />";
			$my_id = $_POST['id'];
			$me = $this->Option_model->get_option($my_id);
			$data = array(
				'id'=>$me->__get('id'),
				'name'=>$me->__get('name'),
				'description'=>$me->__get('description'),
				'price'=>$me->__get('cost_increase')
			);
		}else {
			$data = array(
				'name'=>'',
				'description'=>'',
				'price'=>''
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[2]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[2]');
		
		if ($this->form_validation->run() !== false) {
			echo "inside form validation <br />";
			     $post_array = array(
			     'id'=>$this->input->post('id'),
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Cost' => $this->input->post('price')              
             );
			 $return = $this->Option_model->update_option($post_array);
		}
		
        
        if($return == 1){
            //$t_message = array('message'=>'Item Successfully Saved to the Database.');
            //$this->load->view('success_popup', $t_message);
			redirect('menu', 'menu');
        }else{
		$this->load->view('option/edit_option', $data);
        //echo "hello";
        }
  }
}
?>
	