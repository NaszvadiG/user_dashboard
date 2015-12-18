<?php
	class User extends CI_Model {


		function get_all_user() {
			return $this->db->query("SELECT * FROM users")->result_array();
		}
		function add_user($user,$admin) {
			$query = "INSERT INTO users(first_name,last_name,email,
				password,created_at,admin_id) VALUES(?,?,?,?,?,?)";
			$values = array($user['first_name'],$user['last_name'],
				$user['email'],$user['password'],date("Y-m-d, H:i:s"),$admin['id']);
			return $this->db->query($query,$values);
		}

		function get_user_by_email($email) {
			$query = "SELECT * FROM users WHERE email=?";
			$values = array($email);
			return $this->db->query($query,$values)->row_array();
		}

		function get_user_by_id($id) {
			return $this->db->query("SELECT * FROM users WHERE id=?",array($id))->row_array();
		}

		function get_all_user_except_id($id) {
			$query = "SELECT * FROM users WHERE id!=?";
			$values = array($id);
			return $this->db->query($query,$values)->result_array();
		}

		function delete_user_by_id($id) {
			$query = "DELETE FROM users WHERE id=?";
			$values = array($id);
			return $this->db->query($query,$values);
		}

		function update_user_email($user) {
			$query = "UPDATE users SET email=? WHERE id=?";
			$values=array($user['field_value'],$user['id']);
			return $this->db->query($query,$values);
		}

		function update_user_first_name($user) {
			$query = "UPDATE users SET first_name=? WHERE id=?";
			$values=array($user['field_value'],$user['id']);
			return $this->db->query($query,$values);
		}
		function update_user_last_name($user) {
			$query = "UPDATE users SET last_name=? WHERE id=?";
			$values=array($user['field_value'],$user['id']);
			return $this->db->query($query,$values);
		}
		function update_user_level($user) {
			$query = "UPDATE users SET admin_id=? WHERE id=?";
			$values=array($user['field_value'],$user['id']);
			return $this->db->query($query,$values);
		}
		function update_password($user) {
			$query = "UPDATE users SET password=? WHERE id=?";
			$values = array($user['field_value'],$user['id']);
			return $this->db->query($query,$values);
		}

		function update_description($user) {
			return $this->db->query("UPDATE users SET description=? WHERE id=?",
				array($user['field_value'],$user['id']));
		}











	}












?>