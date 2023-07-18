<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Company extends CI_Controller {
	private $table = 'company';
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

		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$company = $_POST;
			insertRecord($this->table,$company);
			$status = "success";
			$response = 'Data Inserted..';
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => $response
		      ));
		     die;
		}

		$data['title'] = 'Company Details';
		$data['companies'] = $this->common->getCompanies();
		$data['country'] = $this->common->getCountry();
		$data['industry'] = $this->common->getIndustry();
		$data['sector'] = $this->common->getSector();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('company', $data);
	}

	public function add_company($cmny_id = null){
		
		if($this->input->method(true)=='POST'){
			$company = $_POST;
			// echo "<pre>";
			// print_r($company);die;

			if(isset($company['Comp_no']) && !empty($company['Comp_no'])){
				
				updateRecord($this->table, $company, array('Comp_no' => $company['Comp_no']));
				$this->session->set_flashdata('success','Data Has been updated.'); 
				redirect(base_url() . 'company', 'refresh');
			}else{
				$company['created_at'] = date('Y-m-d H:i:s');
				$company['created_by'] = authuser()->id;

				$company['partner'] = 1;
				// if vendor
				if(in_array(authuser()->role, array(5,6))){
					$company['partner'] = 5;
				}

				$Comp_cd = '';
				$chckComp = $this->common->checkExistCompName($company['Name']);
				if(!empty($chckComp)){
					$company['Comp_cd'] =  $chckComp['Comp_cd'];
					$Comp_cd = $chckComp['Comp_cd'];
				}

				unset($company['Comp_no']);
				$id = insertRecord($this->table,$company);


				if(empty($Comp_cd)){
					$Comp_cd = $id;
				}
				
				if($id){

					updateRecord($this->table, array('Comp_cd' => $Comp_cd), array('Comp_no' => $id));
					updateRecord('users', array('Comp_cd' => $Comp_cd), array('id' => authuser()->id));
					$this->session->set_userdata('comp', $Comp_cd);
					$this->session->set_flashdata('success','Data Has been Inserted.'); 
					// redirect(base_url() . 'company', 'refresh');
					redirect(base_url() . 'dashboard', 'refresh');
				}else{
					$this->session->set_flashdata('error','Data is not inserted.'); 
				}
			}
		}

		if(!empty($cmny_id)){
			$data['c_data'] = getRecords($this->table, array('Comp_no' => $cmny_id));
		}

		$data['title'] = 'Add New Company';
		$data['country'] = $this->common->getCountry();
		$data['industry'] = $this->common->getIndustry();
		$data['sector'] = $this->common->getSector();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('add_company', $data);	
	}

	public function getCities(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$status = "success";
			$response = $this->common->getCity($_POST['country']);
			// print_r($response);die;
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => $response
		      ));
		     die;
		}
	}

	public function del_company(){
		$status = "error";
    	$response = "Something went wrong! Try again later.";
		if($this->input->method(true)=='POST'){
			$status = "success";
			$response = deleteRecord($this->table, array('Comp_no' => $_POST['cid']));
			header('Content-Type: application/json');
		    echo json_encode(array(
		        'status' => $status,
		        'response' => 'Data has been Deleted.'
		      ));
		     die;
		}
	}

}