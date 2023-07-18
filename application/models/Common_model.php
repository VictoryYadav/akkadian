<?php
	/**
	 * 
	 */
	class Common_model extends CI_Model
	{

		function __construct()
	    {
	        parent::__construct();
	    }

	    public function checkUserLogin($data){
			$this->db->select('*')
				->from('users')
				->group_start() 
					->where('email', $data['email'])
					->or_where('mobile',$data['email'])
				->group_end()
				->where('password', $data['password']);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}	
		}

	    public function recordInsert($tbl,$data){
			$this->db->insert($tbl,$data);
			return $this->db->insert_id();
		}

		public function recordUpdate($tbl,$data,$where){
			$this->db->update($tbl, $data, $where);
		}

		public function recordDelete($tbl,$where){
			$this->db->delete($tbl,$where);
		}

		public function getAllRecord($tbl=null,$where=null){
			if(!empty($where)){
				return $this->db->order_by("created_at", "desc")->get_where($tbl,$where)->row_array();
			}
			return $this->db->order_by("created_at", "desc")->get($tbl)->result_array();
		}


	    function getCompanies(){
	    	if(authuser()->role < 5 && in_array(authuser()->role, array(5,6))){
	    		$this->db->where('com.created_by', authuser()->id);
	    	}
	    	return $this->db->select('com.*, con.country_name, city.city_name, ins.Name as insName, sec.Name as secName')
	    					->join('countries con', 'con.phone_code = com.HOCountryCd', 'inner')
	    					->join('city', 'city.city_id = com.HOCityCd', 'inner')
	    					->join('mst ins', 'ins.MCd = com.industry', 'inner')
	    					->join('mst sec', 'sec.MCd = com.sector', 'inner')
	    					->get('company com')->result_array();
	    }

	    function getCountry(){
			return  $this->db->select('phone_code,country_name')->get('countries')->result_array();
		}

		function getCity($phone_code){
			$country = $this->db->select('id')->get_where('countries', array('phone_code' => $phone_code))->row_array();

			return $this->db->select('city_id,city_name')
			->get_where('city', array('country_id' => $country['id'], 'status' => 0))
			->result_array();
		}

		function getIndustry(){
			return  $this->db->select('MCd,Name')->get_where('mst', array('MTyp' => 21, 'stat' => 0))->result_array();
		}

		function getSector(){
			return  $this->db->select('MCd,Name')->get_where('mst', array('MTyp' => 22, 'stat' => 0))->result_array();
		}

		function getCompanyList(){
			return  $this->db->select('CompCd,Name')->get('company')->result_array();	
		}

		function getDomain(){
			return  $this->db->select('DCd,Domain')->get('domain')->result_array();	
		}

		function getGroupLevel(){
			return  $this->db->select('level_id,level_name')->get_where('levels_mst', array('status' => 0))->result_array();	
		}

		function getTrainingType(){
			return  $this->db->select('tt_id,tt_name')->get_where('tt_mst', array('status' => 0))->result_array();	
		}

		function getSubDomain($domain){
			return  $this->db->select('SDCd,SubDomain')->get_where('domainsub', array('DCd' => $domain))->result_array();	
		}

		function getCompanyDetail($companyId){
			return $this->db->select('com.*, con.country_name, city.city_name, ins.Name as insName, sec.Name as secName')
	    					->join('countries con', 'con.phone_code = com.HOCountryCd', 'inner')
	    					->join('city', 'city.city_id = com.HOCityCd', 'inner')
	    					->join('mst ins', 'ins.MCd = com.industry', 'inner')
	    					->join('mst sec', 'sec.MCd = com.sector', 'inner')
	    					->get_where('company com', array('CompCd' => $companyId))->row_array();
		}

		function getTrainingDetailList($login_id){
			if(authuser()->role < 5 ){
				$this->db->where('trd.login_id' , $login_id);
			}

			if(in_array(authuser()->role, array(5,6))){
				// $this->db->where('comp.Comp_cd' , authuser()->comp);
				$this->db->where('trd.Comp_cd' , authuser()->comp);
			}
			
			return $this->db->select('trd.*, , c.CourseName, c.link_file_path,c.CourseId, tt_name, lang_name, comp.Name')
					->group_by('c.CourseId')
					->join('courses c', 'c.CourseId = trd.courseId', 'inner')
					->join('company comp', 'comp.Comp_cd = c.Comp_cd', 'inner')
					->join('ctypdet cTyp', 'cTyp.courseId = c.courseId', 'inner')
                    ->join('clngdet clng', 'clng.courseId = c.courseId', 'inner')
                    ->join('tt_mst', 'tt_mst.tt_id = cTyp.TypId' ,'inner')
                    ->join('langs', 'langs.lang_id = clng.LngId' ,'inner')
					->get('training_related_details trd')
					->result_array();
		}

		public function getTrainingList($t_id){
			$data =  $this->db->select('trd.*, com.Name as companyName,con.country_name, city.city_name,ins.Name as insName, sec.Name as secName,courses.CourseName')
			// domain.Domain, domainsub.SubDomain,  ul.level_name
					->join('company com', 'com.Comp_cd = trd.Comp_cd', 'inner')
					->join('countries con', 'con.phone_code = com.HOCountryCd', 'inner')
	    			->join('city', 'city.city_id = com.HOCityCd', 'inner')
	    			->join('mst ins', 'ins.MCd = com.industry', 'inner')
	    			->join('mst sec', 'sec.MCd = com.sector', 'inner')
	    			->join('courses', 'courses.CourseId = trd.courseId', 'inner')
	    			// ->join('domain', 'domain.DCd = trd.domain', 'inner')
	    			// ->join('domainsub', 'domainsub.SDCd = trd.sub_domain', 'inner')
	    			// ->join('levels_mst ul','ul.level_id = trd.group_level', 'inner')
					->get_where('training_related_details trd', array('training_no' => $t_id))
					->row_array();
					
					$data['training_type'] = '';
					$type = !empty($data['type'])?json_decode($data['type']):array(0);
					if(!empty($type)){
						$data['training_type'] = $this->getTrainingTypeById($type);
					}
				return $data;
					
		}

		private function getTrainingTypeById($type){
			 $res = $this->db->select('tt_id,tt_name')->where_in('tt_id', $type)->get('tt_mst')->result_array();
			$dd = '';
			foreach ($res as $key) {
				$dd .= $key['tt_name'].", ";
			}
			return $dd;
		}

		function get_by_email($email)
		{
			return $this->db->get_where('users', array('email' => $email))->row();
		}

		function get_by_contactno($no)
		{
			return $this->db->get_where('users', array('mobile' => $no))->row();
		}

		function checkFirstTimeUser($userId){
			return $this->db->get_where('users', array('Comp_cd' => 0,'id' => $userId))->row();
		}

		function getLanguageList(){
			return $this->db->get_where('langs', array('status' => 0))->result_array();
		}

		function getVendorsList_old(){
			return $this->db->get_where('vendors', array('status' => 0))->result_array();
		}

		function getVendorsList(){
			return $this->db->select('Comp_no,Comp_cd,Name')->get_where('company', array('partner' => 5))->result_array();
		}

		function getTopicList(){
			return $this->db->get_where('topics', array('Stat' => 0))->result_array();		
		}

		function checkExistCompName($name){
			return $this->db->get_where('company', array('name' => $name))->row_array();		
		}



		

	}