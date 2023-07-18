<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function insertRecord($tbl,$data){
		$CI = & get_instance();
		$CI->load->model('Common_model', 'Common');
		return $CI->Common->recordInsert($tbl,$data);
	}

	function updateRecord($tbl,$data,$where){
		$CI = & get_instance();
		$CI->load->model('Common_model', 'Common');
		$CI->Common->recordUpdate($tbl,$data,$where);
	}

	function deleteRecord($tbl,$where){
		$CI = & get_instance();
		$CI->load->model('Common_model', 'Common');
		$CI->Common->recordDelete($tbl,$where);	
	}

	function getRecords($tbl=null,$where=null){
		$CI = & get_instance();
		$CI->load->model('Common_model', 'Common');
		return $CI->Common->getAllRecord($tbl,$where);	
	}

	function email_check($email){
		$CI = & get_instance();
		$CI->load->model('Common_model', 'Common');
	    return $CI->Common->get_by_email($email) ? TRUE : FALSE;
	}

	function contact_check($no){
	    $CI = & get_instance();
	    $CI->load->model('Common_model', 'Common');
	    return $CI->Common->get_by_contactno($no) ? TRUE : FALSE;
	}

	function checkUserFirstTime($userId){
		$CI = & get_instance();
	    $CI->load->model('Common_model', 'Common');
	    return $CI->Common->checkFirstTimeUser($userId) ? TRUE : FALSE;	
	}

	function send_mail($to, $from, $subject, $body, $cc = null, $bcc = null,$file=null){
		$CI =& get_instance();
		$CI->load->library('email');
		$config = array(
		            'protocol' => 'smtp', 
		            'smtp_host' => 'ssl://smtp.gmail.com', 
		            'smtp_port' => 465, 
		            'smtp_user' => 'xxxxx@gmail.com', 
		            'smtp_pass' => 'xxxxx', 
		            'mailtype' => 'html', 
		            'charset' => 'iso-8859-1'
		);
		$CI->email->initialize($config);
		$CI->email->set_mailtype("html");
		$CI->email->set_newline("\r\n");
		$CI->email->to($to);
		$CI->email->from($from);
		$CI->email->subject(utf8_decode($subject));
		$CI->email->message(utf8_decode($body));
		$CI->email->attach($file);
		if($CI->email->send()){
			return 1;
		}else{
			// print_r($CI->email->print_debugger());exit();
			return 0;
		}
	}

	function do_upload($control,$filename,$upload_path,$allowed_type){
		$CI =& get_instance();
		$config['upload_path'] = $upload_path;
		$config['file_name'] = $filename;
		$config['max_size'] = 0;
		$config['remove_spaces'] = FALSE;
		$config['allowed_types'] = $allowed_type;

		$CI->load->library('upload', $config);

		$CI->upload->initialize($config);

		if (!$CI->upload->do_upload($control)) {
			echo $CI->upload->display_errors();
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function getIPAddress() {  
    	//whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    	//whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }

    function getBrowser(){
	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";

	    //First get the platform?
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'windows';
	    }
	   
	    // Next get the name of the useragent yes seperately and for good reason
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Internet Explorer';
	        $ub = "MSIE";
	    }
	    elseif(preg_match('/Firefox/i',$u_agent))
	    {
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";
	    }
	    elseif(preg_match('/Chrome/i',$u_agent))
	    {
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }
	    elseif(preg_match('/Safari/i',$u_agent))
	    {
	        $bname = 'Apple Safari';
	        $ub = "Safari";
	    }
	    elseif(preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Opera';
	        $ub = "Opera";
	    }
	    elseif(preg_match('/Netscape/i',$u_agent))
	    {
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }
	   
	    // finally get the correct version number
	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	        // we have no matching number just continue
	    }
	   
	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        //we will have two since we are not using 'other' argument yet
	        //see if version is before or after the name
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }
	   
	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}
	   
	    return array(
	        'userAgent' => $u_agent,
	        'name'      => $bname,
	        'version'   => $version,
	        'platform'  => $platform,
	        'pattern'    => $pattern
	    );
	}


