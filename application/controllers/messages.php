<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Messages extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->Model("Message");
		}
		public function create($id) {
			$message = array('id'=>$id,'content'=>$this->input->post('content'));
			$this->Message->write_message($message);
			$this->session->set_flashdata('success','message has been post!');
			
			redirect("/show/$id");

		}







	}



?>