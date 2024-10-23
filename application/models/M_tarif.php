<?php

class M_tarif extends CI_Model {

	public function read()
	{
		$this->db->order_by('id_tarif', 'DESC');
		$query = $this->db->get('tbl_tarif');
		return $query;
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_tarif',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_tarif',['id_tarif' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_tarif', $data, ['id_tarif' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_tarif',['id_tarif' => $id] );
	}

}
