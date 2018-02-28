<?php 
	class model_angsuran extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function cari_tanggal($prop){
			return $this->db->query("SELECT * FROM angsuran INNER JOIN anggota ON angsuran.id_anggota = anggota.id_anggota $prop");
		}
		function tmp_angsuran(){
			return $this->db->query("SELECT * FROM angsuran INNER JOIN anggota ON angsuran.id_anggota = anggota.id_anggota");
		}
		function cari_pinjaman($id){
			return $this->db->query("SELECT * FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman WHERE pinjaman.id_pinjaman = '$id'");
		}
		function detail_pinjaman(){
			return $this->db->query("SELECT * FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman");
		}
		function angsuran_ke($id){
			return $this->db->query("SELECT * FROM detail_angsuran WHERE id_angsuran = '$id'");
		}
		function id_detail_angsuran(){
			$qr = $this->db->query("SELECT max(id_detail_angsuran) as maxKode FROM detail_angsuran");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "DTA";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function id_angsuran(){
			$qr = $this->db->query("SELECT max(id_angsuran) as maxKode FROM angsuran");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "ASN";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;	
		}
		function simpan_angsuran($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_angsuran($table,$where,$value){
			$this->db->where('id_angsuran',$where);
			return $this->db->update($table,$value);
		}
		function hapus_angsuran($table,$where){
			$this->db->where('id_angsuran',$where);
			return $this->db->delete($table);
		}
		function simpan_detail_angsuran($table,$value){
			return $this->db->insert($table,$value);
		}
		function hapus_detail_angsuran($table,$where){
			$this->db->where('id_angsuran',$where);
			return $this->db->delete($table);
		}
	}
 ?>