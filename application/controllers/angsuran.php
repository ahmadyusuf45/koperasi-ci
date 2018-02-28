<?php 
	class angsuran extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_angsuran');
		}
		function cetak_lap(){
			$awal = $this->uri->segment(3);
			$akhir = $this->uri->segment(4);
			$data['tmp_angsuran'] = $this->model_angsuran->cari_tanggal("WHERE angsuran.tgl_pembayaran BETWEEN '$awal' AND '$akhir'")->result();
			$this->load->view('content/angsuran/cetak_lap_angsuran',$data);
		}
		function cari_pinjaman(){
			$id_pinjaman = $this->input->post('id_pinjaman');
			$tm = $this->model_angsuran->cari_pinjaman($id_pinjaman);
			$hsl = $tm->row();
			$besar_bunga = $hsl->besar_bunga/100;
			$besar_pinjaman_awal = $hsl->besar_pinjaman*$besar_bunga;
			$besar_pinjaman_akhir = $hsl->besar_pinjaman+$besar_pinjaman_awal;
			$ar = array('id_anggota'=>$hsl->id_anggota,'nama'=>$hsl->nama,'besar_pinjaman'=>$besar_pinjaman_akhir,'besar_angsuran'=>$hsl->besar_angsuran,'tgl_pelunasan'=>$hsl->tgl_pelunasan,'jangka_waktu'=>$hsl->jangka_waktu);
			echo json_encode($ar);
		}
		function detail_pinjaman(){
			$data['tmp_pinjaman'] = $this->model_angsuran->detail_pinjaman()->result();
			$this->load->view('content/angsuran/detail_pinjaman',$data);
		}
		function cetak_struk($kode){
			$qw = $this->db->query("SELECT * FROM angsuran INNER JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran INNER JOIN anggota ON angsuran.id_anggota = anggota.id_anggota WHERE angsuran.id_angsuran = '$kode'");
			$data['tmp_angsuran'] = $qw->result();
			$data['item_angsuran'] = $qw;
			$this->load->view('content/angsuran/cetak_struk',$data);
		}
		function page(){
			$page = $this->uri->segment(3);
			$data['page'] = $page;
			$data['folder'] = "angsuran/";
			if($page == 'angsuran'){
				$data['tmp_angsuran'] = $this->model_angsuran->tmp_angsuran()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_angsuran'){
				$f_angsuran = $this->uri->segment(4);
				if(empty($f_angsuran)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['kode'] = $this->model_angsuran->id_angsuran();
					$data['onclick'] = 'simpan_angsuran()';
				}else{
					$data['status']='edit';
					$data['judul']='Add Data';
					$data['onclick']= 'add_angsuran()';
					$data['angsuran_ke'] = $qw = $this->model_angsuran->angsuran_ke($f_angsuran);
					$data['hsl'] = $this->db->query("SELECT * FROM angsuran INNER JOIN detail_angsuran ON angsuran.id_angsuran = detail_angsuran.id_angsuran INNER JOIN anggota ON angsuran.id_anggota = anggota.id_anggota WHERE angsuran.id_angsuran = '$f_angsuran'");
				}
				$this->load->view('content/angsuran/f_angsuran',$data);
			}else if($page == 'lap_angsuran'){
				$awal = $this->input->post('awal');
				$akhir = $this->input->post('akhir');
				if(!empty($awal)){
					$data['tmp_angsuran']=$this->model_angsuran->cari_tanggal("WHERE angsuran.tgl_pembayaran BETWEEN '$awal' AND '$akhir'")->result();
					/*$data['tmp_simpanan'] = $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota INNER JOIN kategori_simpanan ON simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan WHERE simpanan.tgl_simpanan>='$awal' AND simpanan.tgl_simpanan<='$akhir'")->result();*/		
				}else{
					/*$data['tmp_simpanan']=$this->db->query("SELECT * FROM simpanan,anggota,kategori_simpanan WHERE simpanan.id_anggota = anggota.id_anggota AND simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan")->result();*/
					$data['tmp_angsuran'] = $this->model_angsuran->tmp_angsuran()->result();	
				}
				$this->load->view('index',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_angsuran(){
			$id_detail_angsuran = $this->model_angsuran->id_detail_angsuran();
			$sisa_waktu = $this->input->post('sisa_waktu')-1;
			$s_angsuran = array(
				'id_angsuran'=>$this->input->post('id_angsuran'),
				'id_anggota'=>$this->input->post('id_anggota'),
				'id_pinjaman'=>$this->input->post('id_pinjaman'),
				'tgl_pembayaran'=>$this->input->post('tgl_pembayaran'),
				'besar_pinjaman'=>$this->input->post('besar_pinjaman'),
				'keterangan_angsuran'=>"BELUM LUNAS"
			);
			$s_detail_angsuran = array(
				'id_detail_angsuran'=>$id_detail_angsuran,
				'id_angsuran'=>$this->input->post('id_angsuran'),
				'tgl_jatuh_tempo'=>$this->input->post('tgl_jatuh_tempo'),
				'detail_besar_angsuran'=>$this->input->post('detail_besar_angsuran'),
				'sisa_pinjaman'=>$this->input->post('sisa_pinjaman'),
				'sisa_waktu'=>$sisa_waktu,
				'angsuran_ke'=>"1"
			);
			$this->model_angsuran->simpan_angsuran('angsuran',$s_angsuran);
			$this->model_angsuran->simpan_detail_angsuran('detail_angsuran',$s_detail_angsuran);
		}
		function add_angsuran(){
			$id_angsuran = $this->input->post('id_angsuran');
			$sisa_waktu = $this->input->post('sisa_waktu')-1;
			$angsuran_ke = $this->input->post('angsuran_ke')+1;
			$id_detail_angsuran = $this->model_angsuran->id_detail_angsuran();
			$keterangan_angsuran="";
			if($sisa_waktu < 1){
				$keterangan_angsuran = "SUDAH LUNAS";
				$s_angsuran_1 = array(
					'tgl_pembayaran'=>$this->input->post('tgl_pembayaran'),
					'keterangan_angsuran'=>$keterangan_angsuran
				);
				$s_detail_angsuran_1 = array(
					'id_detail_angsuran'=>$id_detail_angsuran,
					'id_angsuran'=>$this->input->post('id_angsuran'),
					'tgl_jatuh_tempo'=>$this->input->post('tgl_jatuh_tempo'),
					'detail_besar_angsuran'=>$this->input->post('detail_besar_angsuran'),
					'sisa_pinjaman'=>$this->input->post('sisa_pinjaman'),
					'sisa_waktu'=>$sisa_waktu,
					'angsuran_ke'=>$angsuran_ke
				);
				$this->model_angsuran->edit_angsuran('angsuran',$id_angsuran,$s_angsuran_1);
				$this->model_angsuran->simpan_detail_angsuran('detail_angsuran',$s_detail_angsuran_1);
			}else{
				$keterangan_angsuran = "BELUM LUNAS";
				$s_angsuran_2 = array(
					'tgl_pembayaran'=>$this->input->post('tgl_pembayaran'),
					'keterangan_angsuran'=>$keterangan_angsuran
				);
				$s_detail_angsuran_2 = array(
					'id_detail_angsuran'=>$id_detail_angsuran,
					'id_angsuran'=>$this->input->post('id_angsuran'),
					'tgl_jatuh_tempo'=>$this->input->post('tgl_jatuh_tempo'),
					'detail_besar_angsuran'=>$this->input->post('detail_besar_angsuran'),
					'sisa_pinjaman'=>$this->input->post('sisa_pinjaman'),
					'sisa_waktu'=>$sisa_waktu,
					'angsuran_ke'=>$angsuran_ke
				);
				$this->model_angsuran->edit_angsuran('angsuran',$id_angsuran,$s_angsuran_2);
				$this->model_angsuran->simpan_detail_angsuran('detail_angsuran',$s_detail_angsuran_2);
			}
		}
		function hapus_angsuran(){
			$this->model_angsuran->hapus_angsuran('angsuran',$_GET['id_angsuran']);
			$this->model_angsuran->hapus_detail_angsuran('detail_angsuran',$_GET['id_angsuran']);
		}
	}
 ?>