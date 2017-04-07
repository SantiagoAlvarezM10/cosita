<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function set_news(){

		$this->load->database();
		$data = array('title' => $this->input->post('title'), 'text' => $this->input->post('text'));

		return $this->db->insert('news',$data);

	}

	public function get_all(){

		$this->load->database();
		$query = $this->db->get('news');
		return $query->result();
	}

	public function get_one($titl){

		$this->load->database();
		$query = $this->db->get_where('news',array('title' => $titl));
		return $query->result();
	}

}