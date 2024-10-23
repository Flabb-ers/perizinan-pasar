<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanOP extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('M_op');
        $this->load->model('M_pasar');

        if ($this->session->userdata('level')!=='Admin') {
        redirect('Auth/index');
        }
     }
    
    public function laporansemua(){
            $pengajuan = $this->M_op->tampilJoinActiveOP()->result();
            $pasar = $this->M_op->tampilPasar()->result();
        
            $data = array(
                'datakios'=> $pengajuan,
                'pasar' => $pasar,
                'tgl_awal' => '',
                'tgl_akhir' => '',
                'id_pasar' => '',
             );
        $this->template->load('pages/index','Admin/v_laporan/readOP', $data); 
    }


public function filterPengajuan()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $id_pasar = $this->input->post('id_pasar');

        if ($id_pasar !== 'Pilih Pasar') {
            $data['pengajuan'] = $this->M_op->filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar);
        }else{
            $data['pengajuan'] = $this->M_op->filterByDate($tgl_awal, $tgl_akhir);
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
            $dataPengajuan = $this->M_op->filterByDateDinas($tgl_awal, $tgl_akhir, $id_pasar);
        }else{
            $dataPengajuan = $this->M_op->filterByDate($tgl_awal, $tgl_akhir);
        }

        
        
        // Header untuk menentukan tipe file dan nama file
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Objek Pajak $tgl_awal-$tgl_akhir.xls");

        // Buat tabel HTML untuk data pengajuan
        $output = '<table border="1">';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= '  <th>No</th>
                      <th>NPWRD</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Alamat</th>
                      <th>Nama Pasar</th>
                      <th>Nama Blok</th>
                      <th>No Blok</th>
                      <th>Jenis Dagangan</th>
                      <th>Tanggal Daftar</th>
                      <th>Batas Berlaku</th>
                     ';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';

        $no = 1; // Variabel untuk nomor urut

        foreach ($dataPengajuan as $pengajuan) {
            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $pengajuan->npwrd . '</td>';
            $output .= '<td>' . $pengajuan->nama . '</td>';
            $output .= '<td>' . $pengajuan->nik . '</td>';
            $output .= '<td>' . $pengajuan->alamat . '</td>';
            $output .= '<td>' . $pengajuan->nama_pasar . '</td>';
            $output .= '<td>' . $pengajuan->nama_blok . '</td>';
            $output .= '<td>' . $pengajuan->no_blok . '</td>';
            $output .= '<td>' . $pengajuan->jenis_dagangan . '</td>';
            $output .= '<td>' . $pengajuan->tgl_daftar . '</td>';
            $output .= '<td>' . $pengajuan->batas_berlaku . '</td>';
            $output .= '</tr>';
            $no++; // Increment nomor urut
        }

        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
         // Redirect pengguna kembali ke halaman utama setelah proses download selesai
    
    }

}
