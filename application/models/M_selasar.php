<?php

class M_selasar extends CI_Model {

	public function read($id)
	{
		$this->db->select('*');
 		$this->db->from('tbl_selasar');
		$this->db->join('tbl_pasar','tbl_selasar.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_selasar.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_jenis','tbl_selasar.id_jenis = tbl_jenis.id_jenis');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
	}

	public function read2()
	{
		$this->db->select('*');
 		$this->db->from('tbl_selasar');
		$this->db->join('tbl_pasar','tbl_selasar.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_selasar.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_jenis','tbl_selasar.id_jenis = tbl_jenis.id_jenis');
 		$this->db->order_by('tbl_selasar.id_selasar', 'DESC');

 		$query = $this->db->get();

 		return $query;
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_selasar',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_selasar',['id_selasar' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_selasar', $data, ['id_selasar' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_selasar',['id_selasar' => $id] );
	}

	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

	public function tampilJenis()
	{
		return $this->db->get('tbl_jenis');
	}


	public function tampilTarif()
	{
		$this->db->select('*');
 		$this->db->from('tbl_tarif');
 		$this->db->where('jenis', 'Selasar');
 		$query = $this->db->get();

 		return $query;
	}
	
	public function tampilJoinwhere3($id)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_pasar');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

}
