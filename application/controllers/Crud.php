<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}



	public function index(){
		$data['buku'] = $this->db->get('buku');
		$this->load->view('crud/index', $data);
	}

	public function tambahbuku(){
		$this->load->view('crud/tambahbuku');
	}

	public function protambahbuku(){
		$isbn = $_POST['isbn'];
		$idpgr = $_POST['idpgr'];
		$kodebk = $_POST['kodebk'];
		$judul = $_POST['judul'];
		$kota = $_POST['kota'];
		$tahun = $_POST['tahun'];
		$stokbk = $_POST['stokbk'];
		$hargabk = $_POST['hargabk'];
		$data_insert = array(
			'isbn' => $isbn,
			'idpgr' => $idpgr,
			'kodebk' => $kodebk,
			'judul' => $judul,
			'kota' => $kota,
			'tahun' => $tahun,
			'stokbk' => $stokbk,
			'hargabk' => $hargabk
		);
		$res = $this->db->insert('buku',$data_insert);
		if($res>=1){
			redirect('crud','refresh');
		}else{
			echo '<center><strong>Mohon maaf, data yang anda masukkan telah digunakan</strong></center><br>'; 
		}
	}

	public function editbuku($isbn = NULL )
	{
		$this->db->where('isbn', $isbn);
		$data['buku'] = $this->db->get('buku');
		$this->load->view('crud/editbuku',$data);
	}

	public function proeditbuku($isbn =''){
		$data = array(
			'idpgr' => $this->input->post ('idpgr'),
			'kodebk' => $this->input->post ('kodebk'),
			'judul' => $this->input->post ('judul'),
			'kota' => $this->input->post ('kota'),
			'tahun' => $this->input->post ('tahun'),
			'stokbk' => $this->input->post ('stokbk'),
			'hargabk' => $this->input->post ('hargabk')
		);
		$this->db->where('isbn', $isbn);
		$this->db->update('buku', $data);
		redirect('crud');
	}

	public function hapusbuku( $isbn = NULL)
	{
		$this->db->where('isbn', $isbn);
		$this->db->delete('buku');
		redirect('crud');
	}
}