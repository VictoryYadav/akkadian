<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Questions extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in')) {
			$this->authuser = $this->session->userdata('logged_in');
		} else {
			redirect(base_url());
		}
		
		$this->load->model('Question_model', 'question');

	}

	public function index(){

		if($this->input->method(true)=='POST'){

			$dd= array();
			foreach ($_POST['questions'] as $question => $row) {
				
				$rowkey = array_keys($row)[0];

				$instData['QNo'] = $_POST['QNo'];
				$instData['QFor'] = $_POST['QFor'];
				$instData['EmailId'] = $_POST['EmailId'];
				$instData['QCd'] = $question;
				switch ($rowkey) {
					
					case 1:
					case 2:
					case 6:
						$instData['QTyp'] = $rowkey;
						$instData['QRespOpt'] = implode(',',$row[$rowkey][1]);
						$instData['QRespDesc'] = '';
						$instData['QRespMulti'] = '';
						break;
					case 3:
					case 4:
						$instData['QTyp'] = $rowkey;
						$instData['QRespOpt'] = '';
						$instData['QRespDesc'] = '';
						$instData['QRespMulti'] = implode(',',$row[$rowkey][1]);
						break;
					case 5:
						$instData['QTyp'] = $rowkey;
						$instData['QRespDesc'] = implode(',',$row[$rowkey][1]);

						$instData['QRespOpt'] = '';
						$instData['QRespMulti'] = '';
					break;
					case 7:
					case 8:
						foreach ($row as $sdc) {
							$res = '';
							foreach ($sdc as $key => $val) {
								$res .= $key."-0-".$val[0].",";
							}
							$instData['QTyp'] = $rowkey;
							$instData['QRespOpt'] = '';
							$instData['QRespDesc'] = '';
							$instData['QRespMulti'] = rtrim($res,",");
						}
					break;
				}

				$dd[] = $instData;
				insertRecord('quesresp',$instData);
			}

		}

		$data['title'] = 'Questions List';
		$data['login_id'] = authuser()->id;
		$data['email'] = authuser()->email;
		$data['ques'] = $this->question->getQuestionList();
		$data['do_subdomain'] = $this->question->getDomainSubdomainList();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('question_list', $data);
	}

}