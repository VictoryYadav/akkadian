<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {

	
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

		$data['title'] = 'Dashboard';
		$data['login_id'] = authuser()->id;
		$data['training'] = $this->common->getTrainingDetailList($data['login_id']);
		$this->load->view('dashboard', $data);
	}

	

}