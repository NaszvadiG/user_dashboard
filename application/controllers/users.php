<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model("User");
		$this->load->Model("Admin");
		$this->load->Model("Message");
		$this->load->Model("Comment");
	}

	public function index() {
		if ($this->session->userdata('user_id')) {
			$users = $this->User->get_all_user_except_id($this->session->userdata('user_id'));
			foreach ($users AS &$user) {
				$user['admin'] = $this->Admin->get_admin_name_by_id($user['admin_id'])['name'];
			}
			$this->load->view("dashboard",array('users'=>$users));
		} else {
			$this->load->view("index");
		}
		
	}



	public function new_user() {
		$this->load->view('register');
	}

	

	public function create() {
		$no_error = true;
		$email = $this->input->post('email');
		if (Empty($email)) {
			$this->session->set_flashdata('email','Email is a required field');
			$no_error = false;
		} else {
			if ($this->User->get_user_by_email($email)) {
				$this->session->set_flashdata('email','This email has already been registered');
				$no_error = false;
			}
		}
		$password = $this->input->post('password');
		if (strlen($password)< 6) {
			$this->session->set_flashdata('password',"Passwords has to be at least 6 characters");
			$no_error = false;
			
		}
		$conf_password = $this->input->post('password_confirm');
		if ($password !== $conf_password) {
			$this->session->set_flashdata('password_conf',"The passwords dont match");
			$no_error = false;
		}
		if ($no_error) {
			if (Empty($this->User->get_all_user())) {
				$this->User->add_user($this->input->post(),$this->Admin->get_admin_id_by_name("admin"));
			} else {
				$this->User->add_user($this->input->post(),$this->Admin->get_admin_id_by_name("normal"));
			}
			if ($this->session->userdata('user_id')) {
				$this->session->set_flashdata('success',"You have successfully add a new User. Now you can go back to the dashboard to check it out");
				redirect("/users/new");
				die();
			}
			$this->session->set_flashdata('success',"You have successfully registered! Now you can sign in <a href='/signin'>Here</a>");
		}
		redirect("/register");
	}

	public function delete($id) {
		$this->User->delete_user_by_id($id);
		redirect("/dashboard/admin");
	}

	public function edit($id) {
		$user = $this->User->get_user_by_id($id);
		$user['user_level'] = $this->Admin->get_admin_name_by_id($user['admin_id'])['name'];
		$this->load->view("edit",$user);
	}

	public function update_info($id) {
		
		if (!Empty($this->input->post('email'))) {
			$user = array('field_value'=>$this->input->post('email'),'id'=>$id);
			$this->User->update_user_email($user);
		}
		if (!Empty($this->input->post('first_name'))) {
			$user = array('field_value'=>$this->input->post('first_name'),'id'=>$id);
			$this->User->update_user_first_name($user);
		}
		if (!Empty($this->input->post('last_name'))) {
			$user = array('field_value'=>$this->input->post('last_name'),'id'=>$id);
			$this->User->update_user_last_name($user);
		}
		$admin_id = $this->Admin->get_admin_id_by_name($this->input->post('user_level'))['id'];
		$user_admin_id = $this->User->get_user_by_id($id)['admin_id'];
		if ($admin_id !== $user_admin_id) {
			$user = array('field_value'=>$admin_id,'id'=>$id);
			$this->User->update_user_level($user);

		}
		if (!Empty($this->input->post('description'))) {
			$user = array('field_value'=>$this->input->post('description'),'id'=>$id);
			$this->User->update_description($user);
		}
		$this->session->set_flashdata('message','User info has been changed');
		if (!Empty($this->input->post("page")) && $this->input->post("page")=='profile') {
			redirect("/users/edit");
		} else {
			redirect("/Users/edit/$id");

		}
		

	}

	public function update_password($id) {
		$pass = $this->input->post('password');
		$conf = $this->input->post('conf_password');

		if ($pass !== $conf) {
			$this->session->set_flashdata('error','passwords need to be matched');
		} else if (strlen($pass) < 6) {
			$this->session->set_flashdata('error','password must be at least 6 characters long');
		} else {
			$user = array('field_value'=>$pass,'id'=>$id);
			$this->User->update_password($user);
			$this->session->set_flashdata('password_message','password has been changed');
		}
		if (!Empty($this->input->post("page")) && $this->input->post("page")=='profile') {
			redirect("/users/edit");
		} else {
			redirect("/Users/edit/$id");

		}
	}

	public function profile() {
		$user = $this->User->get_user_by_id($this->session->userdata['user_id']);
		$this->load->view("profile",$user);

	}

	public function show($id) {
		$user = $this->User->get_user_by_id($id);

		$time = date('F jS Y',strtotime($user['created_at']));
		$messages = $this->Message->get_messages_by_id($id);
		foreach ($messages AS &$message) {
			$comment = $this->Comment->get_comment_by_message_id($message['message_id']);
			$message['comment'] = $comment;
		
		}

		
		$info = array('id'=>$user['id'],'name'=> $user['first_name']." ".$user['last_name'],
				'time'=>$time,
				'email'=>$user['email'],'description'=>$user['description'],'messages'=>$messages);


		$this->load->view("wall",$info);
	}

	


	
}


?>
