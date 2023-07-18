<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Enrollment extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in')) {
			$this->authuser = $this->session->userdata('logged_in');
		} else {
			redirect(base_url());
		}
		
		$this->load->model('Common_model', 'common');


	}

	public function index(){

		$data['title'] = 'Enrollment Detail';
		$data['login_id'] = authuser()->id;
				// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('enrollment', $data);
	}

	

}