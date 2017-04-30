<?php 
 
class Admin_request_outlet extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url()."index.php/login");
		}
	}
 
	function index(){
		$kode_admin = $this->session->userdata('kode_admin');
		
		$this->load->model('outlet/m_requestgudang_outlet');
		$where_lokasi_barang = array (
				'LOKASI' => 'Gudang'
		);
			
		$load_stok_gudang = $this->m_requestgudang_outlet->stok_gudang("daftar_barang",$where_lokasi_barang);
		$load_stok_gudang = array('load_stok_gudang' => $load_stok_gudang);
		
		$load_temp_request = $this->m_requestgudang_outlet->temp_request($kode_admin);
		$load_temp_request = array('load_temp_request' => $load_temp_request);
		
		$data = array_merge($load_stok_gudang, $load_temp_request);
		
		$this->load->view('outlet/v_requestgudang_outlet', $data);
	}
	
	function insert_temp(){
		$kode_admin = $this->session->userdata('kode_admin');
		
		$this->load->model('outlet/m_requestgudang_outlet');
		
		$row = $this->m_requestgudang_outlet->selectmax_nomortemp();
		
		if(isset($row)){
			$nomor_temp = $row->NOMOR_TEMP + 1;
		}
		
		$data = array(
			'NOMOR_TEMP' => $nomor_temp,
			'KODE_BARANG_TEMP' => $this->input->post('kode_barang'),
			'KODE_PEMESAN_TEMP' => $kode_admin,
			'KUANTITAS' => $this->input->post('kuantitas_barang')
			);
		//Transfering data to Model
		$this->m_requestgudang_outlet->temp_insert($data);
		
		redirect(base_url()."index.php/outlet/admin_request_outlet");
	}
	
	function delete_temp(){
		$kode_admin = $this->session->userdata('kode_admin');

		$this->load->model('outlet/m_requestgudang_outlet');
		
		$data = array(
			'NOMOR_TEMP' => $this->input->post('nomor_temp'),
			'KODE_BARANG_TEMP' => $this->input->post('kode_barang'),
			'KODE_PEMESAN_TEMP' => $kode_admin,
			);

		$this->m_requestgudang_outlet->temp_delete($data);
		
		redirect(base_url()."index.php/outlet/admin_request_outlet");
	}
	
	function submit_temp(){
		$kode_admin = $this->session->userdata('kode_admin');

		$this->load->model('outlet/m_requestgudang_outlet');
		$id_temp = $this->input->post('id_temp');
		$x2 = 1;
		
		//SELECT MAX NOMOR
		$rowmax1 = $this->m_requestgudang_outlet->selectmax_koderequest(); 
		$rowmax2 = $this->m_requestgudang_outlet->selectmax_koderequestdetail();
		
		if(isset($rowmax1)){
			$nomor_request = $rowmax1->NOMOR + 1;
		}
		
		if(isset($rowmax2)){
			$nomor_request_detail = $rowmax2->NOMOR + 1;
		}
		
		//MAKE KODE REQUEST
		$kode_request_barang = $kode_admin . $nomor_request;
		
		//INSERT TO REQUEST_BARANG
		date_default_timezone_set('Asia/Jakarta'); 
		$tanggal = date("d-m-Y h:i:sa");
		
		$data = array (
			'NOMOR'  => $nomor_request,
			'KODE_REQUEST'  => $kode_request_barang,
			'TANGGAL_REQUEST'  => $tanggal,
			'KODE_PEMINTA'  => $kode_admin,
			'KODE_PEMBERI'  => '',
			'STATUS_REQUEST'  => 'Belum Ditanggapi'
		);
		$this->m_requestgudang_outlet->request_insert($data);
		
		//INSERT TO DETAIL_REQUEST_BARANG
		$data_select_detail_req = $this->m_requestgudang_outlet->select_barang_request($kode_admin);
		foreach ($data_select_detail_req as $var2) {
			$data2 = array(
				'NOMOR' => $nomor_request_detail,
				'KODE_REQUEST' => $kode_request_barang,
				'KODE_BARANG' => $var2['KODE_BARANG_TEMP'],
				'KONDISI_BARANG' => ''
			);
			
			$this->m_requestgudang_outlet->request_detail_insert($data2);
			$nomor_request_detail++;
		}
		
		foreach ($id_temp as $nomor_temp) {
			$data = array(
				'NOMOR_TEMP' => $nomor_temp,
				'KODE_PEMESAN_TEMP' => $kode_admin
			);
			
			$this->m_requestgudang_outlet->temp_delete($data);
		}

		redirect(base_url()."index.php/outlet/admin_request_outlet");
	}
	
}