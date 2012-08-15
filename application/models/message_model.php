<?php
/*
 * Message Class for the message object
 * Created by James Johnson of Excellent InGenuity LLC 2012
 * 
 */
Class Message_model extends CI_Model {
	
	
	function __construct() {
        parent::__construct();
    }
	public function get_messages($id){
		$messages = array();
		$this->db->where('to', $id);
		$this->db->where('read', 0);
		$result = $this->db->get('Messages');
		if($result->num_rows > 0){
			foreach($result->result() as $row){
				$message = array(
					'messageid'=>$row->idMessages,
					'message'=>$row->message
				);
			array_push($messages, $message);
			}
		return $messages;
		}
	}
	public function send_message($id, $mymessage){
		$mydata = array('to'=>$id,
			'message'=>$mymessage
		);
		$return = $this->db->insert('Messages', $mydata);
		return $return;
		
	}
	public function mark_read($id){
		if($id != Null || $id != ''){
			$mdata = array('read'=>1);
			$this->db->where('idMessages', $id);
			$return = $this->db->update('Messages', $mdata, FALSE);
			return $return;
		}
	}
}