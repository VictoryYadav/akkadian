<?php

class Answer_model extends CI_Model
{

 	function getAvgHR(){
 		$top_subdomain = [];

 		$qno = 1;
 		$qcd = 17;
 		$data =  $this->db->get_where('quesresp', array('QTyp' => 8, 'QFor' => 3, 'QNo' => $qno, 'QCd' => $qcd))->result_array();
// echo "<pre>";
// 				print_r($data);
// 				die;
 		if(!empty($data)){

 			$domain =[];
 			$total_hr = sizeof($data);
 			foreach ($data as $key) {
 				$list = explode(",",$key['QRespMulti']);

 				if(!empty($list)){
 					$sub_list = array();
 					
 					foreach ($list as $ll) {
 						$res = explode("-", $ll);
 						$sub['sum_domain'] = $res[0];
 						$sub['subsub'] = $res[1];
 						$sub['rating'] = $res[2];
 						
 						$sub_list[] = $sub;
 						array_push($domain,$sub);
 						
 					}
 				}
 			}

 			if(!empty($domain)){

				$result = array();

				$sum_domain = array_column($domain, 'sum_domain');
				$rating  = array_column($domain, 'rating');

				$unique_names = array_unique($sum_domain);

				foreach ($unique_names as $name)
				{
				    $this_keys = array_keys($sum_domain, $name);
				    $rat = array_sum(array_intersect_key($rating, array_combine($this_keys, $this_keys)));
				    $result[] = array("sum_domain"=>$name,"rating"=>$rat);
				}
				
				// echo "<pre>";
				// print_r($result);
				// die;
				 array_multisort(array_column($result, 'rating'), SORT_DESC, $result);
				$top_subdomain1= array_slice($result, 0, 10);

				// echo "<pre>";
				// print_r($top_subdomain1);
				// die;
				$domain_list = array(array("Element", "Average", array("role" => "style" )));
				$count = 1;
				foreach ($top_subdomain1 as &$row) {
					$row['name'] =  $this->getSubdomainName($row['sum_domain']);
					$row['average'] = round($row['rating'] / $total_hr);
					switch ($count) {
						case 1:
						$color ='#F44336';
						break;
						case 2:
						$color ='#BA68C8';
						break;
						case 3:
						$color ='#7C4DFF';
						break;
						case 4:
						$color ='#29B6F6';
						break;
						case 5:
						$color ='#00E5FF';
						break;
						case 6:
						$color ='#009688';
						break;
						case 7:
						$color ='#00E676';
						break;
						case 8:
						$color ='#76FF03';
						break;
						case 9:
						$color ='##C6FF00';
						break;
						case 10:
						$color ='##F9A825';
						break;
						
					}
					$domain_list[] = array($row['name'] , $row['average'],$color);
					$count++;
				}

				// echo "<pre>";
				// print_r($domain_list);
				// die;
				
	 		}
				$top_subdomain = $domain_list;


 		}

 		return $top_subdomain; 
 	}

 	function getSubdomainName($sub_id){
 		$val = $this->db->get_where('domainsub', array('SDCd' => $sub_id))->row_array();
 		return $val['SubDomain'];
 	}

 	function getDomainDetail($sub_id){
 		return $this->db->select('domain.*,domainsub.SDCd,domainsub.SubDomain')->join('domain', 'domain.DCd = domainsub.DCd','inner')->get_where('domainsub', array('SDCd' => $sub_id))->row_array();
 	}

