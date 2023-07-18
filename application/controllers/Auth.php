<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
     
    function __construct(){ 
        parent::__construct();
        $this->load->model('Common_model','auth');
    } 
    
    public function index(){
        if($this->input->method(true)=='POST'){
            $data = $_POST;
            // echo "<pre>";print_r($data);die;
            if (($data['email'] == "") && ($data['password']== "")) {
                $this->session->set_flashdata('error','Enter Username or Password'); 
                $this->load->view('login_new', $data);
            } else {
                $data = $this->security->xss_clean(array(
                    'email' => trim($data['email']),
                    'password' => md5(trim($data['password']))
                ));
                
                $result = $this->auth->checkUserLogin($data);
                if ($result != false) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->name,
                        'email' => $result[0]->email,
                        'mobile' => $result[0]->mobile,
                        'role' => $result[0]->user_type,
                        'comp' => $result[0]->Comp_cd,
                    );
                    $this->session->set_userdata('logged_in', $session_data);
                    // >=9 admin, (5,6 vendor) and (< 5 = customer)
                    if($session_data['role'] >= 9){
                        redirect(base_url() . 'dashboard', 'refresh');
                    }else if($session_data['role'] < 5){
                        // redirect(base_url() . 'training', 'refresh');
                        $checkU = checkUserFirstTime($result[0]->id);
                        
                        if($checkU){
                            redirect(base_url() . 'company/add_company', 'refresh');
                        }else{
                            redirect(base_url() . 'dashboard', 'refresh');
                        }
                    }
                    else if($session_data['role'] == 5 || $session_data['role'] == 6){
                        $checkU = checkUserFirstTime($result[0]->id);
                        if($checkU){
                            redirect(base_url() . 'company/add_company', 'refresh');
                        }else{
                            redirect(base_url() . 'dashboard', 'refresh');
                        }

                        // redirect(base_url() . 'company', 'refresh');
                    }else {
                        $this->session->set_flashdata('error','Invalid Username or Password'); 
                        redirect(base_url() . 'login', 'refresh');
                    }
                    
                }else {
                        $this->session->set_flashdata('error','Invalid Username or Password'); 
                        redirect(base_url() . 'login', 'refresh');
                    }
            }
        }
        $this->load->view('login_new');
    } 

    public function register(){
        if($this->input->method(true)=='POST'){
            $data = $_POST;
            // echo "<pre>";print_r($data);die;
            if (($data['email'] == "") && ($data['password']== "") && ($data['mobile']== "")) {
                $this->session->set_flashdata('error','Fill up required fields'); 
                $this->load->view('signup', $data);
            } else {
                $data = $this->security->xss_clean(array(
                    'email' => trim($data['email']),
                    'password' => trim($data['password']),
                    'name' => trim($data['name']),
                    'mobile' => trim($data['mobile']),
                    'user_type' => trim($data['user_type'])
                ));

                if(email_check($data['email']) == TRUE){
                    $this->session->set_flashdata('error','Email already exists!');
                    redirect(base_url() . 'register', 'refresh');
                }elseif(contact_check($data['mobile']) == TRUE){
                    $this->session->set_flashdata('error','Mobile already exists!');
                    redirect(base_url() . 'register', 'refresh');
                }else{

                    $data['pwd_txt'] = $data['password'];
                    $data['password'] = md5($data['password']);
                    $data['user_type'] = $data['user_type'];
                    $data['created_at'] = date('Y-m-d H:i:s');

                    $userid = insertRecord('users', $data);

                    $session_data = array(
                        'id' => $userid,
                        'username' => $data['name'],
                        'email' => $data['email'],
                        'mobile' => $data['mobile'],
                        'role' => $data['user_type'],
                        'comp' => 0,
                    );
                    $this->session->set_userdata('logged_in', $session_data);

                    $this->session->set_flashdata('success','Sign up sucessfully.');
                    // redirect(base_url() . 'register', 'refresh');
                    redirect(base_url() . 'company/add_company', 'refresh');
                }
                
            }
        }
        $this->load->view('signup');
    }

    public function change_password(){

        $status = "error";
        $response = "Something went wrong! Try again later.";
        if($this->input->method(true)=='POST'){
            extract($_POST);
            if($pass == $new_pass){
                $data['password'] = md5($pass);
                $data['pwd_txt'] = $pass; 
                updateRecord('users', $data, array('id' => $user_id));
                $status = "success";
                $response = "Password has been updated.";
            }else{
                $response = "Password does not matched!";
            }

            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => $status,
                'response' => $response
              ));
             die;
        }

        $data['title'] = 'Change Password';
        $this->load->view('change_password', $data);
    }
     
    public function logout(){ 
        /* Destroy entire session data */
        $this->session->unset_userdata('logged_in'); 
        $this->session->sess_destroy();
        redirect(base_url() . 'login', 'refresh');         
    } 

    public function forgot(){
        $data['title'] = 'Forgot Password';
        if($this->input->method(true)=='POST'){
            $email = $_POST['email'];
            if(empty($email)){
                $this->session->set_flashdata('error','Fill up required fields'); 
                $this->load->view('forgot_password', $data);
            }else{
                $check = $this->auth->get_by_email($email);
                if(empty($check)){
                    $this->session->set_flashdata('error','You do not have account'); 
                    $this->load->view('forgot_password', $data);
                }else{
                    $token = md5(uniqid(rand()));
                    // print_r($token);die;
                    updateRecord('users', array('forgot_pass_token' => $token), array('email' => $email));
                    //email code

                    $to = 'itjagend@gmail.com';
                    $from = 'itjagend@gmail.com';
                    $subject = 'Reset your Password';
                    $body = "<p>This email has been sent as a request to reset our password</p>";
                    $body .= "<p><a href='".base_url()."reset_password/$token'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
                    // send_mail($to, $from, $subject, $body, null, null,null);

                    redirect(base_url('reset_password/'.$token), 'refresh');
                }
            }
        }
        
        $this->load->view('forgot_password', $data);   
    }

    public function reset_password($token){

        if($this->input->method(true)=='POST'){
            $data = $_POST;
            $data['token'] = $token;
            $data['title'] = 'Reset Password';
            if(empty($data['password']) || empty($data['confirm_password'])){
                $this->session->set_flashdata('error','Fill up required fields'); 
                $this->load->view('reset_password', $data);
            }else{
                $check = getRecords('users', array('forgot_pass_token' => $token));
                if(empty($check)){
                    $this->session->set_flashdata('error','You do not have account!'); 
                    $this->load->view('reset_password', $data);
                }else{
                    
                    if($data['password'] == $data['confirm_password']){

                        $data1['pwd_txt'] = $data['password'];
                        $data1['password'] = md5($data['password']);
                        updateRecord('users', $data1, array('id' => $check['id']));
                        $this->session->set_flashdata('success','Password has been updated.');
                        redirect(base_url('login'), 'refresh'); 
                    }else{
                        $this->session->set_flashdata('error','Password does not matched!');
                        $this->load->view('reset_password', $data);
                    }
                    
                }
            }
        }
        $data['token'] = $token;
        $data['title'] = 'Reset Password';
        $this->load->view('reset_password', $data);     
    }

    public function getpost()
    {
        if (empty($_POST)) {
            $this->load->view('errors/html/error_method');
        } else {
            return json_decode(json_encode($_POST));
        }
    }
     
}