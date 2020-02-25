<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CommonBack {
    public $data = "";
    function __construct() {
      parent::__construct();
      $this->check_admin_user_session();
    }

    public function index(){//INDEX FUNCTION
      $this->load->admin_render('index');   
    }//END OF FUNCTION
   
}//END OF CLASS

