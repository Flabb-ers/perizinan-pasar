<?php

class M_wp extends CI_Model {

	public function read()
	{
		$this->db->order_by('id_wajib_pajak', 'DESC');
		$query = $this->db->get('tbl_wp');
		return $query;
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_wp',$data);
	}

	public function addDataImport($data)
	{
		$this->db->insert_batch('tbl_wp',$data);

		if($this->db->affected_rows()>0){
			return 1;
		}else {
			return 0;
		}
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_wp',['id_wajib_pajak' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_wp', $data, ['id_wajib_pajak' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_wp',['id_wajib_pajak' => $id] );
	}

	public function tampilJoin()
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_wp');
 		$this->db->join('tbl_pengajuan','tbl_wp.id_pengajuan = tbl_pengajuan.id_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$query = $this->db->get();

 		return $query;
 	}
 	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

 	public function tampilPengajuan()
	{	
		$this->db->select('tbl_pengajuan.*, tbl_kios.*, tbl_pasar.id_pasar, tbl_pasar.nama_pasar, tbl_tarif.*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('status_npwrd','Belum');
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilJoinwhere($id)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_wp');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

 		public function filterByDate(){
    {
        $this->db->select('*');
 		$this->db->from('tbl_wp');
 		$this->db->join('tbl_pasar','tbl_wp.id_pasar = tbl_pasar.id_pasar','left');
        $query = $this->db->get();

    return $query->result();
    }
    }



 	public function filterByDateDinas($id_pasar)
    {
        $this->db->select('*');
 		$this->db->from('tbl_wp');
 		$this->db->join('tbl_pasar','tbl_wp.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
 		$query = $this->db->get();

    return $query->result();
    }


    public function cekNPWRD($npwrd) {

	    $this->db->select('*');
		$this->db->from('tbl_wp');
		$this->db->where('tbl_wp.npwrd', $npwrd);
	    $query = $this->db->get();
	    return $query->num_rows() > 0;
    }

    public function tampilPerpasar($id)
    {
    	$this->db->select('*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
    }


    public function get_kode()
    {
    	$query = $this->db->query('SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = "tbl_wp" AND table_schema = DATABASE()');
    	$row = $query->row();
    	$new_id = $row->AUTO_INCREMENT;

    	
    	$new_code = 'WP' . sprintf('%03d', $new_id);

    	return $new_code;
    }

	public function getById($id_wajib_pajak)
	{
		$this->db->where('id_wajib_pajak', $id_wajib_pajak);
		$query = $this->db->get('tbl_wp'); 
		return $query->row(); 
	}
}
