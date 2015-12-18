<?php
	class Comment extends CI_Model {
		function write_comment($comment) {
     		$query = "INSERT INTO comments(content,created_at,user_id,message_id)
     		VALUES(?,?,?,?)";
     		$values = array($comment['content'],date("Y-m-d H:i:s"),$comment['user_id'],$comment['message_id']);
			return $this->db->query($query,$values);
     	}


     	function get_comment_by_message_id($id) {
     		$query = "SELECT CONCAT(users.first_name,' ',users.last_name) AS name,comments.content,comments.created_at
     		FROM comments JOIN messages ON comments.message_id = messages.id
     		JOIN users ON comments.user_id = users.id WHERE messages.id=?";
     		$values = array($id);
     		return $this->db->query($query,$values)->result_array();

     	}
	}













?>