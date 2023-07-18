<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Training extends CI_Controller {

	private $table = 'training_related_details';
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

		$data['title'] = 'Training Details';
		$data['training'] = $this->common->getTrainingDetailList();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('training', $data);
	}

	public function addtraining($t_id = null){
		if($this->input->method(true)=='POST'){
			$training = $_POST;
			$training['type'] = json_encode($training['type']); 

			// echo "<pre>";
			// print_r($training);
			// die;
			if(isset($training['gen_info_id']) && !empty($training['gen_info_id'])){
				$training['updated_by'] = !empty($_COOKIE['user_id'])?$_COOKIE['user_id']:0;
				$training['updated_at'] = date('Y-m-d H:i:s'); 
				updateRecord($this->table, $training, array('gen_info_id' => $training['gen_info_id']));
				$this->session->set_flashdata('success','Data Has been updated.'); 
				redirect(base_url() . 'training', 'refresh');
			}else{
				$training['created_by'] = !empty($_COOKIE['user_id'])?$_COOKIE['user_id']:0;
				$training['created_at'] = date('Y-m-d H:i:s'); 
				$tid = insertRecord($this->table, $training);
				if($tid){
					$this->session->set_flashdata('success','Data Has been inserted.'); 
					redirect(base_url() . 'training', 'refresh');
				}else{
					$this->session->set_flashdata('error','Data is not inserted.'); 
				}
			}
			
		}
		if(!empty($t_id)){
			$data['t_data'] = getRecords($this->table, array('training_no' => $t_id));
		}
		$data['title'] = 'Training Lists';
		$data['company'] = $this->common->getCompanyList();
		$data['domain'] = $this->common->getDomain();
		$data['groups'] = $this->common->getGroupLevel();
		$data['training_type'] = $this->common->getTrainingType();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('add_training', $data);
	}

	public function add_training(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$training = $_POST;
			$training['stat'] = 0;
			$training['login_id'] = authuser()->id;
			$training['training_date'] = date('Y-m-d Hi:i:s',strtotime($training['training_date']));
			// echo "<pre>";
			// print_r($training);die;
			insertRecord($this->table,$training);
			$status = "success";
			$response = 'Data Inserted..';
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => $response
		      ));
		     die;
		}
	}

	public function detail($t_id){
		$data['title'] = 'Training Details';
		$data['training'] = $this->common->getTrainingList($t_id);
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('training_details', $data);
	}

	public function get_subdomain(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$status = "success";
			$response = $this->common->getSubDomain($_POST['domain']);
			// print_r($response);die;
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => $response
		      ));
		     die;
		}
	}

	public function get_company_details(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$status = "success";
			$response = $this->common->getCompanyDetail($_POST['company_id']);
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => $response
		      ));
		     die;
		}
	}

	public function del_training(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){

			$status = "success";
			$response = deleteRecord($this->table, array('training_no' => $_POST['tid']));
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => 'Data has been Deleted.'
		      ));
		     die;
		}
	}
	

}