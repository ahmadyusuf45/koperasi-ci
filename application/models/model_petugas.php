<?php  
	class model_petugas extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function tmp_petugas(){
			return $this->db->get('petugas');
		}
		function id_petugas(){
			$qr = $this->db->query("SELECT max(id_petugas) as maxKode FROM petugas");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "PTG";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_petugas($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_petugas($table,$where,$value){
			$this->db->where('id_petugas',$where);
			return $this->db->update($table,$value);
		}
		function hapus_petugas($table,$where){
			$this->db->where('id_petugas',$where);
			return $this->db->delete($table);
		}
	}
?>