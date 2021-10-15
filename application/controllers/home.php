<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('common');
       $this->load->model('AuthModel');

	}

	public function index()
	{
		if(is_logged_in())
		{
			redirect('admin/dashboard');
		}

		$data['metaTitle']="Admin Login";

		$this->load->view('login',$data);
	}	 

	public function loginNow()
	{

		if($this->input->post('submit')!=' ')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('pwd', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$err = validation_errors(); 
				$this->session->set_flashdata('error',$err);
				redirect('admin/login');
			}
			else{
				$email=$this->input->post('email');
				$pwd=$this->input->post('pwd');
	      		$getData=$this->AuthModel->getAdmin($email,$pwd);
			
				if(count($getData)!=0)
				{
					$rid=$getData[0]->id;
					$this->session->set_userdata('loggedinAdminId',$rid);
					$this->session->set_userdata('isAdminLoggedIn',true);
					redirect('admin/dashboard');
				}
				else
				{
					redirect('admin/login');
				}
			}
		}
		else
		{
			redirect('admin');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

}
