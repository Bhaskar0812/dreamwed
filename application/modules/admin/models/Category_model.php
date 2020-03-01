<?php
class Category_model extends CI_Model {
  protected $table_name = 'catgeories';
  protected $id = 'id';
    
  /*public function get_news($slug = FALSE) {
    if ($slug === FALSE) {
      $query = $this->db->get('news');
      return $query->result_array();
    }

    $query = $this->db->get_where('news', array('slug' => $slug));
    return $query->row_array();
  }
    
  public function get_news_by_id($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('news');
      return $query->result_array();
    }

    $query = $this->db->get_where('news', array('id' => $id));
    return $query->row_array();
  }*/
    
  public function create($id = 0) {
    /*$this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);*/

    $data = array(
      'name' => $this->input->post('name'),
    );
    if ($id == 0) {
      $this->db->insert('categories', $data);
      return array('type'=>'LS','name'=>$result['name']); //login successfull 
    } else {
      $this->db->where('categoryId', $id);
      return $this->db->update('categories', $data);
    }
  }
    
  /*public function delete_news($id) {
    $this->db->where('id', $id);
    return $this->db->delete('news');
  }*/
}