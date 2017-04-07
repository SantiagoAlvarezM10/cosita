<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Estudios extends CI_controller{

		public function index(){
			
			$head['title'] =  'Estudios';			
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/inicio');			
			$this->load->view('templates/footer');

		}	

		public function registrar_perv(){
			
			$head['title'] =  'Registrar Persona';			
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/registrar');			
			$this->load->view('templates/footer');

		}

		public function registrar_perm(){
			
			$data = array('tipo_documento' => $this->input->post('tdoc'),
						'numero_documento' => $this->input->post('ndoc'),
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellido'),
						'sexo' => $this->input->post('sexo'),
						'fecha_nacimiento' => $this->input->post('fecha'),
						'direccion' => $this->input->post('direccion'),
						'ciudad' => $this->input->post('ciudad'),
						'email' => $this->input->post('email'),
						'telefono' => $this->input->post('telefono'),
						'nacionalidad' => $this->input->post('nacionalidad')
					);

			$this->load->model('Persona');
			$persona = new Persona($data);	
			$errores = $persona->validar();

			if ($errores[0] == '') {

				$persona->registrar();
			
			$head['title'] = 'Registro';
			$head['success'] = 'Persona registrada correctamente';			
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

		public function modificar_perv($ndoc = 0){
			
			$head['title'] =  'Actualizar persona';

			$this->load->model('Persona');
			$data = array('numero_documento' => $ndoc);				
			$persona = new Persona($data);
			$persona->obtener_datos();	
			$head['persona'] = $persona;	

			$this->load->view('templates/header',$head);
			$this->load->view('estudios/modificar_persona');			
			$this->load->view('templates/footer');

		}

		public function modificar_perm(){
			
			$data = array('tipo_documento' => $this->input->post('tdoc'),
						'numero_documento' => $this->input->post('ndoc'),
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellido'),
						'sexo' => $this->input->post('sexo'),
						'fecha_nacimiento' => $this->input->post('fecha'),
						'direccion' => $this->input->post('direccion'),
						'ciudad' => $this->input->post('ciudad'),
						'email' => $this->input->post('email'),
						'telefono' => $this->input->post('telefono'),
						'nacionalidad' => $this->input->post('nacionalidad')
					);

			$this->load->model('Persona');
			$persona = new Persona($data);	
			$errores = $persona->validar();

			if ($errores[0] == '') {

				$persona->actualizar();
			
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

		public function eliminar_per($ndoc = 0){
			
			$this->load->model('Persona');
			$data = array('numero_documento' => $ndoc);				
			$persona = new Persona($data);
			$persona->eliminar();	

			$head['title'] = 'Eliminar';
			$head['success'] = 'Persona eliminada correctamente';			
			$this->load->view('templates/header',$head);	
			$this->load->view('estudios/success');						
			$this->load->view('templates/footer');	

		}		

		public function listar(){
			
			$head['title'] = 'Personas';
			$this->load->model('Persona');	
			$head['personas'] = $this->Persona->obtener_todas();					
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/listar');		
			$this->load->view('templates/footer');

		}

		public function detalle_per($ndoc = 0){

			$this->load->model('Persona');
			$this->load->model('Estudio');							
			$head['title'] = 'Detalle';	
			$data = array('numero_documento' => $ndoc);		
			$persona = new Persona($data);											
			$persona->obtener_datos();
			$head['personas'] = $persona;	
			$head['estudios'] = $this->Estudio->obtener_estudios_por_persona($persona);				
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/detalle');		
			$this->load->view('templates/footer');

		}	

		public function registrar_prev($persona = '',$ndoc = 0){
			
			$head['title'] =  'Registrar pregrado';
			$head['persona'] = $persona;
			$head['ndoc'] = $ndoc;					
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/registro_pregrado');			
			$this->load->view('templates/footer');

		}

		public function registrar_prem($ndoc = 0){
			
			$data = array('fecha_expedicion' => $this->input->post('fecha_expedicion'),
							'numero' => $this->input->post('numero_tp')
					);			

			$this->load->model('TarjetaProfesional');		
			$tarjeta = new TarjetaProfesional($data);

			$data = array('institucion' => $this->input->post('institucion'),
						'pais' => $this->input->post('pais'),
						'fecha_graduacion' => $this->input->post('fecha_graduacion'),
						'profesion' => $this->input->post('profesion'),
						'tarjeta_profesional' => $tarjeta	
					);

			$this->load->model('Estudio');
			$this->load->model('Pregrado');			
			$pregrado = new Pregrado($data);

			$this->load->model('Persona');
			$data = array('numero_documento' => $ndoc);				
			$persona = new Persona($data);
			$persona->obtener_datos();							

			$errores = $pregrado->validar($persona);
			
			if ($errores[0] == '') {

				$pregrado->registrar($persona);
			
				$head['title'] = 'Registro';
				$head['success'] = 'Pregrado añadido correctamente';				
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

		public function modificar_prev($persona = '',$id = 0){
			
			$this->load->model('Estudio');			
			$this->load->model('Pregrado');
			$pregrado = new Pregrado();
			$pregrado->obtener_datos($id);

			$head['title'] =  'Actualizar pregrado';
			$head['persona'] = $persona;
			$head['pregrado'] = $pregrado;

			$this->load->view('templates/header',$head);
			$this->load->view('estudios/modificar_pregrado');			
			$this->load->view('templates/footer');

		}

		public function modificar_prem($id = 0){
			
			$data = array('fecha_expedicion' => $this->input->post('fecha_expedicion'),
							'numero' => $this->input->post('numero_tp')
					);			

			$this->load->model('TarjetaProfesional');		
			$tarjeta = new TarjetaProfesional($data);

			$data = array('institucion' => $this->input->post('institucion'),
						'pais' => $this->input->post('pais'),
						'fecha_graduacion' => $this->input->post('fecha_graduacion'),
						'profesion' => $this->input->post('profesion'),
						'tarjeta_profesional' => $tarjeta	
					);

			$this->load->model('Estudio');
			$this->load->model('Pregrado');					
			$pregrado = new Pregrado($data);
			$this->load->model('Persona');			
					
			$errores = $pregrado->validar(new Persona());
			
			if ($errores[0] == '') {

				$pregrado->actualizar($id);
			
				$head['title'] = 'Actualizacion';
				$head['success'] = 'Pregrado actualizado correctamente';				
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

		public function eliminar_pre($id = 0){
			
			$this->load->model('Estudio');
			$this->load->model('Pregrado');			
			$data = array('id' => $id);				
			$pregrado = new Pregrado($data);
			$pregrado->eliminar();	

			$head['title'] = 'Eliminar';
			$head['success'] = 'Pregrado eliminado correctamente';			
			$this->load->view('templates/header',$head);	
			$this->load->view('estudios/success');						
			$this->load->view('templates/footer');	

		}				

		public function registrar_posv($persona = '',$ndoc = 0){
			
			$head['title'] =  'Registrar posgrado';
			$head['persona'] = $persona;
			$head['ndoc'] = $ndoc;					
			$this->load->view('templates/header',$head);
			$this->load->view('estudios/registro_posgrado');			
			$this->load->view('templates/footer');

		}

		public function registrar_posm($ndoc = 0){
			
			$data = array('institucion' => $this->input->post('institucion'),
						'pais' => $this->input->post('pais'),
						'fecha_graduacion' => $this->input->post('fecha_graduacion'),
						'area' => $this->input->post('area'),
						'nivel' => $this->input->post('nivel')	
					);

			$this->load->model('Estudio');
			$this->load->model('Posgrado');			
			$posgrado = new Posgrado($data);

			$this->load->model('Persona');
			$data = array('numero_documento' => $ndoc);				
			$persona = new Persona($data);
			$persona->obtener_datos();							

			$errores = $posgrado->validar($persona);
			
			if ($errores[0] == '') {

				$posgrado->registrar($persona);
			
				$head['title'] = 'Registro';
				$head['success'] = 'Posgrado añadido correctamente';				
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

		public function modificar_posv($persona = '',$id = 0){

			$this->load->model('Estudio');			
			$this->load->model('Posgrado');
			$posgrado = new Posgrado();
			$posgrado->obtener_datos($id);

			$head['title'] =  'Actualizar posgrado';
			$head['persona'] = $persona;
			$head['posgrado'] = $posgrado;

			$this->load->view('templates/header',$head);
			$this->load->view('estudios/modificar_posgrado');			
			$this->load->view('templates/footer');

		}

		public function modificar_posm($id = 0){
			
			$data = array('institucion' => $this->input->post('institucion'),
						'pais' => $this->input->post('pais'),
						'fecha_graduacion' => $this->input->post('fecha_graduacion'),
						'area' => $this->input->post('area'),
						'nivel' => $this->input->post('nivel')	
					);

			$this->load->model('Estudio');
			$this->load->model('Posgrado');			
			$posgrado = new Posgrado($data);

			$this->load->model('Persona');			
			$persona = new Persona();
			$persona->obtener_datos();							

			$errores = $posgrado->validar($persona);
			
			if ($errores[0] == '') {

				$posgrado->actualizar($id);
			
				$head['title'] = 'Actualizacion';
				$head['success'] = 'Posgrado actualizado correctamente';				
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

		public function eliminar_pos($id = 0){
			
			$this->load->model('Estudio');
			$this->load->model('Posgrado');			
			$data = array('id' => $id);				
			$posgrado = new Posgrado($data);
			$posgrado->eliminar();	

			$head['title'] = 'Eliminar';
			$head['success'] = 'Pregrado eliminado correctamente';			
			$this->load->view('templates/header',$head);	
			$this->load->view('estudios/success');						
			$this->load->view('templates/footer');	

		}																					

	}
?>