 	function getAvgEmployee(){
 		$top_subdomain = [];

 		$qno = 1;
 		$qcd = 17;
 		$data =  $this->db->get_where('quesresp', array('QTyp' => 8, 'QFor' => 4, 'QNo' => $qno, 'QCd' => $qcd))->result_array();

 		if(!empty($data)){

 			$domain =[];
 			$total_hr = sizeof($data);
 			foreach ($data as $key) {
 				$list = explode(",",$key['QRespMulti']);

 				if(!empty($list)){
 					$sub_list = array();
 					
 					foreach ($list as $ll) {
 						$res = explode("-", $ll);
 						$sub['sum_domain'] = $res[0];
 						$sub['subsub'] = $res[1];
 						$sub['rating'] = $res[2];
 						
 						$sub_list[] = $sub;
 						array_push($domain,$sub);
 						
 					}
 				}
 			}

 			if(!empty($domain)){

				$result = array();

				$sum_domain = array_column($domain, 'sum_domain');
				$rating  = array_column($domain, 'rating');

				$unique_names = array_unique($sum_domain);

				foreach ($unique_names as $name)
				{
				    $this_keys = array_keys($sum_domain, $name);
				    $rat = array_sum(array_intersect_key($rating, array_combine($this_keys, $this_keys)));
				    $result[] = array("sum_domain"=>$name,"rating"=>$rat);
				}
				
				 array_multisort(array_column($result, 'rating'), SORT_DESC, $result);
				$top_subdomain1= array_slice($result, 0, 10);

				$domain_list = array(array("Element", "Average", array("role" => "style" )));
				$count = 1;
				foreach ($top_subdomain1 as &$row) {
					$row['name'] =  $this->getSubdomainName($row['sum_domain']);
					$row['average'] = round($row['rating'] / $total_hr);
					switch ($count) {
						case 1:
						$color ='#F44336';
						break;
						case 2:
						$color ='#BA68C8';
						break;
						case 3:
						$color ='#7C4DFF';
						break;
						case 4:
						$color ='#29B6F6';
						break;
						case 5:
						$color ='#00E5FF';
						break;
						case 6:
						$color ='#009688';
						break;
						case 7:
						$color ='#00E676';
						break;
						case 8:
						$color ='#76FF03';
						break;
						case 9:
						$color ='##C6FF00';
						break;
						case 10:
						$color ='##F9A825';
						break;
						
					}
					$domain_list[] = array($row['name'] , $row['average'],$color);
					$count++;
				}

				// echo "<pre>";
				// print_r($domain_list);
				// die;
				
	 		}
				$top_subdomain = $domain_list;


 		}

 		return $top_subdomain; 
 	}

 	function getGapAnalysis(){

 		$hr = $this->avgCalcFor($hr_id=3);
 		$emp = $this->avgCalcFor($emp_id=4);
 		
 		$data = array(array('Domain', 'HR', 'Employee'));
 		foreach ($hr as $h) {
 			foreach ($emp as $e) {
 				if($h['domain_id'] == $e['domain_id']){
 					$data[] = array($h['name'],$h['average'], $e['average']);
 				}
 			}
 		}

 		return $data;
 	}

 	function avgCalcFor($hr){

 		$qno = 1;
 		$qcd = 17;
 		$data =  $this->db->get_where('quesresp', array('QTyp' => 8, 'QFor' => $hr, 'QNo' => $qno, 'QCd' => $qcd))->result_array();

 		if(!empty($data)){

 			$domain =[];
 			$total = sizeof($data);
 			foreach ($data as $key) {
 				$list = explode(",",$key['QRespMulti']);

 				if(!empty($list)){
 					$sub_list = array();
 					
 					foreach ($list as $ll) {
 						$res = explode("-", $ll);
 						$sub['sum_domain'] = $res[0];
 						$sub['subsub'] = $res[1];
 						$sub['rating'] = $res[2];

 						$domains = $this->getDomainDetail($res[0]);
 						$sub['domain_id'] = $domains['DCd'];
 						$sub['domain_name'] = $domains['Domain'];
 						
 						$sub_list[] = $sub;
 						array_push($domain,$sub);
 						
 					}
 				}
 			}

 			if(!empty($domain)){

				$result = array();

				$domain_id = array_column($domain, 'domain_id');
				$rating  = array_column($domain, 'rating');

				$unique_names = array_unique($domain_id);

				foreach ($unique_names as $name)
				{
				    $this_keys = array_keys($domain_id, $name);
				    $rat = array_sum(array_intersect_key($rating, array_combine($this_keys, $this_keys)));
				    $result[] = array("domain_id"=>$name,"rating"=>$rat);
				}
				 
				foreach ($result as &$row) {
					$row['name'] =  $this->getDomainName($row['domain_id']);
					$row['average'] = round($row['rating'] / $total);
					
				}
				$top_subdomain = $result;
	 		}

 		}

 		return $top_subdomain; 
 	}

