<?php
     class Message extends CI_Model {
     	function write_message($message) {
     		$query="INSERT INTO messages(content,created_at,user_id,writer_id)
     		VALUES (?,?,?,?)";
     		$values= array($message['content'],date("Y-m-d H:i:s"),$message['id'],
     			$this->session->userdata('user_id'));
     		return $this->db->query($query,$values);
     	}



     	function get_messages_by_id($id) {
     		$query = "SELECT messages.id AS message_id,messages.writer_id,CONCAT(users.first_name,' ',users.last_name) AS name, messages.content
     		FROM messages JOIN users ON users.id = messages.writer_id WHERE messages.user_id=?";
     		$values = array($id);
     		return $this->db->query($query,$values)->result_array();

     	}

   






     }









?>