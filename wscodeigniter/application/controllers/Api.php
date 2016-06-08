<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
	function __construct(){
		parent::__construct();
		// Load model m_api.php
		$this->load->model('m_api');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}
	public function index(){
		$coeg = array(
			'name'		=> 'Tugas Besar Web Service',
			'group'		=> '4'
		);
		echo json_encode($coeg);
	}

	public function ambilSemua(){
		// Query from m_api.php
		$ambil = $this->m_api->ambilSemua();
		if(!empty($ambil)){
			foreach ($ambil as $kolom) {
				// data array from database
				$json[] = array(
					'id' 	=> $kolom['id'],
					'nama_barang'		=> $kolom['nama_barang'],
					'jenis_barang' 	=> $kolom['jenis_barang']
				);
			}
		}else{
			$json = array();
		}
		
		// Print with json_encode()
		echo json_encode($json);
	}
	public function ambilSatu(){
		$id = $this->input->get('id');
		// Jika variabel $id tidak kosong
		if(!empty($id)){
			// field condition
			$kolom = array(
				'id' => $id
			);
			// query get one data from model m_api.php
			$ambil = $this->m_api->ambilSatu($kolom);
			$json = array(
				'id' 	=> $ambil['id'],
				'nama_barang'		=> $ambil['nama_barang'],
				'jenis_barang' 	=> $ambil['jenis_barang']
			);
		}else{
			$json = array();
		}
		// Print with json_encode()
		echo json_encode($json);
	}
	public function simpan(){
		$postdata = file_get_contents("php://input");
		$dataObjek = json_decode($postdata);
		@$nama_barang = $dataObjek->data->nama_barang;
		@$jenis_barang = $dataObjek->data->jenis_barang;
		if(!empty($nama_barang)){
			$input = array(
				// field => isi
				'nama_barang'	=> $nama_barang,
				'jenis_barang'	=> $jenis_barang
			);
			$simpan = $this->m_api->simpan($input);
			if($simpan){
				$json['status'] = 1;
			}else{
				$json['status'] = 0;
			}
			echo json_encode($json);
		}	
	}
	public function ubah(){
		$postdata = file_get_contents("php://input");
		$dataObjek = json_decode($postdata);
		@$id = $dataObjek->data->id;
		@$nama_barang = $dataObjek->data->nama_barang;
		@$jenis_barang = $dataObjek->data->jenis_barang;
		if(!empty($nama_barang)){
			$input = array(
				// field => isi
				'nama_barang'	=> $nama_barang,
				'jenis_barang'	=> $jenis_barang
			);
			// Primary key table buku_tamu
			$idna['id'] = $id;
			// Query ubah di model m_api.php
			$simpan = $this->m_api->ubah($input,$idna);
			if($simpan){
				$json['status'] = 1;
			}else{
				$json['status'] = 0;
			}
			echo json_encode($json);
		}	
	}
	public function hapus(){
		@$id = $this->input->get('id');
		if(!empty($id)){
			$idna['id'] = $id;
			// Query hapus di model m_api.php
			$hapus = $this->m_api->hapus($idna);
			if($hapus){
				$json['status'] = 1;
			}else{
				$json['status']	= 0;
			}
		}
		echo json_encode($json);
	}
	
}