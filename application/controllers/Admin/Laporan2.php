<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan2 extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('M_pengajuan');
        $this->load->model('M_pasar');

        if ($this->session->userdata('level')!=='Admin') {
        redirect('Auth/index');
        }
     }
    
    public function laporansemua(){
            $pengajuan = $this->M_pengajuan->tampilJoin()->result();
            $pasar = $this->M_pengajuan->tampilPasar()->result();
        
            $data = array(
                'dataPengajuan'=> $pengajuan,
                'pasar' => $pasar,
                'tgl_awal' => '',
                'tgl_akhir' => '',
                'id_pasar' => '',
                'status' => '',
             );
        $this->template->load('pages/index','Admin/v_laporan/readPengajuan', $data); 
    }


public function filterPengajuan()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $id_pasar = $this->input->post('id_pasar');

        if ($id_pasar !== 'Pilih Pasar') {
            $data['pengajuan'] = $this->M_pengajuan->filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar);
        }else{
            $data['pengajuan'] = $this->M_pengajuan->filterByDate($tgl_awal, $tgl_akhir);
        }

        

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }



    public function exportLaporanPasar()        
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $id_pasar = $this->input->get('id_pasar');

        // Lakukan logika untuk mengambil data pengajuan dari database berdasarkan tanggal
        if ($id_pasar !== 'Pilih Pasar') {
            $dataPengajuan = $this->M_pengajuan->filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar);
        }else{
            $dataPengajuan = $this->M_pengajuan->filterByDate($tgl_awal, $tgl_akhir);
            $nama = '';
        }

        
        
        // Header untuk menentukan tipe file dan nama file
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=PermohonanPerpanjangan $tgl_awal-$tgl_akhir.xls");

        // Buat tabel HTML untuk data pengajuan
        $output = '<table border="1">';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= '  <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Jenis</th>
                      <th>No Blok</th>
                      <th>Luas</th>
                      <th>Total Tarif</th>
                      <th>Status</th>
                      <th>Keterangan</th>';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';

        $no = 1; // Variabel untuk nomor urut

        foreach ($dataPengajuan as $pengajuan) {
            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $pengajuan->nama_wp . '</td>';
            $output .= '<td>' . $pengajuan->tanggal . '</td>';
            $output .= '<td>' . $pengajuan->jenis . '</td>';
            $output .= '<td>' . $pengajuan->no_kioslos . '</td>';
            $output .= '<td>' . $pengajuan->luas=$pengajuan->panjang*$pengajuan->lebar . '</td>';
            $output .= '<td>' . $pengajuan->panjang*$pengajuan->lebar*$pengajuan->tarif . '</td>';
            $output .= '<td>' . $pengajuan->status . '</td>';
            $output .= '<td>' . $pengajuan->keterangan . '</td>';
            $output .= '</tr>';
            $no++; // Increment nomor urut
        }

        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
         // Redirect pengguna kembali ke halaman utama setelah proses download selesai
    
    }

}
