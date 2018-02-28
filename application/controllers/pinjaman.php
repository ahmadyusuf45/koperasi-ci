<?php  
	class pinjaman extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_pinjaman');
		}
		function cetak_lap(){
			$awal = $this->uri->segment(3);
			$akhir = $this->uri->segment(4);
			$data['tmp_pinjaman']=$this->model_pinjaman->cari_tanggal("WHERE pinjaman.tgl_pengajuan BETWEEN '$awal' AND '$akhir'")->result();
			$this->load->view('content/pinjaman/cetak_lap_pinjaman',$data);
		}
		function cari_nama_anggota(){
			$id_anggota = $this->input->post('id_anggota');
			$tm = $this->db->query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
			$hsl = $tm->row()
			;
			$ar = array('nama' => $hsl->nama);
			echo json_encode($ar);
		}
		function cari_detail_kategori_pinjaman(){
			$id_kategori_pinjaman = $this->input->post('id_kategori_pinjaman');
			$tm = $this->db->query("SELECT * FROM kategori_pinjaman WHERE id_kategori_pinjaman = '$id_kategori_pinjaman'");
			$hsl = $tm->row();
			$ar = array('jangka_waktu'=>$hsl->jangka_waktu, 'besar_bunga'=>$hsl->besar_bunga);
			echo json_encode($ar);
		}
		function page(){
			$page = $this->uri->segment(3);
			if(empty($page)){
				$page= 'beranda';
			}
			$data['page'] = $page;
			$data['folder'] = "pinjaman/";
			if($page == 'kategori_pinjaman'){
				$data['tmp_kategori_pinjaman'] = $this->model_pinjaman->tmp_kategori_pinjaman()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_kategori_pinjaman'){
				$f_kategori_pinjaman = $this->uri->segment(4);
				if(empty($f_kategori_pinjaman)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick'] = 'simpan_kategori_pinjaman()';
 				}else{
 					$data['status'] = 'edit';
 					$data['judul'] = 'Edit Data';
 					$data['value'] = 'Edit';
 					$data['onclick'] = 'edit_kategori_pinjaman()';
 					$data['hsl'] = $this->db->query("SELECT * FROM kategori_pinjaman WHERE id_kategori_pinjaman = '$f_kategori_pinjaman'");
 				}
				$this->load->view('content/pinjaman/f_kategori_pinjaman',$data);
			}else if($page =='pinjaman'){
				$data['tmp_pinjaman'] = $this->model_pinjaman->tmp_pinjaman()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_pinjaman'){
				$data['tmp_kategori_pinjaman'] = $this->model_pinjaman->tmp_kategori_pinjaman()->result();
				$this->load->view('content/pinjaman/f_pinjaman',$data);
			}else if($page == 'f_konfirmasi_pinjaman'){
				$f_konfirmasi_pinjaman = $this->uri->segment(4);
				$data['hsl'] = $this->db->query("SELECT * FROM pinjaman INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman WHERE pinjaman.id_pinjaman = '$f_konfirmasi_pinjaman'");
				$this->load->view('content/pinjaman/f_konfirmasi_pinjaman',$data);
			}else if($page == 'detail_pinjaman'){
				$detail_pinjaman = $this->uri->segment(4);
				$qw = $this->db->query("SELECT * FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman WHERE pinjaman.id_pinjaman = '$detail_pinjaman'");
				$data['tmp_detail'] = $qw->result();
				$this->load->view('content/pinjaman/detail_pinjaman',$data);
			}else if($page == 'lap_pinjaman'){
				$awal = $this->input->post('awal');
				$akhir = $this->input->post('akhir');
				if(!empty($awal)){
					$data['tmp_pinjaman']=$this->model_pinjaman->cari_tanggal("WHERE pinjaman.tgl_pengajuan BETWEEN '$awal' AND '$akhir'")->result();
					/*$data['tmp_simpanan'] = $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota INNER JOIN kategori_simpanan ON simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan WHERE simpanan.tgl_simpanan>='$awal' AND simpanan.tgl_simpanan<='$akhir'")->result();*/		
				}else{
					/*$data['tmp_simpanan']=$this->db->query("SELECT * FROM simpanan,anggota,kategori_simpanan WHERE simpanan.id_anggota = anggota.id_anggota AND simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan")->result();*/
					$data['tmp_pinjaman'] = $this->model_pinjaman->tmp_pinjaman()->result();	
				}
				$this->load->view('index',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_kategori_pinjaman(){
			$kode = $this->model_pinjaman->id_kategori_pinjaman();
			$ar = array(
				'id_kategori_pinjaman'=>$kode,
				'nama_kategori_pinjaman' =>$this->input->post('nama_kategori_pinjaman'),
				'jangka_waktu'=>$this->input->post('jangka_waktu'),
				'besar_bunga'=>$this->input->post('besar_bunga')
			);
			$this->model_pinjaman->simpan_kategori_pinjaman('kategori_pinjaman',$ar);
		}
		function edit_kategori_pinjaman(){
			$id = $this->input->post('id_kategori_pinjaman');
			$ar = array(
				'nama_kategori_pinjaman' =>$this->input->post('nama_kategori_pinjaman'),
				'jangka_waktu'=>$this->input->post('jangka_waktu'),
				'besar_bunga'=>$this->input->post('besar_bunga')
			);
			$this->model_pinjaman->edit_kategori_pinjaman('kategori_pinjaman',$id,$ar);
		}
		function hapus_kategori_pinjaman(){
			$this->model_pinjaman->hapus_kategori_pinjaman('kategori_pinjaman',$_GET['id_kategori_pinjaman']);
		}
		function simpan_pinjaman(){
			$kode  = $this->model_pinjaman->id_pinjaman();
			$status_pinjaman = "BELUM DI KONFIRMASI";
			$ar = array(
				'id_pinjaman'=>$kode,
				'id_kategori_pinjaman'=>$this->input->post('id_kategori_pinjaman'),
				'id_anggota'=>$this->input->post('id_anggota'),
				'besar_pinjaman'=>$this->input->post('besar_pinjaman'),
				'jaminan'=>$this->input->post('jaminan'),
				'tgl_pengajuan'=>$this->input->post('tgl_pengajuan'),
				'status_pinjaman'=>$status_pinjaman,
				'besar_angsuran'=>$this->input->post('besar_angsuran'),
				'biaya_admin'=>$this->input->post('biaya_admin')
			);
			$this->model_pinjaman->simpan_pinjaman('pinjaman',$ar);	
		}
		function acc_pinjaman(){
			$id = $this->input->post('id_pinjaman');
			$id_kategori_pinjaman = $this->input->post('id_kategori_pinjaman');
			$status_pinjaman = "SUDAH KONFIRMASI";
			$tgl_input_acc = strtotime($this->input->post('tgl_acc'));
			$tgl_hasil_acc = date('Y-m-d' , strtotime('+1 week',$tgl_input_acc));
			$tm = $this->db->query("SELECT * FROM kategori_pinjaman WHERE id_kategori_pinjaman = '$id_kategori_pinjaman'");
			$hsl = $tm->row();
			$jangka_waktu = $hsl->jangka_waktu;
			$tgl_input_pelunasan = strtotime($this->input->post('tgl_pelunasan'));
			$tgl_hasil_pelunasan = date('Y-m-d' , strtotime(+$jangka_waktu.'month',$tgl_input_pelunasan));
			$ar = array(
				'tgl_acc'=>$tgl_hasil_acc,
				'tgl_pelunasan'=>$tgl_hasil_pelunasan,
				'status_pinjaman'=>$status_pinjaman
			);
			$this->model_pinjaman->edit_pinjaman('pinjaman',$id,$ar);	
		}
		function hapus_pinjaman(){
			$this->model_pinjaman->hapus_pinjaman('pinjaman',$_GET['id_pinjaman']);
		}
	}
?>