if(! function_exists('date_difference')){
  function date_difference($date1, $date2, $return=false)
  {
    // Declare and define two dates
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);

    // Formulate the Difference between two dates
    $diff = abs($date2 - $date1);

    if($return){
      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return sprintf("%d Day(s)", round($diff / 86400))  ;
    }

    // To get the year divide the resultant date into
    // total seconds in a year (365*60*60*24)
    $years = floor($diff / (365*60*60*24));

    // To get the month, subtract it with years and
    // divide the resultant date into
    // total seconds in a month (30*60*60*24)
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

    // To get the day, subtract it with years and
    // months and divide the resultant date into
    // total seconds in a days (60*60*24)
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

    // To get the hour, subtract it with years,
    // months & seconds and divide the resultant
    // date into total seconds in a hours (60*60)
    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));

    // To get the minutes, subtract it with years,
    // months, seconds and hours and divide the
    // resultant date into total seconds i.e. 60
    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

    // To get the minutes, subtract it with years,
    // months, seconds, hours and minutes
    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

    if( $years != 0 ){
      return sprintf("%d years, %d months, %d days, %d hours, %d minutes, %d seconds", $years, $months, $days, $hours, $minutes, $seconds);
    }

    if( $months != 0 ){
      return sprintf("%d months, %d days, %d hours, %d minutes, %d seconds", $months, $days, $hours, $minutes, $seconds);
    }

    if( $days != 0 ){
      return sprintf("%d days, %d hours, %d minutes, %d seconds", $days, $hours, $minutes, $seconds);
    }

    if( $hours != 0 ){
      return sprintf("%d hours, %d minutes, %d seconds", $hours, $minutes, $seconds);
    }

    if( $minutes != 0 ){
      return sprintf("%d minutes, %d seconds", $minutes, $seconds);
    }

    return sprintf("%d seconds", $seconds);
  }
}



function validate_mobile($mobile){
    return preg_match('/^[6-9]{1}[0-9]{9}$/i', $mobile);
  }

function maskPhoneNumber($number){
    $mask_number = str_repeat('X', strlen($number)-4) . substr($number, -4);
    return $mask_number;
  }

  if(! function_exists('status')){
		function status($status)
		{
		  switch($status){
			case '0':
			case 0:
				$sts = 'active';
			  return '<span class="badge badge-success">'.strtoupper($sts).'</span>';
			break;
			case '1':
			case 1:
				$sts = 'inactive';
			  return '<span class="badge badge-danger">'.strtoupper($sts).'</span>';
			break;
			default:
			  return '<span class="label label-default">'.strtoupper($status).'</span>';
			break;
		  }
		}
  }
	function file_get_contents_curl($url)
	{
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, $url);
	    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	    if (empty($buffer)) {
	        return 0;
	    } else {
	        return $buffer;
	    }
	    //return 0;
	}

	if(!function_exists('toObject')){
	function toObject($array = ''){
		if(is_array($array )){
			return json_decode(json_encode($array), FALSE);
		}else{
			return $array;
		}
	}
}

	

if (!function_exists('authuser')){
	function authuser(){
		$ci = &get_instance();
		$ci->load->library('session');
		if($ci->session->userdata('logged_in')) {
			return toObject($ci->session->userdata('logged_in'));
		}else{
			return null;
		}
	}
}


if(!function_exists('set_flash')){
	function set_flash($type,$message){
		$ci = &get_instance();
		$data = array(
			'type' => $type,
			'message' => $message
		);
		$ci->session->set_flashdata('flash',$data);
	}
}

if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
	}
}

if(!function_exists('get_flash')){
	function get_flash(){
		$ci = &get_instance();
		if($ci->session->flashdata('flash')) {
			$flash = json_decode(json_encode($ci->session->flashdata('flash')));
			if($flash->type == 'success')
				return '<div class="alert alert-success">'. $flash->message .'</div>';
			else if($flash->type == 'info')
				return '<div class="alert alert-info">'. $flash->message .'</div>';
			else if($flash->type == 'warning')
				return '<div class="alert alert-warning">'. $flash->message .'</div>';
			else if($flash->type == 'error')
				return '<div class="alert alert-danger">'. $flash->message .'</div>';
		}
		else{
			return null;
		}
	}
}


	
