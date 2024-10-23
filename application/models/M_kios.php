<?php

class M_kios extends CI_Model {

	public function read()
	{
		return $this->db->get('tbl_kios');
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_kios',$data);
	}

	public function addDataImport($data)
	{
		$this->db->insert_batch('tbl_kios',$data);

		if($this->db->affected_rows()>0){
			return 1;
		}else {
			return 0;
		}
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_kios',['id_kios' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_kios', $data, ['id_kios' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_kios',['id_kios' => $id] );
	}
	
	public function tampilJoin()
 	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->order_by('tbl_kios.id_kios', 'DESC');
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilJoinKiosTakHuni()
 	{
 		$now = date('Y-m-d');

		$this->db->select('tbl_kios.*, tbl_pasar.nama_pasar, tbl_tarif.*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif','left');
 		$this->db->join('tbl_op','tbl_kios.id_kios = tbl_op.id_kios','left');
 		$this->db->where('tbl_op.id_objek_pajak IS NULL OR tbl_op.batas_berlaku<', $now) ;

 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilJoinKiosTakHuniLevelPasar($id)
 	{	
 		$now = date('Y-m-d');

		$this->db->select('tbl_kios.*, tbl_pasar.nama_pasar, tbl_tarif.*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif','left');
 		$this->db->join('tbl_op','tbl_kios.id_kios = tbl_op.id_kios','left');
 		$this->db->like('tbl_pasar.nama_pasar',  $id);
 		$this->db->where('tbl_op.id_objek_pajak IS NULL OR tbl_op.batas_berlaku <', $now) ;
 		
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilJoinwhere2($id)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilJoinwhere($id)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->like('nama_pasar',  $id);
 		$this->db->or_like('no_kioslos',  $id);
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

 	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}


	public function tampilWp()
	{
		return $this->db->get('tbl_wp');
	}

	public function tampilTarif()
	{
		return $this->db->get('tbl_tarif');
	}


	public function print($id)
	{
		$this->db->select('tbl_kios.id_kios,tbl_pasar.*,tbl_tarif.*,tbl_wp.nama_wp,tbl_wp.alamat_wp,
			tbl_wp.nik,tbl_wp.npwpd');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_permohonan','tbl_permohonan.id_permohonan = tbl_kios.id_permohonan');
		$this->db->join('tbl_wp','tbl_kios.id_wp = tbl_wp.id_wp');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_pimpinan','tbl_kios.id_pimpinan = tbl_pimpinan.id_pimpinan');
 		$this->db->where('tbl_kios.id_kios', $id);
 		$query = $this->db->get();

 		return $query;
	}


    
    public function filterByDatePasar($tgl_awal, $tgl_akhir, $id_pasar)
    {
 		$this->db->select('*');
 		$this->db->from('tbl_kios');
		$this->db->join('tbl_wp','tbl_kios.id_wp = tbl_wp.id_wp');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
 		$this->db->like('nama_pasar',  $id_pasar);

        $query = $this->db->get();

    	return $query->result();
    }

    public function filterByDate()
    {	
    	$this->db->select('*');
        $this->db->from('tbl_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
        $query = $this->db->get();

    return $query->result();
    }



 	public function filterByDateDinas($id_pasar)
    {
        $this->db->select('*');
 		$this->db->from('tbl_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
 		$query = $this->db->get();

    return $query->result();
    }

    public function filterByDateDinasTakhuni($id_pasar)
    {	

    	$now = date('Y-m-d');

        $this->db->select('tbl_kios.*, tbl_pasar.nama_pasar, tbl_tarif.*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif','left');
 		$this->db->join('tbl_op','tbl_kios.id_kios = tbl_op.id_kios','left');
 		$this->db->where('tbl_op.id_objek_pajak IS NULL OR tbl_op.batas_berlaku <', $now) ;
 		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
 		$query = $this->db->get();

    return $query->result();
    }

    public function filterByDateTakhuni()
    {	
        $now = date('Y-m-d');

        $this->db->select('tbl_kios.*, tbl_pasar.nama_pasar, tbl_tarif.*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar','left');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif','left');
 		$this->db->join('tbl_op','tbl_kios.id_kios = tbl_op.id_kios','left');
 		$this->db->where('tbl_op.id_objek_pajak IS NULL OR tbl_op.batas_berlaku <', $now) ;
        $query = $this->db->get();

    return $query->result();
    }

}
