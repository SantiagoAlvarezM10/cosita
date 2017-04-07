<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class News extends CI_controller{

		public function index(){
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] =  'Create a news item';			
			$this->load->view('templates/header',$data);
			$this->load->view('news/create');			
			$this->load->view('templates/footer');

		}	


		public function create(){

			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] =  'Create a news item';

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('text','text','required');

			if ($this->form_validation->run() === FALSE) {
				
				$this->load->view('templates/header',$data);
				$this->load->view('news/create');			
				$this->load->view('templates/footer');

			}else{

				$this->load->model('News_model');
				$this->News_model->set_news();
				$this->load->view('news/success');


			}

		}

		public function listarn(){

			$this->load->model('News_model');
			$data['titles'] = $this->News_model->get_all();
			$this->load->view('templates/header',$data);
			$this->load->view('news/listar');			
			$this->load->view('templates/footer');


		}

		public function ver($titl = ''){

			$this->load->model('News_model');
			$data['titles'] = $this->News_model->get_one($titl);
			$this->load->view('templates/header',$data);
			$this->load->view('news/texto');			
			$this->load->view('templates/footer');

		}
	}
?>