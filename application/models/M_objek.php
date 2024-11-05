<?php

class M_objek extends CI_Model
{

	public function read()
	{
		$this->db->select('*');
		$this->db->from('tbl_objek');
		$this->db->join('tbl_wp', 'tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->order_by('tbl_objek.id_objek', 'DESC');
		$query = $this->db->get();

		return $query;
	}
	public function addData($data)
	{
		return $this->db->insert('tbl_objek', $data);
	}

	public function tampilWP()
	{
		$this->db->select('tbl_wp.*');
		$this->db->from('tbl_wp');
		$this->db->join('tbl_objek', 'tbl_wp.id_wajib_pajak = tbl_objek.id_wajib_pajak', 'left');
		$this->db->where('tbl_objek.id_wajib_pajak IS NULL');

		$query = $this->db->get();

		return $query;
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_objek', ['id_objek' => $id]);
	}

	public function getWP($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_wp');
		$this->db->where('tbl_wp.id_wajib_pajak', $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilDetail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_objek', 'tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp', 'tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_op.id_objek', $id);

		$query = $this->db->get();

		return $query;
	}

	public function tampilDetail2()
	{
		$this->db->select('*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_objek', 'tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp', 'tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');

		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');

		$query = $this->db->get();

		return $query;
	}

	public function tampilObjek($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_objek');
		$this->db->join('tbl_wp', 'tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->where('tbl_objek.id_objek', $id);
		$query = $this->db->get();

		return $query;
	}
}
