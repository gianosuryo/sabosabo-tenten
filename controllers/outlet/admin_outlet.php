<?php 
 
class Admin_outlet extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url()."index.php/login");
		}
	}
 
	function index(){
		$this->load->view('outlet/v_admin_outlet');
	}
}