<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
  protected $table_name = ADMIN;
  protected $id = 'id';
  function isLogin($data){
    $res = $this->db->select('*')->where(array('email'=>$data['email']))->get($this->table_name);
    if($res->num_rows() > 0):
      $result = $res->row_array();
      $password = $data['password'];
      if(password_verify($password,$result['password'])):
        if($result['status'] == 1)://if user is active
          $update_data = array();
          $session_data['userId']     =       $result['id'] ;
          $session_data['emailId']    =       $result['email'];
          $session_data['name']       =       $result['name'];
          $session_data['isLogin']    =       TRUE;
          $_SESSION[ADMIN_USER_SESS_KEY] = $session_data;
          //pr($_SESSION[USER_SESS_KEY]);
          return array('type'=>'LS','name'=>$result['name']); //login successfull
        else:
          return array('type'=>'NA'); // not active
        endif;
      else:
        return array('type'=>'WP'); //wrong password
      endif;
    endif;
    return FALSE;
  }///end of function...
}