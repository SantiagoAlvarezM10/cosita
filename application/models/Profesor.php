<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Model {

	private $cedula;
	private $nombre;
	private $fecha_nacimiento;
	private $lugar_nacimiento;
	private $titulo;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->cedula = isset($value->cedula)? $value->cedula : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->fecha_nacimiento = isset($value->fecha_nacimiento)? $value->fecha_nacimiento : null;
				$this->lugar_nacimiento = isset($value->lugar_nacimiento)? $value->lugar_nacimiento : null;
				$this->titulo = isset($value->titulo)? $value->titulo : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'cedula':
			case 'nombre':
			case 'fecha_nacimiento':
			case 'lugar_nacimiento':
			case 'titulo':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->cedula == null) {
			$errores[] = 'La cedula no puede ser vacía';
		}

		if ($this->nombre == null) {
			$errores[] = 'El nombre no puede ser vacío';
		}

		if ($this->fecha_nacimiento == null) {
			$errores[] = 'La fecha de nacimiento no puede ser vacía';
		}

		if ($this->lugar_nacimiento == null) {
			$errores[] = 'El lugar de nacimiento no puede ser vacío';
		}

		if ($this->titulo == null) {
			$errores[] = 'El titulo no puede ser vacío';
		} else if ($this->titulo != 'Msc' && $this->titulo != 'PhD') {
			$errores[] = 'El titulo debe ser Msc ó PhD';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'lugar_nacimiento' => $this->lugar_nacimiento,
			'titulo' => $this->titulo
		];

		return $this->db->insert('profesor', $data);
	}

	public function actualizar() {
		$data = [
			'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'lugar_nacimiento' => $this->lugar_nacimiento,
			'titulo' => $this->titulo
		];

		return $this->db->update('profesor', $data , array('cedula' => $this->cedula));
	}	

	public function obtener_datos() {
		$query = $this->db->get_where('profesor', ['cedula' => $this->cedula]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->cedula = $result[0]->cedula;
			$this->nombre = $result[0]->nombre;
			$this->fecha_nacimiento = $result[0]->fecha_nacimiento;
			$this->lugar_nacimiento = $result[0]->lugar_nacimiento;
			$this->titulo = $result[0]->titulo;
			return $this;
		}
	}

	public function obtener_todas() {
		$query = $this->db->get('profesor');

		$result = [];

		foreach ($query->result() as $key=>$persona) {
			$result[$key] = new Profesor($persona);
		}

		return $result;
	}

	
}