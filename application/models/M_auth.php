<?php

class M_auth extends CI_Model 
{
	public function ceklogin($username, $pass, $level)
	{
		return $this->db->get_where('tbl_pegawai', ['username'=>$username,  'pass'=>$pass, 'level'=>$level]);
	}

	public function cekloginpasar($username, $nama_pasar, $pass)
	{
		$this->db->select('*');
 		$this->db->from('tbl_pegawai');
 		$this->db->join('tbl_pasar','tbl_pegawai.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->where('tbl_pegawai.username',$username);
 		$this->db->where('tbl_pegawai.pass',$pass);
 		$this->db->where('tbl_pasar.nama_pasar',$nama_pasar);
 		$query = $this->db->get();

 		return $query;
	}

	public function validasi_login($username, $level, $pass, $nama_pasar=null)
	{
		if($level== 'Admin'){
	 		$this->db->where('tbl_pegawai.username',$username);
	 		$this->db->where('tbl_pegawai.pass',$pass);
	 		$query = $this->db->get('tbl_pegawai');
		} elseif ($level == 'Pasar'){
			$this->db->select('*');
	 		$this->db->from('tbl_pegawai');
	 		$this->db->join('tbl_pasar','tbl_pegawai.id_pasar = tbl_pasar.id_pasar','left');
	 		$this->db->where('tbl_pegawai.username',$username);
	 		$this->db->where('tbl_pegawai.pass',$pass);
	 		$this->db->where('tbl_pasar.nama_pasar',$nama_pasar);
	 		$query = $this->db->get();
 		}

 		return $query->row();
	}

 	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}
	
	public function tampilJoinwhere($id)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_pegawai');
 		$this->db->join('tbl_pasar','tbl_pegawai.id_pasar = tbl_pasar.id_pasar');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}
}