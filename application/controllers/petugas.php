<?php 
	class petugas extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_petugas');
		}
		function page(){
			$page = $this->uri->segment(3);
			if(empty($page)){
				$page= 'beranda';
			}
			$data['page'] = $page;
			$data['folder'] = "petugas/";
			if($page == 'petugas'){
				$data['tmp_petugas'] = $this->model_petugas->tmp_petugas()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_petugas'){
				$f_petugas = $this->uri->segment(4);
				if(empty($f_petugas)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick'] = 'simpan_petugas()';
 				}else{
 					$data['status'] = 'edit';
 					$data['judul'] = 'Edit Data';
 					$data['value'] = 'Edit';
 					$data['onclick'] = 'edit_petugas()';
 					$data['hsl'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$f_petugas'");
 				}
				$this->load->view('content/petugas/f_petugas',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_petugas(){
			$kode = $this->model_petugas->id_petugas();
			$ar = array(
				'id_petugas' => $kode,
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
				'level' =>$this->input->post('level')
			);
			$this->model_petugas->simpan_petugas('petugas',$ar);
		}
		function edit_petugas(){
			$id = $this->input->post('id_petugas');
			$ar = array(
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
				'level' =>$this->input->post('level')
			);
			$this->model_petugas->edit_petugas('petugas',$id,$ar);
		}
		function hapus_petugas(){
			$this->model_petugas->hapus_petugas('petugas',$_GET['id_petugas']);
		}
	}
?>