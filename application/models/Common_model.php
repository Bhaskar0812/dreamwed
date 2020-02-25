<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Common Model
 * Consist common DB methods which will be commonly used throughout the project
 */
class Common_model extends CI_Model {

  public function updateFields($table,$whereCondition,$updateData){
  
    $this->db->update($table, $updateData, $whereCondition);
    $row = $this->db->affected_rows() ;
    return $row;
  }  

  public function deleteData($table,$where){
      $this->db->where($where);
      $this->db->delete($table); 
      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }   
  }

  public function forgetPassword($table,$data){ 
    $get = array();
    $this->load->library('Smtp_email');
    //smtp email send library..
    $email = $data['email'];
    $query = $this->db->select('*')->where('email',$email)->get($table);
    if($query->num_rows()==1){
        $getData = $query->row();
        $get['id'] = $getData->id;
        $temp_pass = md5(uniqid());
        $userUpdate= $this->db->set(array('forgetPass'=>$temp_pass))->where(array('id'=>$get['id']))->update($table);
        if($userUpdate){
            $query = $this->db->select('*')->where('id',$get['id'])->get($table);
            if($query->num_rows()==1){
            $dataUser = $query->row();
            $dataSend['name']       = $dataUser->fullName;
            $dataSend['message']    = 'Reset Link for You Email:'.''.$data['email'].' '.'is'.'';
            $dataSend['email']      = $data['email'];
            $dataSend['link']       = base_url()."admin/setPassword/".$dataUser->forgetPass."/".md5($get['id']);//used md5 for encrypt user id becase it will give always same encode for same digit.
             $dataSend['browser']   = $_SERVER['HTTP_USER_AGENT'];
             // this will give browser name and os detail.
            $message = $this->load->view('email/reset_password',$dataSend,TRUE);
            //email template load from this.
            $subject = "Reset password";
            $this->smtp_email->send_mail($data['email'],$subject,$message);
            //email sent to user email id..
            return TRUE;
            }else{
                return FALSE;
            }
        } 
    }//Email Found on database
    else{
      return FALSE;
    }
  }//END OF FUNCTION..

  public function is_id_exist($table,$key,$value){
    $this->db->select("*");
    $this->db->from($table);
    $this->db->where($key,$value);
    $ret = $this->db->get()->row();
    if(!empty($ret)){
        return $ret;
    }
    return FALSE;
  } 

  public function getCount($table){
     $ret = $this->db->select("*")->get($table);
      if($ret->num_rows()){
          return $ret->num_rows();
      }
      return 0;
  }

  public function getsingle($table, $where = '', $fld = NULL, $order_by = '', $order = ''){

      if ($fld != NULL) {
          $this->db->select($fld);
      }
      $this->db->limit(1);
      if ($order_by != '') {
          $this->db->order_by($order_by, $order);
      }
      if ($where != '') {
          $this->db->where($where);
      }

      $q = $this->db->get($table);
      $num = $q->num_rows();
      if ($num > 0) {
          return $q->row_array();
      }
  }

  public function insertData($table,$data){
   $this->db->insert($table,$data);
   return $this->db->insert_id();
  }//E

    //check if given data exists in table
  public function is_data_exists($table, $where){
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    $rowcount = $query->num_rows();
    if($rowcount==0){
        return false;
    }
    else {
        return true;
    }
  }


  public function select_result($where,$table){  
  //function for select row from database..
    $this->db->select("*");
    $this->db->where($where);
    $query = $this->db->get($table);
    //echo $str = $this->db->last_query(); die;
    if($query->num_rows()>0){
      $user = $query->result_array();
      return $user;
    }
    return FALSE;
  }//END OF FUNCTION..

  public function select_count($table){
    //function for select ALL data from database..
    $this->db->select("*");
    $query = $this->db->get($table);
    $count = $query->num_rows();
    return $count;
      
   }//END OF FUNCTION..
    

  function insert_data_uniq($data,$table){
      //insert Single data by checking uniq  data...
    $this->db->select("*");
    $this->db->where($data);
    $query = $this->db->get($table);
    if($query->num_rows()>0){
    return FALSE;
    }
    $this->db->insert($table,$data);
    $query = $this->db->insert_id();
    return TRUE;
  }//END OF FUNCTION..

  public function insert_batch($table,$data){
  //insert batch function for insert multiple row data into database.
    $query =$this->db->insert_batch($table,$data);
    return $query;
  }//END OF FUNCTION..
     
  public function update_unique($where,$data,$table){
    //update unique data into database..
    $this->db->select("*");
    $this->db->where($data);
    $query = $this->db->get($table);
    if($query->num_rows()>0){
    return FALSE;
    }
    $this->db->set($data);
    $this->db->where($where);
    $query = $this->db->update($table);
    //echo $this->db->last_query();die;
    if($query){
        return TRUE;
    } 
  }//END OF FUNCTION..
}//END OF CLASS..
