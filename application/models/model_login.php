<?php 
	class model_login extends CI_Model{
		function __construct(){
			parent:: __construct();
			$this->load->model('model_login');
		}
		function cek_login($table,$where){
			return $this->db->get_where($table,$where);
		}
	}
 ?>