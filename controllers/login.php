<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		
		$where = array(
			'kode_admin' => $username,
			'pass_admin' => $password
		);
			
		$cek = $this->m_login->cek_login("admin_saboten",$where);
		
		if(isset($cek)){
			$nama_admin = $cek->NAMA_ADMIN;
			$kode_admin = $cek->KODE_ADMIN;
			$keterangan = $cek->KETERANGAN;
			$kode_posisi = $cek->KODE_POSISI;
		}
		
		///////////////// CHECKING KODE_POSISI // G = Gudang, 1,2,3,4, n = Outlet, null = Username n password Salah
		
		if($kode_posisi == null){
			echo "Username dan password salah !";
		} 
		
		elseif($kode_posisi == 'G'){
			//LOGIN MASUK DASHBOARD ADMIN GUDANG
		}
		
		else{
			//LOGIN MASUK DASHBOARD ADMIN OUTLET
			
			$data_session = array(
				'nama_admin' => $nama_admin,
				'kode_admin' => $kode_admin,
				'keterangan' => $keterangan,
				'kode_posisi' => $kodeposisi,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url()."index.php/outlet/admin_outlet");
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."index.php/login");
	}
}
