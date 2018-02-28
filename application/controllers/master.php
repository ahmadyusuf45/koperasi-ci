<?php 
	class master extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('model_login');
		}
		function index(){
			if($this->session->userdata('status')=='login'){
				redirect('anggota/page');
			}
			$this->load->view('master');
		}
		function aksi_login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' =>$username,
				'password'=>$password
				);
			$cek = $this->model_login->cek_login('petugas',$where)->num_rows();
			$qw = $this->db->where('username',$username)->get('petugas');
			$qy = $this->db->query("SELECT * FROM petugas WHERE username = '$username'");
			$id_login = $qy->row();
			$hsl = $qw->row();
			if($cek > 0 ){
				$data_session=array(
					'nama'=>$username,
					'id'=>$id_login->id_petugas,
					'status'=>'login',
					'level'=>$hsl->level
					);
				$this->session->set_userdata($data_session);
				echo "<script>alert('Selamat Datang $username !')</script>";
					echo "<script>document.location='http://localhost/koperasi/index.php/anggota/page';</script>";
			}else{
				echo "<script>alert('Username Dan Password Salah !')</script>";
				$this->load->view('master');
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect('master');
		}
	}
 ?>