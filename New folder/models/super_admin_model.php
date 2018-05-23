<?php

class Super_Admin_Model extends CI_Model {
    
    public function save_category_info($data)
    {
        $this->db->insert('tbl_category',$data);
    }
    public function select_all_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result=$this->db->get();
        $result=$query_result->result();
       
        return $result;
    }
    public function update_publication_status_by_id($category_id)
    {
        
        $this->db->set('publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
        
        
    }
    public function update_unpublication_status_by_id($category_id)
    {
        
        $this->db->set('publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
        
        
    }
    
    public function select_all_blog(){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $query_result=$this->db->get();
        $result=$query_result->result();
       
        return $result;
    }
    
    public function update_publication_blogstatus($blog_id){
        $this->db->set('publication_status',1);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
        
    }
    
    public function update_unpublication_blogstatus($blog_id){
        $this->db->set('publication_status',0);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function delete_blog_data($blog_id){
        
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('tbl_blog');
        
        
    }
    
    public function update_blogstate($data,$blog_id){
        
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog',$data);
        
    }

    

    public function delete_category_data($category_id){
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
        
    }
    public function edit_blogstate($blog_id){
          $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id',$blog_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
       
        return $result;
    }
}
