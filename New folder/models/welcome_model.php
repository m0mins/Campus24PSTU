<?php

class Welcome_Model extends CI_Model {
    //put your code here
    public function select_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
       
        return $result;
    }
    public function save_blog_info($data){
        
         $this->db->insert('tbl_blog',$data);
        
    }
    public function select_all_published_blog(){
        
         $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
       
        return $result;
        
    }
    
}
