<?php 
	class model_pinjaman extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function tmp_kategori_pinjaman(){
			return $this->db->get('kategori_pinjaman');
		}
		function cari_tanggal($prop){
			return $this->db->query("SELECT * FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman $prop");
		}
		function tmp_pinjaman(){
			return $this->db->query("SELECT * FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota INNER JOIN kategori_pinjaman ON pinjaman.id_kategori_pinjaman = kategori_pinjaman.id_kategori_pinjaman");
		}
		function id_kategori_pinjaman(){
			$qr = $this->db->query("SELECT max(id_kategori_pinjaman) as maxKode FROM kategori_pinjaman");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "KTP";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function id_pinjaman(){
			$qr = $this->db->query("SELECT max(id_pinjaman) as maxKode FROM pinjaman");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "PIJ";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_kategori_pinjaman($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_kategori_pinjaman($table,$where,$value){
			$this->db->where('id_kategori_pinjaman',$where);
			return $this->db->update($table,$value);
		}
		function hapus_kategori_pinjaman($table,$where){
			$this->db->where('id_kategori_pinjaman',$where);
			return $this->db->delete($table);
		}
		function simpan_pinjaman($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_pinjaman($table,$where,$value){
			$this->db->where('id_pinjaman',$where);
			return $this->db->update($table,$value);
		}
		function hapus_pinjaman($table,$where){
			$this->db->where('id_pinjaman',$where);
			return $this->db->delete($table);
		}
	}
?>