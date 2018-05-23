<?php

session_start();

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('admin', 'refresh');
        }
        $this->load->model('super_admin_model', 'sa_model');
    }

    public function index() {
        $data = array();
        $data['admin_main_content'] = $this->load->view('admin/dashbord', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function add_category() {
        $data = array();
        $data['admin_main_content'] = $this->load->view('admin/add_category_form', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);

        $this->sa_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Category Information Successfully !';
        $this->session->set_userdata($sdata);

        redirect('super_admin/add_category');
    }

    public function manage_category() {
        $data = array();
        $data['all_category'] = $this->sa_model->select_all_category();
        $data['admin_main_content'] = $this->load->view('admin/manage_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function published_category($category_id) {

        $this->sa_model->update_publication_status_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function unpublished_category($category_id) {

        $this->sa_model->update_unpublication_status_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function add_blog() {
        $data = array();


        $data['all_published_category'] = $this->welcome_model->select_all_published_category();

        $data['admin_main_content'] = $this->load->view('admin/add_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }
    
    
    public function save_blog(){
        
        
        $data=array();
        $data['blog_title']=  $this->input->post('blog_title',true);
        $data['blog_category_id']=  $this->input->post('blog_category_id',true);
        $data['blog_short_des']=  $this->input->post('blog_short_des',true);
        $data['blog_long_des']=  $this->input->post('blog_long_des',true);
        $data['publication_status']=  $this->input->post('publication_status',true);
        $data['author_name']=  $this->session->userdata('full_name');
        $this->welcome_model->save_blog_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Blog Information Successfully !';
        $this->session->set_userdata($sdata);

        redirect('super_admin/add_blog');
        
    }
    
    public function manage_blog(){
        
         $data = array();

        $data['all_blog'] = $this->super_admin_model->select_all_blog();
        $data['admin_main_content'] = $this->load->view('admin/manage_blog',$data, true);
        $this->load->view('admin/admin_master', $data);
        
    }
    
    public function published_blog($blog_id) {

        $this->sa_model->update_publication_blogstatus($blog_id);
        redirect('super_admin/manage_blog');
    }
    
    
    public function unpublished_blog($blog_id){
         $this->sa_model->update_unpublication_blogstatus($blog_id);
        redirect('super_admin/manage_blog');
    }
    
    public function delete_blog($blog_id){
        
         $this->sa_model->delete_blog_data($blog_id);
        redirect('super_admin/manage_blog');
    }
    
    public function edit_blog($blog_id){
        
        $data=array();
     
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['select_blog']=$this->sa_model->edit_blogstate($blog_id);
        $data['admin_main_content'] = $this->load->view('admin/edit_blog',$data, true);
        $this->load->view('admin/admin_master', $data);
        
    }
    public function update_blog(){
        
        $data=array();
        $blog_id= $this->input->post('blog_id');
        $data['blog_title']=$this->input->post('blog_title');
        $data['blog_category_id']=$this->input->post('blog_category_id');
        $data['blog_long_des']=$this->input->post('blog_long_des');
        $data['publication_status']=$this->input->post('publication_status');
        
        
        $this->sa_model->update_blogstate($data,$blog_id);
        redirect('super_admin/manage_blog');
    }

    
    public function delete_category($category_id){
         $this->sa_model->delete_category_data($category_id);
        redirect('super_admin/manage_category');
    }

    public function logout() {
        $this->session->unset_userdata('full_name');
        $this->session->unset_userdata('admin_id');
        $sdata = array();
        $sdata['message'] = 'You are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('admin');
    }

}
