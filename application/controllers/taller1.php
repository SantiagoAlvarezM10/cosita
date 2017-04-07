<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Taller1 extends CI_controller{

		public function index(){

			$this->load->view('header');
			$this->load->view('fomulario');
			$this->load->view('footer');

		}

		public function calcular(){
														

			$datos['personas'] = array(array('usuario' => 'juan', 'password' => '12345'),array('usuario' => 'megan', 'password' => '12345'),array('usuario' => 'pablo', 'password' => '12345'),array('usuario' => 'camila', 'password' => '12345'),array('usuario' => 'andres', 'password' => '12345'));

			$aux = 0;

			foreach ($datos['personas'] as $item) {

				if ($this->input->post('user') == $item['usuario'] && $this->input->post('pass') == $item['password'] ) {

					echo "Yep";
					$aux = 1;
				}

			}

			if ($aux == 1) {
				# code...
			}else{
			$error['nombre'] = $this->input->post('user');	
			$this->load->vars($error);
			$this->load->view('header');
			$this->load->view('logerror');			
			$this->load->view('footer');	

			}
			
		}		

	}
?>