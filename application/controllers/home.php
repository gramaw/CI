<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}



	public function index(){
		$data = $this->mymodel->GetBuku();
		$this->load->view('crud/index',array('data' => $data));
	}

	public function tambahbuku(){
		$this->load->view('tambah-buku');
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
			redirect('buku/index');
		}else{
			echo '<center><strong>Mohon maaf, data yang anda masukkan telah digunakan</strong></center><br>'; 
		}
	}

	public function editbuku($isbn = NULL){
		$this->db->where('isbn', $isbn);
		$data['content'] = $this->db->get('buku');
		$this->load->view('edit-buku' ,$data);
	}

	public function action_update($isbn ='')
	{
		$data = array(
			'idpgr' => $this->input->post('$idpgr'),
			'kodebk' => $this->input->post('$kodebk'),
			'judul' => $this->input->post('$judul'),
			'kota' => $this->input->post('$kota'),
			'tahun' => $this->input->post('$tahun'),
			'stokbk' => $this->input->post('$stokbk'),
			'hargabk' => $this->input->post('$hargabk')
		);
		$this->db->where('isbn', $isbn);
		$this->db->update('buku', $data);

		$this->load->helper('url');
		redirect('buku','refresh');
	}

	public function hapusbuku($isbn){
		$where = array('isbn' => $isbn);
		$res = $this->mymodel->DeleteData('buku',$where);
		if($res>=1){
			$this->load->helper('url');
			redirect('buku/index');
		}
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
