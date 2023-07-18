<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->load->library('grocery_Crud');
	}
	function check_login(){
		if(!empty($_COOKIE['user_id'])){
			return $_COOKIE['user_id'];
		}else{
			redirect(base_url().'login');
		}
	}
	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	function register(){
		if($_POST){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required', array(
                'required'      => 'You have not provided %s.'
        		));
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        		));
			if($this->form_validation->run()){
				$data['name'] = $_POST['name'];
				$data['email'] = $_POST['email'];
				$data['password'] = md5($_POST['password']);
				$this->db->insert('users', $data);
				redirect(base_url().'home/login');
			}
		}
		$this->load->view('register');
	}
	function login(){
		if(!empty($_COOKIE['user_id'])){
			// redirect(base_url().'home/add_data');
		}
		if($_POST){
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			
			$check = $this->db->where('email', $email)->where('password', $password)->get('users')->row_array();
			if(!empty($check)){
				set_cookie('user_id', $check['id'], 3600*24*365);
				set_cookie('name', $check['name'], 3600*24*365);
				redirect(base_url().'home/general_info');
			}else{
				$_SESSION['login_error'] = 1;
			}
		}
		$this->load->view('login');
	}
	function logout(){
		delete_cookie('user_id');
		delete_cookie('email');
		redirect(base_url().'home/login');
	}
	public function index()

	{

		$this->load->view('index');
		// $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

	}

	function not_found(){

		$this->load->view('not_found');

	}



	function heat_data(){

		$data = $this->db->query("SELECT d.Domain,sd.SubDomain, chd.SDCd, chd.HML as hrHML, ced.HML as CEOHML FROM comphrdet chd, compceodet ced, domain d, domainsub sd WHERE chd.CCNo=ced.CCNo and ced.CCNo=1 and chd.SDCd=ced.SDCd and sd.SDCd=chd.SDCd and d.DCd=sd.DCd ORDER by sd.DCd, sd.SDCd")->result_array();

		$heat_data = array();

		$catg = array();

		$domain = $this->db->get('domain')->result_array();

		$tool = array();

		$n = 0;

		foreach($domain as $d){

			$data = $this->db->query("SELECT d.Domain,sd.SubDomain, chd.SDCd, chd.HML as hrHML, ced.HML as CEOHML FROM comphrdet chd, compceodet ced, domain d, domainsub sd WHERE chd.CCNo=ced.CCNo and ced.CCNo=1 and chd.SDCd=ced.SDCd and sd.SDCd=chd.SDCd and d.DCd=sd.DCd and d.DCd=".$d['DCd']." ORDER by sd.DCd, sd.SDCd")->result_array();

			$i=1;

			$arr = array();

			$arr['name'] = $d['Domain'];

			$arr['data'] = array();

			foreach($data as $key){

				if($key['CEOHML'] == 1 && $key['hrHML'] == 1){

					array_push($arr['data'], array('x' => "", 'y' => 1));

				}elseif($key['CEOHML'] == 1 && $key['hrHML'] == 2){

					array_push($arr['data'], array('x' => "", 'y' => 2));

				}elseif($key['CEOHML'] == 1 && $key['hrHML'] == 3){

					array_push($arr['data'], array('x' => "", 'y' => 3));

				}elseif($key['CEOHML'] == 2 && $key['hrHML'] == 1){

					array_push($arr['data'], array('x' => "", 'y' => 4));

				}elseif($key['CEOHML'] == 2 && $key['hrHML'] == 2){

					array_push($arr['data'], array('x' => "", 'y' => 5));

				}elseif($key['CEOHML'] == 2 && $key['hrHML'] == 3){

					array_push($arr['data'], array('x' => "", 'y' => 6));

				}elseif($key['CEOHML'] == 3 && $key['hrHML'] == 1){

					array_push($arr['data'], array('x' => "", 'y' => 7));

				}elseif($key['CEOHML'] == 3 && $key['hrHML'] == 2){

					array_push($arr['data'], array('x' => "", 'y' => 8));

				}elseif($key['CEOHML'] == 3 && $key['hrHML'] == 3){

					array_push($arr['data'], array('x' => "", 'y' => 9));

				}

				$tool[$n][$i-1] = $key['SubDomain'];//." - ".intval($key['CEOHML']);

				$i++;

			}

			$n++;

			

			array_push($heat_data, $arr);



		}

		$res = array('data' => json_encode($heat_data), 'tool' => json_encode($tool));

		// echo "<pre>";print_r(($res));

		$this->load->view('index2', $res);

	}
	public function _example_output($output = null)
	{
		$this->load->view('grocery_crud.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	

	public function manage_companies()
	{
		$user_id = $this->check_login();
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('company');
			$crud->set_subject('Company');
			$crud->required_fields('Name');
			// $crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function general_info()
	{
		$user_id = $this->check_login();
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('general_info');
		$crud->where('created_by', $user_id);
		$crud->unset_columns('created_at', 'updated_at','created_by');
		$crud->unset_add_fields('created_at', 'updated_at');
		$crud->unset_edit_fields('created_at', 'updated_at');
		$crud->field_type('created_by', 'hidden', $user_id);
		$crud->required_fields('company', 'company_turnover', 'industry_sector');
		// $crud->set_relation('company_id','company','Name');
		// $crud->display_as('officeCode','Office City');
		// $crud->required_fields('lastName');
		$crud->set_subject('General Info');

		// $crud->required_fields('lastName');

		// $crud->set_field_upload('file_url','assets/uploads/files');

		$output = $crud->render();

		$this->_example_output($output);
	}
	public function training_details()
	{
		$user_id = $this->check_login();
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('training_related_details');
		$crud->where('created_by', $user_id);
		$crud->unset_columns('created_at', 'updated_at','created_by');
		$crud->unset_add_fields('created_at', 'updated_at');
		$crud->unset_edit_fields('created_at', 'updated_at');
		$crud->field_type('created_by', 'hidden', $user_id);
		// $crud->set_relation('company_id','company','Name');
		$crud->required_fields('company', 'country', 'location', 'preferred_location', 'domain', 'sub_domain','industry_sector');
		// $crud->display_as('officeCode','Office City');
		$crud->field_type('domain', 'dropdown', $this->getDomain());
		$crud->field_type('sub_domain', 'dropdown', $this->getGetsubdomain());
		$crud->field_type('group_level', 'dropdown', $this->getUserLevel());
		$crud->field_type('type', 'multiselect', $this->getTrainingType());
		
		$crud->set_subject('Training Details');

		// $crud->required_fields('lastName');

		// $crud->set_field_upload('file_url','assets/uploads/files');

		$output = $crud->render();

		$this->_example_output($output);
	}

	function add_data(){
		$user_id = $this->check_login();
		if($_POST){
			// echo "<pre>";print_r($_POST);exit;
			// $ins['created_by'] = $user_id;
			// $ins['company'] = $_POST['company'];
			// $ins['company_turnover'] = $_POST['company_turnover'];
			// $ins['industry_sector'] = $_POST['industry_sector'];
			// $ins['no_of_outlets'] = $_POST['no_of_outlets'];
			// $ins['no_of_units'] = $_POST['no_of_units'];
			// $ins['attrition'] = $_POST['attrition'];
			// $this->db->insert('general_info', $ins);
			// $id = $this->db->insert_id();
			// $td['gen_info_id'] = $id;
			$td['company'] = $_POST['companyy'];
			$td['country'] = $_POST['country'];
			$td['location'] = $_POST['location'];
			$td['preffered_location'] = $_POST['preffered_location'];
			$td['industry'] = $_POST['industry'];
			$td['sector'] = $_POST['sector'];
			$td['domain'] = $_POST['domain'];
			$td['sub_domain'] = $_POST['subdomain'];
			$td['group_size'] = $_POST['group_size'];
			$td['group_level'] = $_POST['group_level'];
			$td['university'] = $_POST['university'];
			$td['course'] = $_POST['course'];
			// $td['topics_to_be_covered'] = $_POST['topics_to_be_covered'];
			$td['preffered_hours'] = $_POST['preffered_hours'];
			$td['type'] = $_POST['type'];
			$this->db->insert('training_related_details', $td);
			redirect(base_url().'home/add_data/');
		}
		$data['countries'] = $this->db->get('countries')->result_array();
		$data['domain'] = $this->db->get('domain')->result_array();
		$data['topics'] = $this->db->get('univcoursesdet')->result_array();
		$data['group_level'] = $this->db->get('group_level')->result_array();
		$this->load->view('add_data', $data);
	}

	function get_subdomain(){
		$id=$_POST['domain'];
		$data = $this->db->where('DCd', $id)->get('domainsub')->result_array();
		$o="<option value=''>Select Subdomain</option>";
		foreach($data as $key){
			$o.="<option value='".$key['SDCd']."'>".$key['SubDomain']."</option>";
		}
		echo ($o);
	}
	
	function edit_data($id){
		$user_id = $this->check_login();
		if($_POST){
			// echo "<pre>";print_r($_POST);exit;
			$td['gen_info_id'] = $id;
			$td['company'] = $_POST['companyy'];
			$td['country'] = $_POST['country'];
			$td['location'] = $_POST['location'];
			$td['preffered_location'] = $_POST['preffered_location'];
			$td['industry'] = $_POST['industry'];
			$td['sector'] = $_POST['sector'];
			$td['domain'] = $_POST['domain'];
			$td['sub_domain'] = $_POST['subdomain'];
			$td['group_size'] = $_POST['group_size'];
			$td['group_level'] = $_POST['group_level'];
			$td['university'] = $_POST['university'];
			$td['course'] = $_POST['course'];
			// $td['topics_to_be_covered'] = $_POST['topics_to_be_covered'];
			$td['preffered_hours'] = $_POST['preffered_hours'];
			$td['type'] = $_POST['type'];
			$this->db->insert('training_related_details', $td);
			// redirect(base_url().'home/edit_data/'.$id);
			redirect(base_url().'home/edit_data/'.$id);
		}
		$data['details'] = $this->db->where('id', $id)->get('general_info')->row_array();
		$data['countries'] = $this->db->get('countries')->result_array();
		$data['domain'] = $this->db->get('domain')->result_array();
		$data['group_level'] = $this->db->get('group_level')->result_array();
		$data['topics'] = $this->db->get('univcoursesdet')->result_array();
		$this->load->view('edit_data', $data);
	}

	function getCourses(){
		$type = $_POST['type'];
		$l = $_POST['level'];
		$q = "SELECT * from courses where CourseId in (SELECT distinct CourseID from univcourses where Delivery=$type and GrpLevel = $l)";
		// $data = $this->db->where('Delivery', $type)->get('univcourses')->result_array();/
		$data = $this->db->query($q)->result_array();
		$o="<option value=''>Select Course</option>";
		foreach($data as $key){
			$o.="<option value='".$key['CourseId']."'>".$key['CourseName']."</option>";
		}
		echo ($o);
	}
	function getUniversities(){
		$c = $_POST['course'];
		$t = $_POST['type'];

		$data = $this->db->select('u.*,uc.CHrs,uc.DetLink,c.CourseName')->from('univ as u')->join('univcourses as uc', 'uc.UnivCd = u.UnivCd')->join('courses as c', 'c.CourseId = uc.CourseId')->where('uc.Delivery', $t)->where('uc.CourseId', $c)->get()->result_array();
		$o='<div class="row">';
		$course_details = $this->db->where('CourseId', $c)->get('courses')->row_array();

		foreach($data as $key){
			$k=$key['Name']." - ".$course_details['CourseName'];
			$o.="<div class='col-sm-12 col-md-4 m-1'><input onclick='getTopics(".$key['UnivCd'].")' type='radio' name='university' value='".$key['UnivCd']."'>".$key['Name']."<a target='_blank' href='".$key['DetLink']."'><div class='card' style='width: 14rem;'><img class='card-img-top' src='".$key['Img']."' style='width: 100%;height: 100px;' alt='Card image cap'><div class='card-body'><p class='card-text'>University: ".$key['Name']."<br>Course: ".$key['CourseName']."<br>Time: ".$key['CHrs']." Hrs</p></div></div></a></div>";
		}
		$o.="</div>";
		echo $o;
	}

	function getTopics(){
		$c= $_POST['course'];
		$data = $this->db->where('CourseId', $c)->get('univcoursesdet')->result_array();
		$o='';
		$n=1;
		$course_details = $this->db->where('CourseId', $c)->get('courses')->row_array();
		$u = $_POST['u'];
		$uni = $this->db->where('UnivCd', $u)->get('univ')->row_array();
		foreach($data as $key){
			$o.=$n.". ".$key['TopicName']."\n";
		}
		$uc = $this->db->where(array('CourseId' => $c, 'UnivCd' => $u))->get('univcourses')->row_array();
		// echo $o;
		$data['o'] = $o;
		$data['u'] = $uni['Name']." - ".$course_details['CourseName'];
		$data['time'] = $uc['CHrs'];
		echo json_encode($data);
	}

	public function company(){
		$user_id = $this->check_login();
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('company');
		$crud->required_fields('name', 'company_turnover', 'no_of_outlets','no_of_units','industry','sector');
		$crud->field_type('HOCountryCd','dropdown', $this->getCountry());
		$crud->field_type('HOCityCd','dropdown', $this->getCity());
		$crud->field_type('industry','dropdown', $this->getIndustry());
		$crud->field_type('sector','dropdown', $this->getSector());

		// $crud->set_relation('company_id','company','Name');
		// $crud->callback_add_field('HOCountryCd',array($this,'getCityByCountry'));
		// $crud->callback_column('HOCountryCd',array($this,'getCityByCountry'));

		$crud->setRelation('officeCode', 'offices', 'city');
$crud->fieldType('officeCode', 'relational_native');
		
		$crud->set_subject('Company');

		$output = $crud->render();

		$this->_example_output($output);
	}

	private function getIndustry(){
		$data =  $this->db->select('MCd,Name')->get_where('mst', array('MTyp' => 21, 'stat' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['MCd']]=$row['Name'];
		}

		return $finalArray;
	}

	private function getSector(){
		$data =  $this->db->select('MCd,Name')->get_where('mst', array('MTyp' => 22, 'stat' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['MCd']]=$row['Name'];
		}

		return $finalArray;
	}

	private function getCountry(){
		$data =  $this->db->select('phone_code,country_name')->get('countries');

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['phone_code']]=$row['country_name'];
		}

		return $finalArray;
	}

	private function getCity(){
		$data =  $this->db->select('city_id,city_name')->get_where('city', array('country_id' => 103, 'status' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['city_id']]=$row['city_name'];
		}

		return $finalArray;
	}

	public function getCityByCountry($value, $row){
		// print_r($value);die;

		$data =  $this->db->select('city_id,city_name')->get_where('city', array('country_id' => $value, 'status' => 0))->result_array();

		// $finalArray = array();
		// foreach ($data->result_array() as $row)
		// {
		// 	$finalArray[$row['city_id']]=$row['city_name'];
		// }

		// return $finalArray;

		$o="<option value=''>Select Subdomain</option>";
		foreach($data as $key){
			$o.="<option value='".$key['city_id']."'>".$key['city_name']."</option>";
		}
		echo ($o);

	}

	private function getUserLevel(){
		$data =  $this->db->select('level_id,level_name')->get_where('user_level', array('status' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['level_id']]=$row['level_name'];
		}

		return $finalArray;
	}

	private function getTrainingType(){
		$data =  $this->db->select('tt_id,tt_name')->get_where('training_type', array('status' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['tt_id']]=$row['tt_name'];
		}

		return $finalArray;
	}

	private function getDomain(){
		$data =  $this->db->select('DCd,Domain')->get_where('domain', array('stat' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['DCd']]=$row['Domain'];
		}

		return $finalArray;
	}

	private function getGetsubdomain(){
		$data =  $this->db->select('SDCd,SubDomain')->get_where('domainsub', array('stat' => 0));

		$finalArray = array();
		foreach ($data->result_array() as $row)
		{
			$finalArray[$row['SDCd']]=$row['SubDomain'];
		}

		return $finalArray;
	}



}

