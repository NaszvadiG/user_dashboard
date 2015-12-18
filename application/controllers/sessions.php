<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("User");
		$this->load->Model("Admin");
	}


	public function new_session() {
		$this->load->view('signin');
	}

	public function create() {
		$result = $this->User->get_user_by_email($this->input->post('email'));
		if (!$result || $result['password'] !== $this->input->post('password') ) {
			$this->session->set_flashdata("error","The email/password combination is not correct");
			redirect("/signin");
		} else {
			$admin = $this->Admin->get_admin_name_by_id($result['admin_id']);
			$this->session->set_userdata('user_id',$result['id']);
			if ($admin['name'] == 'admin') {
				$this->session->set_userdata('user_level','admin');
				redirect("/dashboard/admin");
			} else {
				$this->session->set_userdata('user_level','normal');
				redirect("/dashboard");
			}

		}

	}

	public function destroy() {
		$this->session->sess_destroy();
		redirect("/");
	}

	
}

?>
