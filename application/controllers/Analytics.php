<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Analytics extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in')) {
			$this->authuser = $this->session->userdata('logged_in');
		} else {
			redirect(base_url());
		}
		
		$this->load->model('Answer_model', 'ans');

	}

	function ceo_hr_map(){

		$n = 0;

		$ceo = $this->db->get_where('quesresp', array('QFor' => 1, 'QTyp' => 2))->result_array();
		$data['ll'] = $data['lm'] = $data['lh'] = $data['ml'] = $data['mm'] = $data['mh'] = $data['hl'] = $data['hm'] = $data['hh'] = [];
		foreach($ceo as $key){

			$hr = $this->db->get_where('quesresp', array('QFor' => 3,'QTyp' => 2,'QCd' => $key['QCd']))->row_array();

			$hr['QRespOpt'] = (!empty($hr) && $hr['QRespOpt'])?$hr['QRespOpt']:0;
			if($key['QRespOpt'] == 1 && $hr['QRespOpt'] == 1){

				$hh = array('question' => $key['QCd'],'color' => 'red','type' =>'High-High');
				array_push($data['hh'], $hh);

			}elseif($key['QRespOpt'] == 1 && $hr['QRespOpt'] == 2){

				$hm = array('question' => $key['QCd'],'color' => 'yellow','type' =>'High-Medium');
				array_push($data['hm'], $hm);

			}elseif($key['QRespOpt'] == 1 && $hr['QRespOpt'] == 3){

				$hl = array('question' => $key['QCd'],'color' => 'green','type' =>'High-Low');
				array_push($data['hl'], $hl);

			}elseif($key['QRespOpt'] == 2 && $hr['QRespOpt'] == 1){

				$mh = array('question' => $key['QCd'],'color' => 'yellow','type' =>'Medium-High');
				array_push($data['mh'], $mh);
				
			}elseif($key['QRespOpt'] == 2 && $hr['QRespOpt'] == 2){

				$mm = array('question' => $key['QCd'],'color' => 'yellow','type' =>'Medium-Medium');
				array_push($data['mm'], $mm);

			}elseif($key['QRespOpt'] == 2 && $hr['QRespOpt'] == 3){

				$ml = array('question' => $key['QCd'],'color' => 'yellow','type' =>'Medium-Low');
				array_push($data['ml'], $ml);

			}elseif($key['QRespOpt'] == 3 && $hr['QRespOpt'] == 1){
				$lh = array('question' => $key['QCd'],'color' => 'green','type' =>'Low-High');
				array_push($data['lh'], $lh);

			}elseif($key['QRespOpt'] == 3 && $hr['QRespOpt'] == 2){
				$lm = array('question' => $key['QCd'],'color' => 'yellow','type' =>'Low-Medium');
				array_push($data['lm'], $lm);

			}elseif($key['QRespOpt'] == 3 && $key['QRespOpt'] == 3){

				$ll = array('question' => $key['QCd'],'color' => 'yellow','type' =>'Low-Low');
				array_push($data['ll'], $ll);

			}

		}

		// echo "<pre>";print_r($data);exit;
		$data['title'] = 'CEO - HR Domain Heatmap';
		$this->load->view('analytics/ques_hml', $data);
	}

	function subdomain_map(){
		$n = 0;

		$ceo = $this->db->get_where('quesresp', array('QFor' => 1, 'QTyp' => 7))->result_array();
		$data['ll'] = $data['lm'] = $data['lh'] = $data['ml'] = $data['mm'] = $data['mh'] = $data['hl'] = $data['hm'] = $data['hh'] = [];
		$heat_data = array();

		$tool = array();

		$n = 0;
		$thr =[];
		foreach($ceo as $key){
			$hr = $this->db->get_where('quesresp', array('QFor' => 3, 'QTyp' => 7, 'QCd' => $key['QCd']))->row_array();
			// print_r($this->db->last_query());exit;
			$t = explode(",", $key['QRespMulti']);
			if(!empty($hr['QRespMulti'])){

			$thr = explode(",", $hr['QRespMulti']);
			}
			$i = 1;
			if(!empty($t)){
				$k = 0;
				foreach($t as $temp){
					$te = explode("-", $temp);
					$sd = $te[0];
					foreach($thr as $temphr){
						$tehr = explode("-", $temphr);
						if($tehr[0] == $sd){
							$sd_details = $this->db->where('SDCd', $sd)->get('domainsub')->row_array();
							if(!empty($sd_details)){
								$domain = $this->db->where('DCd', $sd_details['DCd'])->get('domain')->row_array();
								$i=1;

								$arr = array();

								$arr['name'] = $domain['Domain'];

								$arr['data'] = array();

								if($te['2'] == 1 && $tehr['2'] == 1){

									array_push($arr['data'], array('x' => "", 'y' => 1));

								}elseif($te['2'] == 1 && $tehr['2'] == 2){

									array_push($arr['data'], array('x' => "", 'y' => 2));

								}elseif($te['2'] == 1 && $tehr['2'] == 3){

									array_push($arr['data'], array('x' => "", 'y' => 3));

								}elseif($te['2'] == 2 && $tehr['2'] == 1){

									array_push($arr['data'], array('x' => "", 'y' => 4));

								}elseif($te['2'] == 2 && $tehr['2'] == 2){

									array_push($arr['data'], array('x' => "", 'y' => 5));

								}elseif($te['2'] == 2 && $tehr['2'] == 3){

									array_push($arr['data'], array('x' => "", 'y' => 6));

								}elseif($te['2'] == 3 && $tehr['2'] == 1){

									array_push($arr['data'], array('x' => "", 'y' => 7));

								}elseif($te['2'] == 3 && $tehr['2'] == 2){

									array_push($arr['data'], array('x' => "", 'y' => 8));

								}elseif($te['2'] == 3 && $tehr['2'] == 3){

									array_push($arr['data'], array('x' => "", 'y' => 9));

								}

								$tool[$n][$i-1]['sub_domain'] = $sd_details['SubDomain'];//." - ".intval($te['2']);
								$tool[$n][$i-1]['domain'] = $domain['Domain'];//." - ".intval($te['2']);

								$i++;

								$n++;

								

								array_push($heat_data, $arr);
							}
						}
						$k++;
						
						
					}
				}
			}

		}
		// echo "<pre>";print_r($heat_data);print_r($tool);
		$h_data = $tr = array();
		$n = "";
		$i = 0;
		foreach($heat_data as $key){
			if($key['name'] != $n){
				$n = $key['name'];
				$arr['name'] = $n;
				$arr['data'] = array();
				$in = 0;
				foreach($heat_data as $k => $v){
					// print_r($k);exit;
					if($v['name'] == $n){
						if(!empty($v['data'][0])){
							array_push($arr['data'], $v['data'][0]);
							unset($heat_data[$k]);
						}
					}
				}
				array_push($h_data, $arr);
				$sdr = array();
				foreach($tool as $t){
					
					if($t[0]['domain'] == $n){
						array_push($sdr, $t[0]['sub_domain']);
					}
					
				}
				array_push($tr, $sdr);
			}

		}

		// echo "<pre>";print_r($h_data);print_r($tr);exit;
		$res = array('data' => json_encode($h_data), 'tool' => json_encode($tr));
		$res['title'] = 'Subdomain Heat Map HML';
		$this->load->view('analytics/heat_map', $res);
	}

	public function key_expectation(){
		$data['subdomain'] = $this->ans->getAvgHR();
		$data['title'] = 'HR SubDomain Expectation';
		$data['subdomain_list'] = json_encode($data['subdomain']);
			// echo "<pre>";
			// print_r($data);
			// die;
		$this->load->view('analytics/graph_hr',$data);
	}

	public function key_concerns(){
		$data['title'] = 'EMP SubDomain Expectation';
		$data['subdomain'] = $this->ans->getAvgEmployee();
		$data['subdomain_list'] = json_encode($data['subdomain']);
		$this->load->view('analytics/graph_emp',$data);
	}

	public function hr_emp_analytics2(){
		$data['title'] = 'HR - EMP Analytics';
		$data['subdomain'] = $this->ans->getTopRanking();
		$data['subdomain_list'] = json_encode($data['subdomain']);
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('analytics/graph_rating',$data);
	}

	public function hr_emp_analytics1(){
		$data['title'] = 'HR - EMP Analytics';
		$data['subdomain'] = $this->ans->getTopRanking1();
		$data['subdomain_list'] = json_encode($data['subdomain']);
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('analytics/hr_emp_analytics',$data);
	}

	public function hr_emp_analytics(){
		$data['title'] = 'SubDomain Gap Analytics';
		$data['subdomain'] = $this->ans->getTop3SubdomainByDomainWise();

		$this->load->view('analytics/hr_emp_analytics2',$data);
	}

	public function gap_analysis(){
		$data['title'] = 'Domain Gap Analysis';
		$data['subdomain'] = $this->ans->getGapAnalysis();
		$data['subdomain_list'] = json_encode($data['subdomain']);
		$this->load->view('analytics/graph_line',$data);
	}

	public function temp(){

		$dd = array(
			array('sum_domain' => 1, 'rat' => 6),
			array('sum_domain' => 1, 'rat' => 6),
			array('sum_domain' => 1, 'rat' => 6),
			array('sum_domain' => 2, 'rat' => 7),
			array('sum_domain' => 2, 'rat' => 7),
			array('sum_domain' => 2, 'rat' => 7)
		);

		$pp =[];
		for ($i=1; $i <= 2 ; $i++) { 
			
			$rat[$i] = 0;
			foreach ($dd as $key) {
				if($key['sum_domain'] == $i){
					$rat[$i] = $rat[$i] + $key['rat'];
					$ll[$i]['sum_domain'] = $key['sum_domain'];
					$ll[$i]['rat'] = $rat[$i];

				}

			}
				
		}
				$pp[] = $ll;

		print_r($pp);
		die;
	}

	

}