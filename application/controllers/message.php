<?php 
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Message controller to access the message model
*  Version 1.0
*/
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Message extends CI_Controller {
    function __construct(){
    parent::__construct();
	$this->load->model('Message_model');
	}
	public function get_messages(){
		$id;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$this->fb->log("message id is $id");
		}
		//get messages from the message model by id and return them
		$data = $this->Message_model->get_messages($id);
		$this->fb->log($data);
		$message_html = "";
		if($data != ""){
			foreach($data as $row){
				$message_html .= "<p id='".$row['messageid'] ."' class='my_message'>" . $row['message'] . "</p>";
			}
			$this->fb->log($message_html);	
		}	
			print $message_html;
	}
	public function mark_read(){
		$id;
		$return;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$this->fb->log("message id is $id");
			$return = $this->Message_model->mark_read($id);
		}
		return $return;
	}
}