 	function getDomainName($DCd){
 		$data = $this->db->get_where('domain', array('DCd' => $DCd))->row_array();
 		return $data['Domain'];
 	}

 	function getTopRanking(){
 		$hr = $this->avgCalcForSubdomain($hr_id=3);
 		$emp = $this->avgCalcForSubdomain($emp_id=4);
 		// echo "<pre>";
 		// print_r($hr);
 		// echo "br-------";
 		// print_r($emp);
 		// die;

 		


 		$data = array(array('Domain','sub-1','sub-2','sub-3', 'sub-1','sub-2','sub-3'));
 		$header =[];
 		foreach ($hr as $h) {
 			foreach ($emp as $e) {
 				if($h['domain_id'] == $e['domain_id']){
 					// $header[] = array('Domain', $h['data'][0]['SubDomain'],
 					// 	$h['data'][1]['SubDomain'],
 					// 	$h['data'][2]['SubDomain'],
 					// 	$e['data'][0]['SubDomain'],
 					// 	$e['data'][1]['SubDomain'],
 					// 	$e['data'][2]['SubDomain']);

 					$data[] = array(
 						$h['data'][0]['Domain'],
 						$h['data'][0]['avg'],
 						$h['data'][1]['avg'],
 						$h['data'][2]['avg'],
 						$e['data'][0]['avg'],
 						$e['data'][1]['avg'],
 						$e['data'][2]['avg'] );
 				}
 			}
 		}

 		// echo "<pre>";
 		// print_r($data);
 		// print_r($header);
 		// die;

 		return $data;
 	}

