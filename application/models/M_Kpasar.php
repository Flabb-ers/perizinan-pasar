<?php

class M_Kpasar extends CI_Model {

	public function tampilJoin()
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_kpasar');
 		$this->db->join('tbl_pasar','tbl_kpasar.id_pasar = tbl_pasar.id_pasar');
 		$this->db->order_by('tbl_kpasar.id_Kpasar', 'DESC');
 		$query = $this->db->get();

 		return $query;
 	}

	public function addData($data)
	{
		return $this->db->insert('tbl_kpasar',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_kpasar',['id_Kpasar' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_kpasar', $data, ['id_Kpasar' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_kpasar',['id_Kpasar' => $id] );
	}

	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

}
