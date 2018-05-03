<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	public function GetBuku($where=""){
		$data = $this->db->query('SELECT * FROM buku '.$where);
		return $data->result_array();
	}

	public function InsertData($table,$data){
		$res = $this->db->insert($table,$data);
		return $res;
	}

	public function UpdateData($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function ProUpdate($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function DeleteData($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
		$res = $this->db->delete($table,$where);
		return $res;
	}

	public function GetATK(){
		$data = $this->db->query('SELECT * FROM atk');
		return $data->result_array();
	}
}