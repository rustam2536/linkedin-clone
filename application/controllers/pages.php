<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
       $this->load->model('SliderModel');
       $this->load->helper('form');
       $this->load->helper('common');
	   if(!is_logged_in())
		{
			redirect('admin');
		}
		// $this->load->view('admin');
	   
	}

	public function index()
	{
		
		
	}
	
	
	public function slidersList()
	{
		$data['pageTitle']="Sliders";
		$data['getData']=$this->SliderModel->getData();
		
		$this->load->view('slider/sliders',$data);
		
	}
	public function dashboard()
	{
		$data['pageTitle']="welcome to dashboard";
		
		$this->load->view('slider/dashboard',$data);
	}

	public function contentManage()
	{
		$data['pageTitle']="contentManage";
		$data['getData']=$this->SliderModel->getContent();
		
		$this->load->view('slider/contentManage',$data);
	}

	public function change()
	{
		$r = '<option value="services">services</option><option value="client" id="client">our clients</option><option value="about" >about us</option>';
		echo $r;
	}

	public function change1()
	{
		$r = '<option value="section1">section1</option>';
		echo $r;
	}

	public function change2()
	{
		$r = '<option value="block1">block1</option><option value="block2">block2</option>
			<option value="block3">block3</option><option value="block4">block4</option>
			<option value="block5">block5</option><option value="block6">block6</option>';
		echo $r;
	}

	public function change3()
	{
		$r = '<option value="app">app</option><option value="card">card</option><option value="web">web</option>';
		echo $r;
	}

	public function change4()
	{
		$r = '<option value="person1">person1</option><option value="person2">person2</option><option value="person3">person3</option>';
		echo $r;
	}


	public function addContent()
	{
		// $data['get']=$this->SliderModel->aboutus();
		$this->load->view('slider/add-content');

		if($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('navbar','', 'required');
			if (empty($_FILES['myfile']['name']))
			{
				// $this->form_validation->set_rules('myfile', 'Image', 'required');
			}
			if ($this->form_validation->run() == FALSE)
			{
				$err = validation_errors(); 
				$this->session->set_flashdata('error',$err);
			}
			else
			{
				$title=$this->input->post('title');					
				$nav=$this->input->post('navbar');					
				$sec=$this->input->post('section');					
				$msg=$this->input->post('msg');					
				$config['upload_path']          = './public/uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['encrypt_name']         = TRUE;
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('myfile'))
				{
					$error = array('error' => $this->upload->display_errors());
					$err=$error['error'];
					$this->session->set_flashdata('error',$err);
					redirect('admin/addContent');
				}
				else
				{
					$imgData=$this->upload->data();
					$fileName=$imgData['file_name'];
					$aDate=date('Y-m-d H:i:s');
					$arr = array('title' => $title,'image' => $fileName,'description' => $msg ,'navbar' => $nav,'section' => $sec);
					$c = 'cmanage';
					$this->SliderModel->addContent($c,$arr);
					$arr1 = array('title' => $title,'image' => $fileName,'description' => $msg ,'section' => $sec);
					if($nav=="home"){
						$this->SliderModel->addContent($nav,$arr1);
					}elseif ($nav=="about") {
						$this->SliderModel->addContent($nav,$arr1);
					}elseif ($nav=="services") {
						$this->SliderModel->addContent($nav,$arr1);
					}elseif ($nav=="portfolio") {
						$this->SliderModel->addContent($nav,$arr1);
					}else{
						$this->SliderModel->addContent($nav,$arr1);
					}
					$this->session->set_flashdata('success','Content added');
					redirect('admin/contentManage');
				}
			}
		}
	}

	public function viewf()
	{
		$data['pageTitle']="welcome";
		$data['getDt']=$this->SliderModel->getView();
		$data['getDta']=$this->SliderModel->gethm();
		$data['getDtb']=$this->SliderModel->getabt();
		$data['getDtcl']=$this->SliderModel->getclient();
		
		$this->load->view('front/v',$data);
	}
	
	public function about()
	{
		$data['getDtb']=$this->SliderModel->getabt();
		$this->load->view('front/about',$data);
	}

	public function portfolio()
	{
		$data['getDtd']=$this->SliderModel->getprtf();
		$this->load->view('front/portfolio',$data);
	}

	public function team()
	{
		$data['getDte']=$this->SliderModel->gettm();
		$this->load->view('front/team',$data);
	}

	public function services()
	{
		$data['getDtc']=$this->SliderModel->gethm();
		$this->load->view('front/services',$data);
	}

	public function contact()
	{
		$this->load->view('front/contact');
	}

	public function addSlider()
	{
		$data['pageTitle']="My Slider";

		if($this->input->post('submit'))
		{
			$this->load->library('form_validation');

			 $this->form_validation->set_rules('title', 'Title', 'required');
			 if (empty($_FILES['myfile']['name']))
	         {
	            $this->form_validation->set_rules('myfile', 'Image', 'required');
	         }
             
             if ($this->form_validation->run() == FALSE)
                {
					$err = validation_errors(); 
					$this->session->set_flashdata('error',$err);
                }
                else
                {
                    $title=$this->input->post('title');					
					$config['upload_path']          = './public/uploads/';
		            $config['allowed_types']        = 'gif|jpg|png';
		            $config['encrypt_name']         = TRUE;
		            $this->load->library('upload', $config);

		            if ( ! $this->upload->do_upload('myfile'))
		                {
		                    $error = array('error' => $this->upload->display_errors());
		                    $err=$error['error'];
		                    $this->session->set_flashdata('error',$err);
		                    redirect('admin/add-slider');
		                }
		                else
		                {
		                	$imgData=$this->upload->data();
		                	$fileName=$imgData['file_name'];
		                	$aDate=date('Y-m-d H:i:s');
		                    $arr = array('title' => $title,'image' => $fileName,'added_on' => $aDate);
							$s = 'slider';
		                    $this->SliderModel->addContent($s,$arr);
		                    $this->session->set_flashdata('success','Slider added');
		                    redirect('admin/sliders');
		                }
                }

		}
		
		$this->load->view('slider/add-slider',$data);		
	}

	public function deleteData()
	{
		$rowId=$this->input->post('rowId');
		$this->SliderModel->deleteRow($rowId);
	}

	public function deleteContent()
	{
		$rowId=$this->input->post('rowId');
		$this->SliderModel->deleteCon($rowId);
	}

	public function status()
	{
		$rowId=$this->input->post('rId');
		$mode=$this->input->post('md');
		if($mode==1)
		{
			$st = array('status'=> 0);
			$front= '<a onclick="statusToggle('.$rowId.',0)" class="btn btn-sm btn-danger">dective</a>';
		}
		else{
			$st = array('status'=> 1);
			$front= '<a onclick="statusToggle('.$rowId.',1)" class="btn btn-sm btn-success">Active</a>';
		}
		$this->SliderModel->status_update($rowId,$st);
		echo $front;
	}

	public function statusCon()
	{
		$rowId=$this->input->post('rId');
		$mode=$this->input->post('md');
		if($mode==1)
		{
			$st = array('status'=> 0);
			$front= '<a onclick="statusContent('.$rowId.',0)" class="btn btn-sm btn-danger">dective</a>';
		}
		else{
			$st = array('status'=> 1);
			$front= '<a onclick="statusContent('.$rowId.',1)" class="btn btn-sm btn-success">Active</a>';
		}
		$this->SliderModel->statusUpdt($rowId,$st);
		echo $front;
	}

	public function editSlider($id)
	{
		$data['pageTitle']="Edit Slider";
        $data['getData']=$this->SliderModel->getSliderDetail($id);
		$this->load->view('slider/edit-slider',$data);
	}

	public function editCont($id)
	{
		$data['pageTitle']="Edit ";
        $data['getData']=$this->SliderModel->getContentDetail($id);
		$this->load->view('slider/edit-content',$data);
	}

	public function updateContent()
	{
		if($this->input->post('btn'))
		{
           $rowId=$this->input->post('row_id');
           $title=$this->input->post('title');

		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('title', 'Title', 'required');
		   
		   if ($this->form_validation->run() == FALSE)
			{
				$err = validation_errors(); 
				$this->session->set_flashdata('error',$err);
				redirect('admin/edit-content/'.$rowId);
			}
			else{
				$dtArray=array('title' => $title);
				$this->SliderModel->updateconte($dtArray,$rowId);
			
				if(!empty($_FILES['myfile']['name']))
				{
					$config['upload_path']          = './public/uploads/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['encrypt_name']         = TRUE;
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('myfile'))
					{
						$error = array('error' => $this->upload->display_errors());
						$err=$error['error'];
						$this->session->set_flashdata('error',$err);
						redirect('admin/edit-content/'.$rowId);
					}
					else
					{
						$imgData=$this->upload->data();
						$fileName=$imgData['file_name'];
						$cDate=date('Y-m-d H:i:s');
						$arr = array('image' => $fileName);
						$this->SliderModel->updateConte($arr,$rowId);
						$this->session->set_flashdata('success','Content updated');
						redirect('admin/contentManage');
					}
				}
				else
				{
					$this->session->set_flashdata('success','Content updated');
					redirect('admin/contentManage');
				}
			}
		}
		else
		{
			echo "Error";
		}
	}

	public function updateSlider()
	{
		if($this->input->post('submit'))
		{
           $rowId=$this->input->post('row_id');
           $title=$this->input->post('title');

		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('title', 'Title', 'required');
		   
		   if ($this->form_validation->run() == FALSE)
			{
				$err = validation_errors(); 
				$this->session->set_flashdata('error',$err);
				redirect('admin/edit-slider/'.$rowId);
			}
			else{
				$dtArray=array('title' => $title);
				$this->SliderModel->updateSlider($dtArray,$rowId);
			
				if(!empty($_FILES['myfile']['name']))
				{
					$config['upload_path']          = './public/uploads/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['encrypt_name']         = TRUE;
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('myfile'))
					{
						$error = array('error' => $this->upload->display_errors());
						$err=$error['error'];
						$this->session->set_flashdata('error',$err);
						redirect('admin/edit-slider/'.$rowId);
					}
					else
					{
						$imgData=$this->upload->data();
						$fileName=$imgData['file_name'];
						$cDate=date('Y-m-d H:i:s');
						$arr = array('image' => $fileName);
						$this->SliderModel->updateSlider($arr,$rowId);
						$this->session->set_flashdata('success','Slider updated');
						redirect('admin/sliders');
					}
				}
				else
				{
					$this->session->set_flashdata('success','Slider updated');
					redirect('admin/sliders');
				}
			}
		}
		else
		{
			echo "Error";
		}
	}
}
