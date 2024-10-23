<?php

class M_pengajuan extends CI_Model {

	public function read()
	{
 		$this->db->select('tbl_pengajuan.*, tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
 		$query = $this->db->get();

 		return $query;
	}

	public function read2()
	{
		return $this->db->get('tbl_pengajuan');
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_pengajuan',$data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_pengajuan',['id_pengajuan' => $id]);
	}

	 	public function tampilJenis()
	{
		return $this->db->get('tbl_jenis');
	}

	public function tampilData2($id)
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilDataProses($id)
	{
		$this->db->select('tbl_pengajuan.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->where('tbl_pengajuan.status', 'Proses');
 		$this->db->where('tbl_pengajuan.id_pengajuan', $id);

 		$query = $this->db->get();

 		return $query;
	}

	 public function tampilPengajuan()
	{	
		$this->db->where('status_npwrd','Belum');
		return $this->db->get('tbl_pengajuan');
	}

	public function tampilJoinwhere($id)
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan','Baru');
 		$this->db->where('tbl_pengajuan.status', 'Selesai');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilAdminPerpanjang()
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
 		$this->db->where('tbl_pengajuan.status', 'Selesai');
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilJoinwhere3($id)
 	{
 		$this->db->select('tbl_pengajuan.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
 		$this->db->where('tbl_pengajuan.status', 'Proses');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}


 	public function tampilCreatewhere($id)
 	{
 		$this->db->select('tbl_pengajuan.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
 		$this->db->where('tbl_pengajuan.status', 'Selesai');
 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;

 	}


 	public function tampilJoinwhere2($id)
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');

 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilReadPersyaratan2($id)
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->where('tbl_pengajuan.status', 'Proses');

 		$this->db->like('nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}

 	

 	public function tampilAdminPerpanjang2()
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->where('tbl_pengajuan.status', 'Proses');
 		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilAdminPerpanjangCari($id)
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->where('tbl_pengajuan.status', 'Proses');
 		$this->db->like('tbl_pengajuan.npwrd', $id);
 		$query = $this->db->get();

 		return $query;
 	}

	public function tampilJoin2()
 	{
 		$this->db->select('tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$query = $this->db->get();

 		return $query;
 	}

	public function tampilDataCetak()
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_kioslos, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_pasar','tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_wp','tbl_pengajuan.id_wp = tbl_wp.id_wp');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.status','Selesai');
 		// $this->db->join('tbl_tarif','tbl_pengajuan.id_tarif = tbl_tarif.id_tarif');

 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilDataCetakPasar($id)
 	{
 		$this->db->select('tbl_pengajuan.*, tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->like('nama_pasar',  $id);
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		

 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilAdminPengajuan()
 	{
 		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Perpanjang');
 		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
 		

 		$query = $this->db->get();

 		return $query;
 	}
 	
	public function print($id)
	{
		$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_kioslos, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_pasar','tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_wp','tbl_pengajuan.id_wp = tbl_wp.id_wp');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.status','Selesai');
		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
		$query = $this->db->get();

 		return $query;
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_pengajuan', $data, ['id_pengajuan' => $id] );
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_pengajuan',['id_pengajuan' => $id] );
	}

	public function filterByDate($tgl_awal, $tgl_akhir){
    {
		$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_kioslos, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_pasar','tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_wp','tbl_pengajuan.id_wp = tbl_wp.id_wp');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        $query = $this->db->get();

    return $query->result();
    }
    }


    public function filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar)
    {
        $this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_kioslos, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_pasar','tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_wp','tbl_pengajuan.id_wp = tbl_wp.id_wp');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        $query = $this->db->get();

    return $query->result();
    }


	
	public function tampilJoin()
 	{
 		$this->db->select('tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
 		$this->db->from('tbl_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$query = $this->db->get();

 		return $query;
 	}

	public function printPasar($id)
	{
		
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
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

	public function tampilKios()
	{
		return $this->db->get('tbl_kios');
	}

	public function tampilOp()
	{
		$this->db->select('tbl_op.*,tbl_kios.*,tbl_pasar.nama_pasar, tbl_tarif.*');
 		$this->db->from('tbl_op');
 		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');

 		$query = $this->db->get();

 		return $query;
	}

	public function ambilOp()
	{
		$this->db->select('tbl_op.*,tbl_kios.*,tbl_pasar.nama_pasar, tbl_tarif.*');
 		$this->db->from('tbl_op');
 		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');

 		$query = $this->db->get();

 		return $query;
	}

	public function tampilBaru()
	{
		$this->db->select('tbl_pengajuan.*,tbl_kios.*,tbl_pasar.*, tbl_tarif.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
 		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
 		$this->db->where('tbl_pengajuan.status', 'Selesai');

 		$query = $this->db->get();

 		return $query;
	}

	public function tampilPimpinan()
	{
		return $this->db->get_where('tbl_pimpinan', ['status' => 'Aktif']);
	}

	public function tampilPegawai($id)
	{
		$this->db->select('tbl_pengajuan.id_pengajuan,tbl_pegawai.nama_pegawai');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_pimpinan','tbl_pengajuan.id_pimpinan = tbl_pimpinan.id_pimpinan');
 		$this->db->join('tbl_pegawai','tbl_pimpinan.id_pegawai = tbl_pegawai.id_pegawai');
 		$this->db->where('tbl_pimpinan.status', 'Aktif');
 		$this->db->where('tbl_pengajuan.id_pengajuan', $id);

 		$query = $this->db->get();

 		return $query;

	}

	public function update($id, $data)
	{
		return $this->db->update('tbl_pengajuan', $data, ['id_pengajuan' => $id] );
	}

	public function getPengajuan($id)
	{	
		$this->db->select('tbl_pengajuan.*,tbl_kios.*, tbl_jenis.*');
 		$this->db->from('tbl_pengajuan');
 		$this->db->join('tbl_jenis','tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
 		$this->db->join('tbl_kios','tbl_pengajuan.id_kios = tbl_kios.id_kios');
 		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
 		$query = $this->db->get();

 		return $query;
	}

	public function getPengajuan2($id)
	{	
		$now = date('Y-m-d');

 		$this->db->select('tbl_op.*,tbl_wp.nik, tbl_objek.*, tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
 		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->join('tbl_objek','tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp','tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->where('tbl_op.id_objek_pajak', $id);
		$this->db->where('tbl_op.batas_berlaku >=', $now);
 		
 		$query = $this->db->get();

 		return $query;
	}


	public function getPengajuanWP($id)
	{	
		$now = date('Y-m-d');

 		$this->db->select('tbl_op.*,tbl_wp.id_wajib_pajak,tbl_objek.*, tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
 		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->join('tbl_objek','tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp','tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->where('tbl_op.id_objek_pajak', $id);
		$this->db->where('tbl_op.batas_berlaku >=', $now);
 		
 		$query = $this->db->get();

 		return $query;
	}



	

	public function tampilKepala($id)
	{
		$this->db->select('tbl_kpasar.*, tbl_pasar.*');
		$this->db->from('tbl_kpasar');
 		$this->db->join('tbl_pasar','tbl_kpasar.id_pasar = tbl_pasar.id_pasar');
 		$this->db->where('tbl_kpasar.status', 'Aktif');
 		$this->db->like('tbl_pasar.nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
	}

	public function tampilAdminWP()
 	{	
 		$now = date('Y-m-d');

 		$this->db->select('tbl_op.*, tbl_wp.*,tbl_objek.*, tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_objek','tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp','tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->where('tbl_op.batas_berlaku >=', $now);

 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilAdminWPlevelPasar($id)
 	{	
 		$now = date('Y-m-d');

 		$this->db->select('tbl_op.*,tbl_wp.*, tbl_jenis.*,tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis','tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios','tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar','tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif','tbl_kios.id_tarif = tbl_tarif.id_tarif');
 		$this->db->join('tbl_objek','tbl_op.id_objek = tbl_objek.id_objek');
		$this->db->join('tbl_wp','tbl_objek.id_wajib_pajak = tbl_wp.id_wajib_pajak');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$this->db->like('tbl_pasar.nama_pasar',  $id);

 		$query = $this->db->get();

 		return $query;
 	}

 	public function tampilAdminWP2($id)
 	{
 		$this->db->select('tbl_wp.*, tbl_pasar.*');
		$this->db->from('tbl_wp');
 		$this->db->join('tbl_pasar','tbl_wp.id_pasar = tbl_pasar.id_pasar');
 		$this->db->like('tbl_pasar.nama_pasar',  $id);
 		$query = $this->db->get();

 		return $query;
 	}


}
