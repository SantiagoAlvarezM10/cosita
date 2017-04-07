<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posgrado extends Estudio {

	private $area;
	private $nivel;

	public function __construct($value = null) {
		parent::__construct($value);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->area = isset($value->area) ? $value->area : null;
				$this->nivel = isset($value->nivel) ? $value->nivel : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'area':
			case 'nivel':
			return $this->$key;
			default:
			return parent::__get($key);
		}
	}	

	public function validar($persona) {
		$errores = parent::validar($persona);

		if (!is_array($errores))
			$errores = [];

		if ($this->area == null) {
			$errores[] = 'El área no puede ser vacía';
		}

		if ($this->nivel == null) {
			$errores[] = 'El nivel no puede ser vacío';
		} else {
			if ($this->nivel != 'Especializacion' && $this->nivel != 'Maestria' && $this->nivel != 'Doctorado' && $this->nivel != 'Posdoctorado')
				$errores[] = 'El nivel ingresado es inválido';
		}
		return empty($errores) ? TRUE : $errores;
	}


	public function registrar($persona) {
		$this->db->trans_begin();

		$parent_result = parent::registrar($persona);

		if (!$parent_result) {
			$this->db->trans_rollback();
			return $parent_result;
		}

		$data = [
			'estudio' => $this->id,
			'area' => $this->area,
			'nivel' => $this->nivel
		];
		if ($this->db->insert('posgrado', $data) !== false) {
			$this->db->trans_commit();
			return TRUE;
		} else { 
			$this->db->trans_rollback();
			return FALSE;
		}
	}

	public function actualizar($id = 0) {

		$data = [
			'institucion' => $this->institucion,
			'pais' => $this->pais,
			'fecha_graduacion' => $this->fecha_graduacion
		];

		$this->db->update('estudio', $data , array('id' => $id));

		$data = [
			'area' => $this->area,
			'nivel' => $this->nivel
		];	

		$this->db->update('posgrado', $data , array('estudio' => $id));	
		
		return $this;
	}	

	public function obtener_datos($id = 0) {
		$this->load->model('Estudio');
		$this->db->from('estudio')
			->join('posgrado', 'estudio.id = posgrado.estudio')
			->where('id', $id);

		$result = $this->db->get()->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->id = $result[0]->id;
			$this->institucion = $result[0]->institucion;
			$this->pais = $result[0]->pais;
			$this->fecha_graduacion = $result[0]->fecha_graduacion;
			$this->nivel = $result[0]->nivel;
			$this->area = $result[0]->area;		

			return $this;	
		}	

	}

	public function eliminar() {

		return $this->db->delete('estudio', array('id' => $this->id));
		
	}			
}
