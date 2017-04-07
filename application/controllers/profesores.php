<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profesores extends CI_controller{

		public function index(){
			
			$head['title'] =  'Profesor';			
			$this->load->view('templates/header',$head);
			$this->load->view('profesor/inicio');			
			$this->load->view('templates/footer');

		}	

		public function registrar_prov(){
			
			$head['title'] =  'Registrar Profesor';			
			$this->load->view('templates/header',$head);
			$this->load->view('profesor/registrar');			
			$this->load->view('templates/footer');

		}

		public function registrar_prom(){
			
			$data = array('cedula' => $this->input->post('cedula'),
						'nombre' => $this->input->post('nombre'),
						'fecha_nacimiento' => $this->input->post('fecha_nac'),
						'lugar_nacimiento' => $this->input->post('lugar_nac'),
						'titulo' => $this->input->post('titulo')
					);

			$this->load->model('Profesor');
			$profesor = new Profesor($data);	
			$errores = $profesor->validar();

			if ($errores[0] == '') {

				$profesor->registrar();
			
			$head['title'] = 'Registro';
			$head['success'] = 'Profesor registrado correctamente';			
			$this->load->view('templates/header',$head);	
			$this->load->view('profesor/success');						
			$this->load->view('templates/footer');				

			}else{

				$dat['titulo'] = 'Error';
				$dat['errores'] = $errores;
				$this->load->vars($dat);
				$this->load->view('profesor/error');
				$this->load->view('templates/footer');													

			}
		}

		public function modificar_prov($cedula = 0){
			
			$head['title'] =  'Actualizar profesor';

			$this->load->model('Profesor');
			$data = array('cedula' => $cedula);				
			$profesor = new Profesor($data);
			$profesor->obtener_datos();	
			$head['profesor'] = $profesor;	

			$this->load->view('templates/header',$head);
			$this->load->view('profesor/modificar_profesor');			
			$this->load->view('templates/footer');

		}

		public function modificar_prom(){
			
			$data = array('cedula' => $this->input->post('cedula'),
						'nombre' => $this->input->post('nombre'),
						'fecha_nacimiento' => $this->input->post('fecha_nac'),
						'lugar_nacimiento' => $this->input->post('lugar_nac'),
						'titulo' => $this->input->post('titulo')
					);

			$this->load->model('Profesor');
			$profesor = new Profesor($data);	
			$errores = $profesor->validar();

			if ($errores[0] == '') {

				$profesor->actualizar();
			
			$head['title'] = 'Registro';
			$head['success'] = 'Persona actualizada correctamente';			
			$this->load->view('templates/header',$head);	
			$this->load->view('estudios/success');						
			$this->load->view('templates/footer');				

			}else{

				$dat['titulo'] = 'Error';
				$dat['errores'] = $errores;
				$this->load->vars($dat);
				$this->load->view('estudios/error');
				$this->load->view('templates/footer');									

			}
		}

		public function listar(){
			
			$head['title'] = 'Profesores';
			$this->load->model('Profesor');	
			$head['profesores'] = $this->Profesor->obtener_todas();					
			$this->load->view('templates/header',$head);
			$this->load->view('profesor/listar');		
			$this->load->view('templates/footer');

		}
																				
	}
?>