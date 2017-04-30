<?php 
 
class M_requestgudang_outlet extends CI_Model{	

	function stok_gudang($table,$where){		
		$query = $this->db->get_where($table,$where);
		return $query->result_array();
	}

	function temp_request($data){
		$kode_admin = $data;
		$query = $this->db->query("SELECT temporary_request_outlet.NOMOR_TEMP, daftar_barang.NAMA_BARANG, daftar_barang.KODE_BARANG, temporary_request_outlet.KUANTITAS, daftar_barang.KETERANGAN 
		FROM  daftar_barang, temporary_request_outlet, admin_saboten 
		WHERE temporary_request_outlet.KODE_PEMESAN_TEMP = '$kode_admin'
		AND daftar_barang.KODE_BARANG = temporary_request_outlet.KODE_BARANG_TEMP 
		AND admin_saboten.KODE_ADMIN = temporary_request_outlet.KODE_PEMESAN_TEMP");
		return $query->result_array();
	}	
	
	function temp_insert($data){
		$this->db->insert('temporary_request_outlet', $data);
	}
	
	function selectmax_nomortemp(){
		$this->db->select_max('NOMOR_TEMP');
		$query = $this->db->get('temporary_request_outlet'); 
		
		return $query->row();
	}
	
	function temp_delete($data){
		$this->db->delete('temporary_request_outlet', $data);
	}
	
	function request_insert($data){
		$this->db->insert('request_outlet_gudang', $data);
	}
	
	function request_detail_insert($data){
		$this->db->insert('detail_request_outlet_gudang', $data);
	}
	
	function select_barang_request($data){
		$kode_admin = $data;
		$query = $this->db->query("SELECT KODE_BARANG_TEMP 
		FROM  temporary_request_outlet
		WHERE KODE_PEMESAN_TEMP = '$kode_admin'");
		return $query->result_array();
	}
	
	function selectmax_koderequest(){
		$this->db->select_max('NOMOR');
		$query = $this->db->get('request_outlet_gudang'); 
		
		return $query->row();
	}
	
	function selectmax_koderequestdetail(){
		$this->db->select_max('NOMOR');
		$query = $this->db->get('detail_request_outlet_gudang'); 
		
		return $query->row();
	}
	
}


?>