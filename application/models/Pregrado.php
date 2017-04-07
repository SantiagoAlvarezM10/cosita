<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregrado extends Estudio {

	private $profesion;
	private $tarjeta_profesional;

	public function __construct($value = null) {
		parent::__construct($value);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->profesion = isset($value->profesion) ? $value->profesion : null;
				$this->tarjeta_profesional = isset($value->tarjeta_profesional) ? 
					$value->tarjeta_profesional : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'profesion':
			case 'tarjeta_profesional':
			return $this->$key;
			default:
			return parent::__get($key);
		}
	}	

	public function validar($persona) {
		$errores = parent::validar($persona);
		if (!is_array($errores))
			$errores = [];

		if ($this->profesion == null)
			$errores[] = 'La profesion no puede ser vacía';
		if ($this->tarjeta_profesional != null) {
			$errores_tarjeta_profesional = $this->tarjeta_profesional->validar($this);
			
			if (is_array($errores_tarjeta_profesional)) {
				foreach ($errores_tarjeta_profesional as $error) {
					$errores[] = $error;
				}
			}
		}

		return empty($errores) ? TRUE : $errores;
	}

	public function registrar($persona) {
		$flags = 0;

		$this->db->trans_begin();
		$parent_result = parent::registrar($persona);

		if (!$parent_result) {
			$this->db->trans_rollback();
			return $parent_result;
	}

		$data = [
			'estudio' => $this->id,
		    'profesion' => $this->profesion
		];
		if ($this->db->insert('pregrado', $data) !== false) {
			if ($this->tarjeta_profesional != null) {
				if (!$this->tarjeta_profesional->registrar($this)) {
					$this->db->trans_rollback();
					return FALSE;
				}
			}
			$this->db->trans_commit();
			return TRUE;
		}
		$this->db->trans_rollback();
		return FALSE;

	}

	public function actualizar($id = 0) {

		$data = [
			'institucion' => $this->institucion,
			'pais' => $this->pais,
			'fecha_graduacion' => $this->fecha_graduacion
		];

		$this->db->update('estudio', $data , array('id' => $id));

		$data = [
			'profesion' => $this->profesion
		];	

		$this->db->update('pregrado', $data , array('estudio' => $id));	
		
		$data = [
			'fecha_expedicion' => $this->tarjeta_profesional->fecha_expedicion,
			'numero' => $this->tarjeta_profesional->numero
		];

		$this->db->update('tarjeta_profesional', $data , array('pregrado' => $id));				

		return $this;
	}	

	public function obtener_datos($id = 0) {
		$this->load->model('Estudio');
		$this->db->from('estudio')
			->join('pregrado', 'estudio.id = pregrado.estudio')
			->where('id', $id);

		$result = $this->db->get()->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->id = $result[0]->id;
			$this->institucion = $result[0]->institucion;
			$this->pais = $result[0]->pais;
			$this->fecha_graduacion = $result[0]->fecha_graduacion;
			$this->profesion = $result[0]->profesion;
		}

		$query = $this->db->from('pregrado')
					->join('tarjeta_profesional', 'pregrado.estudio = tarjeta_profesional.pregrado')
					->where('estudio', $id);

		$result = $this->db->get()->result();

		if (empty($result)) {
			return FALSE;
		} else {
			$this->load->model('TarjetaProfesional');

			$data = [
			'fecha_expedicion' => $result[0]->fecha_expedicion,
			'numero' => $result[0]->numero
			];

			$tarjeta = new TarjetaProfesional($data);
			$this->tarjeta_profesional = $tarjeta;
		}	

		return $this;
	}

	public function eliminar() {

		return $this->db->delete('estudio', array('id' => $this->id));
		
	}		

}
