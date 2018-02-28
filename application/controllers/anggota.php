<?php 
	class Anggota extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_anggota');
			if($this->session->userdata('status')!='login'){
				redirect('master');
			}
		}
		function page(){
			$page = $this->uri->segment(3);
			if(empty($page)){
				$page ='beranda';
			}
			$data['page'] = $page;
			$data['folder'] = "anggota/";
			if($page == 'anggota'){
				$data['tmp_anggota'] = $this->model_anggota->tmp_anggota()->result();
				$this->load->view('index',$data);
			}else if($page =='f_anggota'){
				$f_anggota = $this->uri->segment(4);
				if(empty($f_anggota)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick']='simpan_anggota()';
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Edit Data';
					$data['value'] = 'Edit';
					$data['onclick']='edit_anggota()';
					$data['hsl'] = $this->model_anggota->qw("anggota","WHERE id_anggota = '$f_anggota'");
				}
				$this->load->view('content/anggota/f_anggota',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_anggota(){
			$kode = $this->model_anggota->id_anggota();
			$ar = array(
				'id_anggota' => $kode,
				'nama'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'tgl_lahir'=>$this->input->post('tgl_lahir'),
				'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
				'status'=>$this->input->post('status'),
				'no_tlp'=>$this->input->post('no_tlp'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->model_anggota->simpan_anggota('anggota',$ar);
		}
		function edit_anggota(){
			$id = $this->input->post('id_anggota');
			$ar = array(
				'nama'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'tgl_lahir'=>$this->input->post('tgl_lahir'),
				'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
				'status'=>$this->input->post('status'),
				'no_tlp'=>$this->input->post('no_tlp'),
				'keterangan'=>$this->input->post('keterangan')	
			);
			$this->model_anggota->edit_anggota('anggota',$id,$ar);
		}
		function hapus_anggota(){
			$this->model_anggota->hapus_anggota('anggota',$_GET['id_anggota']);
		}
}
?>