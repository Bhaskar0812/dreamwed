<?php
class Categories extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('category_model');
    //$this->load->helper('url_helper');
  }
  
  public function index() {
    $this->load->admin_render('categories/form');
  }
 
  /*public function view($slug = NULL) {
    $data['news_item'] = $this->news_model->get_news($slug);
    
    if (empty($data['news_item'])) {
      show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
  }*/
    
  public function create() {
    $res =array();
    $this->load->model('category_model');
    $this->form_validation->set_rules('name', 'Category Name', 'trim|required');

    if ($this->form_validation->run() === FALSE) {
      $requireds = strip_tags($this->form_validation->error_string()) ? strip_tags($this->form_validation->error_string()) : '';
      $response = array('status' => FAIL, 'messages' => $requireds ,'csrf'=>get_csrf_token()['hash']);
    } else {
      $isLogin = $this->category_model->create();
      if($isLogin && $isLogin['type'] == 'LS'){
        $response = array('status'=>1,'message'=>ResponseMessages::getStatusCodeMessage(155),'csrf'=>get_csrf_token()['hash']);
      }else{
        $response = array('status'=>0,'message'=>ResponseMessages::getStatusCodeMessage(156),'csrf'=>get_csrf_token()['hash']);
      }
    }
    echo !empty($response) ? json_encode($response): redirect('categories'); //USED JSON ENCODE TO SHOW ERROR THROUGH AJAX.
  }
  
  /*public function edit() {
    $id = $this->uri->segment(3);
    
    if (empty($id)) {
      show_404();
    }
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $data['title'] = 'Edit a news item';        
    $data['news_item'] = $this->news_model->get_news_by_id($id);
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('news/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->news_model->set_news($id);
      //$this->load->view('news/success');
      redirect( base_url() . 'index.php/news');
    }
  }
  
  public function delete() {
    $id = $this->uri->segment(3);
    
    if (empty($id)) {
        show_404();
    }
            
    $news_item = $this->news_model->get_news_by_id($id);
    
    $this->news_model->delete_news($id);        
    redirect( base_url() . 'index.php/news');        
  }*/
}

