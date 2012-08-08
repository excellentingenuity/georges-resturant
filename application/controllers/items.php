<?php

// if (! defined('BASEPATH')) exit('No direct script access allowed');

Class Items extends CI_Controller {
protected $Name = "", $Version = "";
    public function __construct(){
        parent::__construct();
		//echo "inside item constructor <br />";
        $this->load->model('Config_model');
		$this->load->model('Item_model');
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
		$this->form_validation->set_rules('prep', 'Prep Time', 'required|min_length[1]');
		
		if ($this->form_validation->run() !== false) {
			//echo "inside form validation <br />";
			     $post_array = array(
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Cost' => $this->input->post('price'),
                'Prep_Time' => $this->input->post('prep')              
             );
			 $return = $this->Item_model->create_item($post_array);
		}
		$hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Create Item');
        $this->load->view('partials/header', $hdata);
        if($return == 1){
            $t_message = array('message'=>'Item Successfully added to the Database.');
            $this->load->view('success_popup', $t_message);
        }
		$this->load->view('create_item');
        $this->load->view('partials/footer', $hdata);
	}
  public function edit(){
  	$return = FALSE;
		//echo "inside create function <br />";
		if(isset($_POST['id'])){
			//echo "inside post isset <br />";
			$my_id = $_POST['id'];
			$me = $this->Item_model->get_item($my_id);
			$data = array(
				'id'=>$me->__get('id'),
				'name'=>$me->__get('name'),
				'description'=>$me->__get('description'),
				'price'=>$me->__get('cost'),
				'prep'=>$me->__get('prep_time')
			);
		}else {
			$data = array(
				'name'=>'',
				'description'=>'',
				'price'=>'',
				'prep'=>''
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[2]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[2]');
		$this->form_validation->set_rules('prep', 'Prep Time', 'required|min_length[1]');
		
		if ($this->form_validation->run() !== false) {
			echo "inside form validation <br />";
			     $post_array = array(
			     'id'=>$this->input->post('id'),
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Cost' => $this->input->post('price'),
                'Prep_Time' => $this->input->post('prep')              
             );
			 $return = $this->Item_model->update_item($post_array);
		}
		
        
        if($return == 1){
            //$t_message = array('message'=>'Item Successfully Saved to the Database.');
            //$this->load->view('success_popup', $t_message);
			redirect('menu', 'menu');
        }else{
		$this->load->view('items/edit_item', $data);
        //echo "hello";
        }
  }
}
?>
	