 	function getTopRanking1(){
 		$hr = $this->avgCalcForSubdomain($hr_id=3);
 		$emp = $this->avgCalcForSubdomain($emp_id=4);
 		
 		$h = $h2 = $h3 = $e = $e2 = $e3 = array();
 		$c=0;
 		for($k = 0;$k<3;$k++){
 			print_r($k);
	 		for($i = 0;$i<sizeof($hr);$i++){
	 			if($c == 0){
		 			array_push($h, $hr[$i]['data'][$k]['avg']);
		 			array_push($e, $emp[$i]['data'][$k]['avg']);
		 		}
		 		if($c == 1){
		 			array_push($h2, $hr[$i]['data'][$k]['avg']);
		 			array_push($e2, $emp[$i]['data'][$k]['avg']);
		 		}
		 		if($c == 2){
		 			array_push($h3, $hr[$i]['data'][$k]['avg']);
		 			array_push($e3, $emp[$i]['data'][$k]['avg']);
		 		}
	 			
	 		}
	 		$c++;

	 	}

	 	$data = array(
	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $h, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "green"
 	 					),
 	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $h2, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "green"
 	 					),
 	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $h3, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "green"
 	 						),
 	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $e, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "red"
 	 					),
 	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $e2, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "red"
 	 					),
 	 					array(
	 					"label" => "Subdomain :",
	 					"data" => $e3, 
	 					"borderWidth" => 1,
	 					"backgroundColor" => "red"
 	 					)
 	 				);
 		
 		return $data;
 	}

 	function getTop3SubdomainByDomainWise(){
 		$hr = $this->avgCalcForSubdomain($hr_id=3);
 		$emp = $this->avgCalcForSubdomain($emp_id=4);

 		$data = array();
 		foreach ($hr as $h) {
 			foreach ($emp as $e) {
 				if($h['domain_id'] == $e['domain_id']){
 					$dd = array('domain' => $h['data'][0]['Domain'],
 							array('sub_domain' => $h['data'][0]['SubDomain'], 'avg' => $h['data'][0]['avg'] ),
 							array('sub_domain' => $h['data'][1]['SubDomain'], 'avg' => $h['data'][1]['avg'] ),
 							array('sub_domain' => $h['data'][2]['SubDomain'], 'avg' => $h['data'][2]['avg'] ),
 							array('sub_domain' => $e['data'][0]['SubDomain'], 'avg' => $e['data'][0]['avg'] ),
 							array('sub_domain' => $e['data'][1]['SubDomain'], 'avg' => $e['data'][1]['avg'] ),
 							array('sub_domain' => $e['data'][2]['SubDomain'], 'avg' => $e['data'][2]['avg'] ) 
 							);
 					$data[] = $dd;
 				}
 			}
 		}

 		return $data;
 		
 	}

 	function avgCalcForSubdomain($hr){

 		$qno = 1;
 		$qcd = 17;
 		$data =  $this->db->get_where('quesresp', array('QTyp' => 8, 'QFor' => $hr, 'QNo' => $qno, 'QCd' => $qcd))->result_array();

 		if(!empty($data)){

 			$domain =[];
 			$total = sizeof($data);
 			foreach ($data as $key) {
 				$list = explode(",",$key['QRespMulti']);

 				if(!empty($list)){
 					$sub_list = array();
 					
 					foreach ($list as $ll) {
 						$res = explode("-", $ll);
 						$sub['sum_domain'] = $res[0];
 						$sub['subsub'] = $res[1];
 						$sub['rating'] = $res[2];

 						$domains = $this->getDomainDetail($res[0]);
 						$sub['domain_id'] = $domains['DCd'];
 						$sub['Domain'] = $domains['Domain'];
 						$sub['SubDomain'] = $domains['SubDomain'];

 						$sub_list[] = $sub;
 						array_push($domain,$sub);
 						
 					}
 				}
 			}

 			if(!empty($domain)){

				$result = array();

				$domain_id = array_column($domain, 'domain_id');
				$rating  = array_column($domain, 'rating');
				$sum_domain = array_column($domain, 'sum_domain');

				$unique_domain = array_unique($domain_id);
				$unique_subdomain = array_unique($sum_domain);

				$domain_data =[];
				$ll=[];
				foreach ($unique_subdomain as $do) { 
					
					$rat[$do] = 0;
					foreach ($domain as $key) {
						if($key['sum_domain'] == $do){
							$rat[$do] = $rat[$do] + $key['rating'];
							$ll[$do]['sum_domain'] = $key['sum_domain'];
							$ll[$do]['domain_id'] = $key['domain_id'];
							$ll[$do]['Domain'] = $key['Domain'];
							$ll[$do]['SubDomain'] = $key['SubDomain'];
							$ll[$do]['rating'] = $rat[$do];
							$ll[$do]['avg'] =round( $rat[$do] / $total );

						}

					}
						
				}
				$domain_data[] = $ll;

				$h_data = $tr = array();
				$n = "";
				$i = 0;
				foreach($domain_data[0] as $key){
					if($key['domain_id'] != $n){
						$n = $key['domain_id'];
						$arr['domain_id'] = $n;
						$arr['data'] = array();
						$in = 0;
						foreach($domain_data[0] as $k => $v){
							// print_r($k);exit;
							if($v['domain_id'] == $n){
								if(!empty($v)){
									array_push($arr['data'], $v);
									unset($domain_data[0][$k]);
								}
							}
						}
						array_push($h_data, $arr);

					}

				}

				$d_list = [];
				foreach ($h_data as $key) {
					$key_values = array_column($key['data'], 'rating'); 
					array_multisort($key_values, SORT_DESC, $key['data']);
					$d_list[] = $key['data'][0];
					$d_list[] = $key['data'][1];
					$d_list[] = $key['data'][2];
				}

				// arrange domain wise

				$filter_data = array();
				$n = "";
				foreach($d_list as $key){
					if($key['domain_id'] != $n){
						$n = $key['domain_id'];
						$arr['domain_id'] = $n;
						$arr['data'] = array();
						$in = 0;
						foreach($d_list as $k => $v){
							// print_r($k);exit;
							if($v['domain_id'] == $n){
								if(!empty($v)){
									array_push($arr['data'], $v);
									unset($d_list[$k]);
								}
							}
						}
						array_push($filter_data, $arr);

					}

				}
				
	 		}
				$top_subdomain = $filter_data;


 		}

 		return $top_subdomain; 
 	}

}

?>

