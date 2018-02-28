<?php 
	class model_anggota extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function tmp_anggota(){
			return $this->db->get('anggota');
		}
		function id_anggota(){
			$qr = $this->db->query("SELECT max(id_anggota) as maxKode FROM anggota");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "AGT";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_anggota($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_anggota($table,$where,$value){
			$this->db->where('id_anggota',$where);
			return $this->db->update($table,$value);
		}
		function hapus_anggota($table,$where){
			$this->db->where('id_anggota',$where);
			return $this->db->delete($table);
		}
	}
?>