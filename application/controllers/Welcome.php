<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$data = $this->mymodel->GetBuku();
		$this->load->view('daftar-buku',array('data' => $data));
	}

	public function insert(){
		echo "tes";
	}

	public function update(){
	}

	public function delete(){
	}

	public function panggil(){
		$data = $this->db->query("SELECT * FROM buku");
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		echo "Jumlah data = ".$data->num_rows()."<hr />";
		foreach ($data->result() as $row){
			echo "ISBN : ".$row->isbn."<br />";
			echo "ID Pengarang : ".$row->idpgr."<br />";
			echo "Kode Jenis Buku : ".$row->kodebk."<br />";
			echo "Judul Buku : ".$row->judul."<br />";
			echo "Kota Terbit : ".$row->kota."<br />";
			echo "Tahun Terbit : ".$row->tahun."<br />";
			echo "Stok Buku : ".$row->stokbk."<br />";
			echo "Harga Buku : ".$row->hargabk."<br />";
			echo "<hr />";
		}
	}
}
