<?php

 if (! defined('BASEPATH')) exit('No direct script access allowed');

class Meals extends CI_Controller {
    protected $Name = "", $Version = "";
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->model('Meals_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
        $this->load->helper('session_check');
        
        //check_session();
    }
    
    function index(){

        $data['meals'] = $this->Meals_model->load_all_meals();
        echo $data['meals'][1]->__get('title');
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Menu');
        $this->load->view('partials/header', $hdata);
        $this->load->view('menu_index', $data);
        $this->load->view('partials/footer', $hdata);
    }  
    function create() {
        //function to show a form and get the values returned placing them in the database
        
        $return = FALSE;
        $local_categories_list = load_all_objects('Category');
        $local_categories= array();
		$local_items = array();
		$local_options = array();
        foreach ($local_categories_list as $category){
            $local_categories[$category->__get("idCategories")] = $category->__get('Name');
        }
        $local_options_list = load_all_objects('Option');
        $local_items_list = load_all_objects('Item');
        foreach ($local_items_list as $item){
            $local_items[$item->__get("id")] = $item->__get('name');
        }
		foreach ($local_options_list as $option){
			$local_options[$option->__get('id')] = $option->__get('name');
		}
        $data = array('categories' => $local_categories, 'items'=>$local_items, 'options'=>$local_options);
        //form validation
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[2]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[3]');
        $this->form_validation->set_rules('category', 'Category', 'required');
        //$this->form_validation->set_rules('items[]', 'Items', 'required'); 
          //print_r('items are ' .$this->input->post('items'));

		  
         if ($this->form_validation->run() !== false) {
          $t_items = $this->input->post('items');
			 $t_options = $this->input->post('options');
			 //print_r($t_items);

             $post_array = array(
                'Title' => $this->input->post('title'),
                'Description' => $this->input->post('description'),
                'Price' => $this->input->post('price'),
                'Categoryid' => $this->input->post('category'),
                'Items' => $t_items,
                'Options' => $t_options
                //$this->input->post('items[]')               
             );
            $return = $this->Meals_model->create_meal($post_array);
            //return $return;

         }
        
        
        
        $hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Create Meal');
        $this->load->view('partials/header', $hdata);
        if($return == 1){
            $t_message = array('message'=>'Meal Successfully added to the Database.');
            $this->load->view('success_popup', $t_message);
        }
        $this->load->view('create_meal', $data);
        $this->load->view('partials/footer', $hdata);
    }
    function edit() {
   	/*
	 * function to edit a meal
	 * TODo:change the function from the copy and paste version to handle meals
     /*   $return = FALSE;
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
  */
    }
    function delete(){
        
    }

    
}
?>