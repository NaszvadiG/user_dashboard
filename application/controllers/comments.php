<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Comments extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->Model("Comment");
		}
		public function create() {
			$comment = array('content'=>$this->input->get('content'),
				'user_id'=>$this->session->userdata('user_id'),
				'message_id'=>$this->input->get('id'));
			$this->Comment->write_comment($comment);
			

		}







	}



?>