<?php

class M_jenis extends CI_Model {

	public function read()
	{
		$this->db->order_by('id_jenis', 'DESC');
		$query = $this->db->get('tbl_jenis');
		return $query;
	}


	public function addData($data)
	{
		return $this->db->insert('tbl_jenis',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_jenis',['id_jenis' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_jenis', $data, ['id_jenis' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_jenis',['id_jenis' => $id] );
	}

	public function addDataBatch($data)
    {
        return $this->db->insert_batch('tbl_jenis', $data);
    }
}
