<?php 
	class Simpanan extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_simpanan');
		}
		function cetak_lap(){
			$awal = $this->uri->segment(3);
			$akhir = $this->uri->segment(4);
			$data['tmp_simpanan']=$this->model_simpanan->cari_tanggal("WHERE simpanan.tgl_simpanan BETWEEN '$awal' AND '$akhir'")->result();
			$this->load->view('content/simpanan/cetak_lap_simpanan',$data);
		}
		function cari_nama_anggota(){
			$id_anggota = $this->input->post('id_anggota');
			$tm = $this->db->query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
			$hsl = $tm->row()
			;
			$ar = array('nama' => $hsl->nama);
			echo json_encode($ar);
		}
		function detail_anggota(){
			$data['tmp_anggota'] = $this->db->get('anggota')->result();
			$this->load->view('content/simpanan/detail_anggota',$data);
		}
		function tmp_detail($kode){
			$qw= $this->db->query("SELECT * FROM detail_simpanan WHERE id_simpanan = '$kode'");
			$data['tmp_detail'] = $qw->result();
			$this->load->view('content/simpanan/detail_simpanan',$data);
		}
		function cetak_struk($kode){
			$qy = $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota WHERE simpanan.id_simpanan = '$kode'");
			$data['tmp_simpanan'] = $qy;
			$qw = $this->db->query("SELECT * FROM detail_simpanan WHERE id_simpanan = '$kode'");
			$data['tmp_detail'] = $qw->result();
			$this->load->view('content/simpanan/cetak_struk',$data);
		}
		function page(){
			$page = $this->uri->segment(3);
			if(empty($page)){
				$page ='beranda';
			}
			$data['page'] = $page;
			$data['folder'] = "simpanan/";
			if($page == 'simpanan'){
				$data['tmp_simpanan'] = $this->model_simpanan->tmp_simpanan()->result();	
				$this->load->view('index',$data);
			}else if($page =='f_simpanan'){
				$f_simpanan = $this->uri->segment(4);
				if(empty($f_simpanan)){
					$data['kode'] = $this->model_simpanan->id_simpanan();
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick']='simpan_simpanan()';
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Tambah Data';
					$data['value'] = 'Edit';
					$data['onclick']='edit_simpanan()';
					$data['hsl'] = $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON anggota.id_anggota = simpanan.id_anggota WHERE simpanan.id_simpanan = '$f_simpanan'");
				}
				$this->load->view('content/simpanan/f_simpanan',$data);
			}else if($page == 'kategori_simpanan'){
				$data['tmp_kategori_simpanan'] = $this->model_simpanan->tmp_kategori_simpanan()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_kategori_simpanan'){
				$f_kategori_simpanan = $this->uri->segment(4);
				if(empty($f_kategori_simpanan)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick']='simpan_kategori_simpanan()';
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Edit Data';
					$data['value'] = 'Edit';
					$data['onclick']='edit_kategori_simpanan()';
					$data['hsl'] = $this->db->query("SELECT * FROM kategori_simpanan WHERE id_kategori_simpanan = '$f_kategori_simpanan'");	
				}
				$this->load->view('content/simpanan/f_kategori_simpanan',$data);
			}else if($page == 'lap_simpanan'){
				$awal = $this->input->post('awal');
				$akhir = $this->input->post('akhir');
				if(!empty($awal)){
					$data['tmp_simpanan']=$this->model_simpanan->cari_tanggal("WHERE simpanan.tgl_simpanan BETWEEN '$awal' AND '$akhir'")->result();
					/*$data['tmp_simpanan'] = $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota INNER JOIN kategori_simpanan ON simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan WHERE simpanan.tgl_simpanan>='$awal' AND simpanan.tgl_simpanan<='$akhir'")->result();*/		
				}else{
					/*$data['tmp_simpanan']=$this->db->query("SELECT * FROM simpanan,anggota,kategori_simpanan WHERE simpanan.id_anggota = anggota.id_anggota AND simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan")->result();*/
					$data['tmp_simpanan'] = $this->model_simpanan->tmp_simpanan()->result();	
				}
				$this->load->view('index',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_detail(){
			$id_detail = $this->model_simpanan->id_detail_simpanan();
			$id_simpanan = $this->input->post('id_simpanan');
			$ar = array(
				'id_detail_simpanan' =>$id_detail,
				'id_simpanan'=>$id_simpanan,
				'tgl_detail_simpanan'=>$this->input->post('tgl_detail_simpanan'),
				'besar_simpanan'=>$this->input->post('besar_simpanan')
			);
			$this->model_simpanan->simpan_detail('detail_simpanan',$ar);
		}
		function simpan_simpanan(){
			$kode = $this->input->post('id_simpanan');
			$ar = array(
				'id_simpanan' => $kode,
				'id_kategori_simpanan'=>$this->input->post('id_kategori_simpanan'),
				'id_anggota'=>$this->input->post('id_anggota'),
				'nama_petugas'=>$this->input->post('nama_petugas'),
				'tgl_simpanan'=>$this->input->post('tgl_simpanan'),
				'total_simpanan'=>$this->input->post('total_simpanan')
			);
			$this->model_simpanan->simpan_simpanan('simpanan',$ar);
		}
		function edit_simpanan(){
			$id = $this->input->post('id_simpanan');
			$ar = array(
				'tgl_simpanan'=>$this->input->post('tgl_simpanan'),
				'total_simpanan'=>$this->input->post('total_simpanan')	
			);
			$this->model_simpanan->edit_simpanan('simpanan',$id,$ar);
		}
		function hapus_simpanan(){
			$this->model_simpanan->hapus_simpanan('simpanan',$_GET['id_simpanan']);
			$this->model_simpanan->hapus_detail_simpanan('detail_simpanan',$_GET['id_simpanan']);
		}
		function simpan_kategori_simpanan(){
			$kode = $this->model_simpanan->id_kategori_simpanan();
			$ar = array(
				'id_kategori_simpanan' => $kode,
				'nama_kategori_simpanan'=>$this->input->post('nama_kategori_simpanan')
			);
			$this->model_simpanan->simpan_kategori_simpanan('kategori_simpanan',$ar);
		}
		function edit_kategori_simpanan(){
			$id = $this->input->post('id_kategori_simpanan');
			$ar = array(
				'nama_kategori_simpanan'=>$this->input->post('nama_kategori_simpanan')
			);
			$this->model_simpanan->edit_kategori_simpanan('kategori_simpanan',$id,$ar);
		}
		function hapus_kategori_simpanan(){
			$this->model_simpanan->hapus_kategori_simpanan('kategori_simpanan',$_GET['id_kategori_simpanan']);
		}
}
?>