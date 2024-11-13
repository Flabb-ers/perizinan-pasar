<?php

class M_baru extends CI_Model
{

	public function read()
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function get_jumlah_kios($npwrd)
	{
		$this->db->where('npwrd', '$npwrd');
		$query = $this->db->get('M_baru');

		return $query->num_rows();
	}

	public function addData($data)
	{
		return $this->db->insert('tbl_pengajuan', $data);
	}

	public function tampilData($id)
	{
		return $this->db->get_where('tbl_pengajuan', ['id_pengajuan' => $id]);
	}

	public function editData($id, $data)
	{
		return $this->db->update('tbl_pengajuan', $data, ['id_pengajuan' => $id]);
	}

	public function hapusData($id)
	{
		return $this->db->delete('tbl_pengajuan', ['id_pengajuan' => $id]);
	}

	public function tampilJoin()
	{
		$this->db->select('tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$query = $this->db->get();

		return $query;
	}


	public function tampilJoinwhere2($id)
	{
		$this->db->select('tbl_pengajuan.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->where('tbl_pengajuan.status_npwrd', 'Belum');
		$this->db->where('tbl_pengajuan.status_op', 'Belum');
		$this->db->like('nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilJoinwhere($id)
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->where('tbl_pengajuan.status', 'Selesai');
		$this->db->like('nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilJenis()
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->order_by('id_jenis', 'DESC');

		$query = $this->db->get();

		return $query;
	}

	public function tampilJoinwhere3($id)
	{
		$this->db->select('tbl_pengajuan.*, tbl_jenis.jenis_dagangan, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->where('tbl_pengajuan.status', 'Proses');
		$this->db->like('nama_pasar',  $id);
		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');

		$query = $this->db->get();

		return $query;
	}

	public function tampilLevelAdmin()
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->where('tbl_pengajuan.status', 'Proses');
		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilCreateAdmin()
	{
		$this->db->select('tbl_pengajuan.*, tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->where('tbl_pengajuan.status', 'Selesai');
		$query = $this->db->get();

		return $query;
	}

	public function tampilLevelPasar($id)
	{
		$this->db->select('tbl_pengajuan.*, tbl_jenis.*,tbl_kios.*,tbl_tarif.*,tbl_pasar.nama_pasar');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$this->db->like('nama_pasar',  $id);
		$this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	public function tampilKios2($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilObjekPajak2($id)
	{
		$this->db->select('tbl_op.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_jenis', 'tbl_op.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$dataop = $this->db->get();

		return $dataop;
	}

	public function get_available_kios2($dataop, $id)
	{

		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$all_kios = $this->db->get();

		$available_kios = array();

		foreach ($all_kios->result() as $kios) {
			$found = false;

			foreach ($dataop->result() as $used) {
				if ($used->id_kios == $kios->id_kios) {
					$found = true;
					break;
				}
			}

			if (!$found) {
				$available_kios[] = $kios;
			}
		}
		return $available_kios;
	}

	public function GetPasar($id_pasar)
	{
		return $this->db->get_where('tbl_pasar', array('id_pasar' => $id_pasar));
	}

	public function tampilKios()
	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$query = $this->db->get();

		return $query;
	}

	public function getActiveOP()
	{
		$now = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$this->db->where('tbl_op.batas_berlaku >=', $now);
		$query = $this->db->get();

		return $query;
	}

	public function tampilObjekPajak()
	{
		$this->db->select('*');
		$this->db->from('tbl_op');
		$this->db->join('tbl_kios', 'tbl_op.id_kios = tbl_kios.id_kios');
		$dataop = $this->db->get();

		return $dataop;
	}

	public function get_available_kios($dataop)
	{
		$this->db->select('*');
		$this->db->from('tbl_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$all_kios = $this->db->get();

		$available_kios = array();

		foreach ($all_kios->result() as $kios) {
			$found = false;

			foreach ($dataop->result() as $used) {
				if ($used->id_kios == $kios->id_kios) {
					$found = true;
					break;
				}
			}

			if (!$found) {
				$available_kios[] = $kios;
			}
		}
		return $available_kios;
	}

	public function tampilPasar()
	{
		return $this->db->get('tbl_pasar');
	}

	public function tampilTarif()
	{
		return $this->db->get('tbl_tarif');
	}

	public function tampilPimpinan()
	{
		return $this->db->get_where('tbl_pimpinan', ['status' => 'Aktif']);
	}

	public function tampilPegawai()
	{
		$this->db->select('tbl_pimpinan.*');
		$this->db->from('tbl_pimpinan');
		$this->db->join('tbl_pegawai', 'tbl_pimpinan.id_pegawai = tbl_pegawai.id_pegawai');
		$this->db->where('tbl_pimpinan.status', 'Aktif');

		$query = $this->db->get();

		return $query;
	}

	public function update($id, $data)
	{
		return $this->db->update('tbl_pengajuan', $data, ['id_pengajuan' => $id]);
	}


	public function tampilDataCetak()
	{
		$this->db->select('tbl_pengajuan.*, tbl_kios.*, tbl_pasar.*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->where('tbl_pengajuan.status', 'Selesai');
		$this->db->where('tbl_pengajuan.jenis_pengajuan', 'Baru');
		$query = $this->db->get();

		return $query;
	}

	public function tampilDataCetakPasar($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_pasar', 'tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_pengajuan.id_tarif = tbl_tarif.id_tarif');
		$this->db->like('nama_pasar',  $id);
		$this->db->where('tbl_pengajuan.status', 'Selesai');
		$query = $this->db->get();

		return $query;
	}

	public function print($id)
	{

		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_kios.*, tbl_pasar.*, tbl_tarif.*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
		$query = $this->db->get();

		return $query;
	}


	public function filterByDate($tgl_awal, $tgl_akhir)
	{ {
			$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_tarif.tarif');
			$this->db->from('tbl_pengajuan');
			$this->db->join('tbl_pasar', 'tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
			$this->db->join('tbl_tarif', 'tbl_pengajuan.id_tarif = tbl_tarif.id_tarif');
			$this->db->where('tanggal >=', $tgl_awal);
			$this->db->where('tanggal <=', $tgl_akhir);
			$query = $this->db->get();

			return $query->result();
		}
	}


	public function filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar)
	{
		$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_blok, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_pasar', 'tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_wp', 'tbl_pengajuan.id_wp = tbl_wp.id_wp');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pasar.id_pasar', $id_pasar);
		$this->db->where('tanggal >=', $tgl_awal);
		$this->db->where('tanggal <=', $tgl_akhir);
		$query = $this->db->get();

		return $query->result();
	}

	public function filterByDatePasar($tgl_awal, $tgl_akhir, $id_pasar)
	{ {
			$this->db->select('tbl_pengajuan.*,tbl_pasar.*,tbl_wp.*,tbl_kios.no_blok, tbl_kios.panjang, tbl_kios.lebar, tbl_tarif.tarif');
			$this->db->from('tbl_pengajuan');
			$this->db->join('tbl_pasar', 'tbl_pengajuan.id_pasar = tbl_pasar.id_pasar');
			$this->db->join('tbl_wp', 'tbl_pengajuan.id_wp = tbl_wp.id_wp');
			$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
			$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
			$this->db->where('tanggal >=', $tgl_awal);
			$this->db->where('tanggal <=', $tgl_akhir);
			$this->db->like('nama_pasar',  $id_pasar);

			$query = $this->db->get();

			return $query->result();
		}
	}

	public function getPengajuan($id)
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_pasar.*, tbl_tarif.jenis as jenis, tbl_kios.nama_blok as nama_blok, tbl_kios.no_blok as no_blok');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
		$query = $this->db->get();

		return $query;
	}

	public function getPengajuan2($id)
	{
		$this->db->select('tbl_pengajuan.*,tbl_jenis.*, tbl_pasar.*, tbl_tarif.jenis as jenis, tbl_kios.nama_blok as nama_blok, tbl_kios.no_blok as no_blok');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_jenis', 'tbl_pengajuan.id_jenis = tbl_jenis.id_jenis');
		$this->db->join('tbl_kios', 'tbl_pengajuan.id_kios = tbl_kios.id_kios');
		$this->db->join('tbl_pasar', 'tbl_kios.id_pasar = tbl_pasar.id_pasar');
		$this->db->join('tbl_tarif', 'tbl_kios.id_tarif = tbl_tarif.id_tarif');
		$this->db->where('tbl_pengajuan.id_pengajuan', $id);
		$query = $this->db->get();

		return $query;
	}

	public function tampilKepala($id)
	{
		$this->db->select('tbl_kpasar.*, tbl_pasar.*');
		$this->db->from('tbl_kpasar');
		$this->db->join('tbl_pasar', 'tbl_kpasar.id_pasar = tbl_pasar.id_pasar');
		$this->db->where('tbl_kpasar.status', 'Aktif');
		$this->db->like('tbl_pasar.nama_pasar',  $id);
		$query = $this->db->get();

		return $query;
	}
}
