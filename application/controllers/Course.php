<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
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
		$this->load->model('Course_model', 'course_filter');
	}

	public function index(){
		$data['title'] = 'All Courses';
		$data['levels'] = $this->common->getGroupLevel();
		$data['vendors'] = $this->common->getVendorsList();
		$data['language'] = $this->common->getLanguageList();
		$data['type'] = $this->common->getTrainingType();
		$data['topics'] = $this->common->getTopicList();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('course_search', $data);
	}

  function load_data(){

    if($_POST){
      $level = !empty($_POST['level'])? $_POST['level']:'';
      $type = !empty($_POST['type']) ? $_POST['type'] :'';
      $lang = !empty($_POST['lang'])? $_POST['lang'] :'';
      $topic = !empty($_POST['topic']) ? $_POST['topic']:'';
      $vendor = !empty($_POST['vendor'])? $_POST['vendor']:'';
      $duration = !empty($_POST['duration'])?$_POST['duration']:'';
    }
    $response = $this->course_filter->get_data($topic, $vendor, $level, $lang, $type, $duration);
    $data = '';
    $rate = 0;
    // echo "<pre>";
    // print_r($response);
    // die;
    if(!empty($response)){
      foreach ($response as $key) {
          // VId+CourseName+lang_id
        $pdf_file = $key['Comp_no']."-".$key['CourseName']."-".$key['lang_id'].'.pdf';
        $img_file = $key['Comp_no']."-".$key['CourseName']."-".$key['lang_id'].'.jpg';

        $img_file_path = FCPATH.'uploads/img/'.$key['Comp_no']."-".$key['CourseName']."-".$key['lang_id'].'.jpg';
        $pdf_file_path = FCPATH.'uploads/pdf/'.$pdf_file;

        if (file_exists($img_file_path)){
          $img = '<img class="card-img-top img-fluid" src="'.base_url('uploads/img/').$img_file.'" alt="'.$key['CourseName'].'">';
        }else{
            $img = '<img class="card-img-top img-fluid" src="'.base_url('uploads/img/').'img_not_found.jpg'.'" alt="'.$key['CourseName'].'">';
        }

        if (file_exists($pdf_file_path)){
          $pdf_btn = '<a href="'.base_url('uploads/pdf/').$pdf_file.'" class="btn btn-primary btn-sm" target="_blank">Course Detail</a>';
        }else{
            if(authuser()->role >=9){
              $pdf_btn = 'check for pdf';
              $pdf_btn = '<a href="#" class="btn btn-primary btn-sm">check for pdf</a>';
            }else if(authuser()->role < 5){
              $pdf_btn = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#customerModal">Course Detail</button>';
            }else if(authuser()->role == 5 || authuser()->role == 6){
              $pdf_btn = '<a href="#" class="btn btn-primary btn-sm">pdf file missing</a>';
            }
        }

        if(authuser()->role >=9){
            $Shortlist = '<button class="btn btn-danger btn-sm" onclick=trainingModal('.$key['CourseId'].','.$key['tt_id'].','.$key['Comp_cd'].')>Shortlist</button>';
          }else if(authuser()->role < 5){
            $Shortlist = '<button class="btn btn-danger btn-sm" onclick=trainingModal('.$key['CourseId'].','.$key['tt_id'].','.$key['Comp_cd'].')>Shortlist</button>';
          }else if(authuser()->role == 5 || authuser()->role == 6){
            $Shortlist = '';
          }


        $rate = $key['Rate'] + $key['ctype_rate'] + $key['clang_rate']; 
        $data .= '<div class="col-xl-4"> <div class="card"> <div class="card-body"> <h3 class="card-title text-white mt-0">'.$this->strTruncate_50($key['CourseName']).'</h3> <p class="card-text text-muted font-size-13">'.$this->strTruncate($key['CDesc']).'</p> '.$img.' <div class="row mt-1"> <div class="col-md-6"> <i class="fa fa-rupee-sign"></i>   : '.$rate.' </div> <div class="col-md-6"> <i class="far fa-clock"></i> : '.$key['Duration'].' Weeks </div> <div class="col-md-6"> <i class="fas fa-language"></i> : '.$key['lang_name'].' </div> <div class="col-md-6"> <i class="fa fa-graduation-cap"></i> : '.$key['tt_name'].' </div><div class="col-md-12"> <i class="fas fa-user"></i> : '.$key['Name'].' </div> </div> <div class="row mt-1"> <div class="col-md-6"> '.$pdf_btn.' </div> <div class="col-md-6"> '.$Shortlist.' </div> </div> </div> </div> </div>';
      }
    }else{
      $data = 'Data Not Found !!';
    }
    echo $data;
    
  }

  function strTruncate($str){
    $len = strlen($str);
      if ($len > 82) {
          $str = substr($str, 0, 82) . "...";
      }
      return $str;
  }

  function strTruncate_50($str){
    $len = strlen($str);
      if ($len > 37) {
          $str = substr($str, 0, 37) . "...";
      }
      return $str;
  }

  public function add_course(){
    $data['title'] = 'Add Course';

    if($this->input->method(true)=='POST'){
      // echo "<pre>";
      // print_r($_FILES);
      // die;
      if(isset($_FILES['courseFile']['name']) && !empty($_FILES['courseFile']['name'])){ 

        $files = $_FILES['courseFile'];

        $_FILES['courseFile']['name']= $files['name'];
        $_FILES['courseFile']['type']= $files['type'];
        $_FILES['courseFile']['tmp_name']= $files['tmp_name'];
        $_FILES['courseFile']['error']= $files['error'];
        $_FILES['courseFile']['size']= $files['size'];
        $file = str_replace(' ', '_', rand('10000','999').'_'.$files['name']);

        $res = do_upload('courseFile',$file,'uploads/course/','*');
        if($res){
          $course = array();
          $filepath = base_url('uploads/course/'.$file);
          if (($open = fopen($filepath, "r")) !== FALSE) 
            {
              while (($data = fgetcsv($open, ",")) !== FALSE) 
              {
                if($data[0] !='CourseName'){
                  // $course[] = $data; 

                  $courseData['CourseName'] = $data[0];
                  $courseData['CDesc'] = $data[1];
                  $courseData['TopicId'] = $data[13];
                  $courseData['Rate'] = $data[4];
                  $courseData['RateType'] = $data[5];
                  $courseData['RCurrId'] = $data[6];
                  $courseData['Comp_cd'] = $data[14];
                  $courseData['created_by'] = authuser()->id;
                  $courseData['created_at'] = date('Y-m-d H:i:s');

                  // echo "<pre>";
                  // print_r($courseData);
                  // die;
                  
                  $trainingType['TypId'] = $data[7];
                  $trainingType['ARate'] = $data[8];
                  $trainingType['Stat'] = 0;
                  
                  $langData['LngId'] = $data[9];
                  $langData['ARate'] = $data[10];
                  $langData['Stat'] = 0;
                  
                  $domainData['DCd'] = $data[11];
                  $domainData['SDCd'] = $data[12];
                  $domainData['Stat'] = 0;
                  
                  $durationData['Duration'] = $data[2];
                  $durationData['Stat'] = 0;
                  
                  $levelData['LevelId'] = $data[3];
                  $levelData['Stat'] = 0;

                  $this->db->trans_start();

                    $courseId = insertRecord('courses',$courseData);

                    $trainingType['CourseId'] = $courseId;
                    $langData['CourseId'] = $courseId;
                    $domainData['CourseId'] = $courseId;
                    $durationData['CourseId'] = $courseId;
                    $levelData['CourseId'] = $courseId;

                    insertRecord('ctypdet',$trainingType);
                    insertRecord('clngdet',$langData);
                    insertRecord('cdomdet',$domainData);
                    insertRecord('cdurdet',$durationData);
                    insertRecord('clvldet',$levelData);
                    
                  $this->db->trans_complete();

                }   
              }
            
              fclose($open);
            }
            
        }

      }
      
    }
    // echo "<pre>";
    // print_r($data);
    // die;
    $this->load->view('add_new_course', $data);
  }

  public function customize($courseId){
    $data['title'] = 'Customize Course';
    // echo "<pre>";
    // print_r($data);
    // die;
    $this->load->view('customize_course', $data);
  }

  public function custom(){
   $data['title'] = 'Custom Course';
    // echo "<pre>";
    // print_r($data);
    // die;
    $this->load->view('custom_course', $data); 
  }


  // public function loadData($record=0) {
  //     $recordPerPage = 9; // end
  //       if($record != 0){
  //         $record = ($record-1) * $recordPerPage; // start

  //       }       
  //       $recordCount = $this->course_filter->getCourseCount($topic, $vendor, $level, $lang, $type, $duration);
  //       $courseRecord = $this->course_filter->getRecord($record,$recordPerPage);
  //       $config['base_url'] = base_url().'course/loadData';
  //       $config['use_page_numbers'] = TRUE;
  //       $config['next_link'] = 'Next';
  //       $config['prev_link'] = 'Previous';
  //       $config['total_rows'] = $recordCount;
  //       $config['per_page'] = $recordPerPage;
  //       $this->pagination->initialize($config);
  //       $data['pagination'] = $this->pagination->create_links();
  //       $data['empData'] = $courseRecord;
  //       echo json_encode($data);    
  // }

	

}