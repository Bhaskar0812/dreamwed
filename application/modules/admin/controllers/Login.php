<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CommonBack {
  public $data = "";
  function __construct() {
    parent::__construct();
    $this->check_admin_user_session();
  }

  public function create(){
  	$this->load->view('login');
  }


  public function update(){  //LOGIN FUNCION.
    $res =array();
    $this->load->model('login_model');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE){
      $requireds = strip_tags($this->form_validation->error_string()) ? strip_tags($this->form_validation->error_string()) : ''; //validation errorget_csrf_token()['hash']
      $response = array('status' => FAIL, 'messages' => $requireds ,'csrf'=>get_csrf_token()['hash']);
    }

    else{ 
      $isLogin = $this->login_model->isLogin($_POST);
      if($isLogin && $isLogin['type'] == 'LS'){
        $response = array('status'=>1,'message'=>ResponseMessages::getStatusCodeMessage(106),'csrf'=>get_csrf_token()['hash']);
      }elseif($isLogin['type'] == 'NA'){
        $response = array('status'=>0,'message'=>'Your Profile Has been deactivated by admin.','csrf'=>get_csrf_token()['hash']);
      }else{
        $response = array('status'=>0,'message'=>ResponseMessages::getStatusCodeMessage(105),'csrf'=>get_csrf_token()['hash']);
      }
  }
    echo !empty($response) ?json_encode($response): redirect('admin'); //USED JSON ENCODE TO SHOW ERROR THROUGH AJAX.
  }//END OF FUNCTION

  public function check_unique_email_login(){
    $email = $_GET['email'];
    $check = $this->common_model->is_data_exists(ADMIN,array('email'=>$email),array('userName'=>$email));
    if($check){
        echo "true"; die;
    }
     echo "false"; die;
  }

}