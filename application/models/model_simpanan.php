<?php 
	class model_simpanan extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function cari_tanggal($prop){
			return $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota INNER JOIN kategori_simpanan ON simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan $prop");
		}
		function tmp_simpanan(){
			return $this->db->query("SELECT * FROM simpanan INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota INNER JOIN kategori_simpanan ON simpanan.id_kategori_simpanan = kategori_simpanan.id_kategori_simpanan");

		}
		function tmp_detail($id_simpanan){
			$tmp = $this->db->query("SELECT * FROM detail_simpanan WHERE id_simpanan = $id_simpanan");
			return $tmp;
		}
		function tmp_kategori_simpanan(){
			return $this->db->get('kategori_simpanan');
		}
		function id_simpanan(){
			$qr = $this->db->query("SELECT max(id_simpanan) as maxKode FROM simpanan");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "SPN";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function id_detail_simpanan(){
			$qr = $this->db->query("SELECT max(id_detail_simpanan) as maxKode FROM detail_simpanan");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "DTS";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function id_kategori_simpanan(){
			$qr = $this->db->query("SELECT max(id_kategori_simpanan) as maxKode FROM kategori_simpanan");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "KTS";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_simpanan($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_simpanan($table,$where,$value){
			$this->db->where('id_simpanan',$where);
			return $this->db->update($table,$value);
		}
		function hapus_simpanan($table,$where){
			$this->db->where('id_simpanan',$where);
			return $this->db->delete($table);
		}
		function simpan_kategori_simpanan($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_kategori_simpanan($table,$where,$value){
			$this->db->where('id_kategori_simpanan',$where);
			return $this->db->update($table,$value);
		}
		function hapus_kategori_simpanan($table,$where){
			$this->db->where('id_kategori_simpanan',$where);
			return $this->db->delete($table);
		}
		function simpan_detail($table,$value){
			return $this->db->insert($table,$value);
		}
	}
?>