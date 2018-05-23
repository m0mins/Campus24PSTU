<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                        $data=array();
                        $data['all_published_category']=$this->welcome_model->select_all_published_category();
                        $data['all_published_blog']=$this->welcome_model->select_all_published_blog();
                        $data['maincontent']=$this->load->view('home_page_content',$data,true);
                        $data['slider']=1;
                        $data['title']='Home';
                        $this->load->view('master',$data);
	}
                    public function support()
                    {
                        $data=array();
                        $data['maincontent']=$this->load->view('support_page','',true);
                        $data['slider']='';
                        $data['title']='Support';
                        $this->load->view('master',$data);
                    }
                   
                    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */