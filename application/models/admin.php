<?php
	class Admin extends CI_Model {

		function __construct() {
			parent::__construct();
			if (Empty($this->get_admin_id_by_name("admin"))) {
				$this->add("admin");

			}
			if (Empty($this->get_admin_id_by_name("normal"))) {
				$this->add("normal");
			}
		}
		


		function add($admin) {
			$query = "INSERT INTO admin(name) VALUES(?)";
			$values = array($admin);
			return $this->db->query($query,$values);
		}

		function get_admin_id_by_name($name) {
			return $this->db->query("SELECT id FROM admin WHERE name =?",array($name))->row_array();
		}

		function get_admin_name_by_id($id) {
			return $this->db->query("SELECT name FROM admin WHERE id=?", array($id))->row_array();
		}






	}










?>