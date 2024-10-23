<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKiosTakhuni extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('M_kios');
        $this->load->model('M_pasar');

        if ($this->session->userdata('level')!=='Admin') {
        redirect('Auth/index');
        }
     }
    
    public function laporansemua(){
            $pengajuan = $this->M_kios->tampilJoinKiosTakHuni()->result();
            $pasar = $this->M_kios->tampilPasar()->result();
        
            $data = array(
                'datawp'=> $pengajuan,
                'pasar' => $pasar,
                'id_pasar' => '',
             );
        $this->template->load('pages/index','Admin/v_laporan/readKiosTakhuni', $data); 
    }


public function filterPengajuan()
    {
        $id_pasar = $this->input->post('id_pasar');

        if ($id_pasar !== 'Pilih Pasar') {
            $data['pengajuan'] = $this->M_kios->filterByDateDinasTakhuni($id_pasar);
        }else{
            $data['pengajuan'] = $this->M_kios->filterByDateTakhuni();
        }

        

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }



    public function exportLaporanPasar()        
    {
        $id_pasar = $this->input->get('id_pasar');

        // Lakukan logika untuk mengambil data pengajuan dari database berdasarkan tanggal
        if ($id_pasar !== 'Pilih Pasar') {
            $dataPengajuan = $this->M_kios->filterByDateDinasTakhuni($id_pasar);
        }else{
            $dataPengajuan = $this->M_kios->filterByDateTakhuni();
        }

        
        
        // Header untuk menentukan tipe file dan nama file
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Kios $id_pasar.xls");

        // Buat tabel HTML untuk data pengajuan
        $output = '<table border="1">';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= ' 
                     <th>No</th>
                    <th>Jenis</th>
                     <th>Letak</th>
                     <th>Tarif</th>
                     <th>Nama Blok</th>
                     <th>No Blok</th>
                     <th>Panjang</th>
                     <th>Lebar</th>
                     ';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';

        $no = 1; // Variabel untuk nomor urut

        foreach ($dataPengajuan as $pengajuan) {
            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $pengajuan->jenis . '</td>';
            $output .= '<td>' . $pengajuan->letak_kioslos . '</td>';
            $output .= '<td>' . $pengajuan->tarif . '</td>';
            $output .= '<td>' . $pengajuan->nama_blok . '</td>';
            $output .= '<td>' . $pengajuan->no_blok . '</td>';
            $output .= '<td>' . $pengajuan->panjang . '</td>';
            $output .= '<td>' . $pengajuan->lebar . '</td>';
            $output .= '</tr>';
            $no++; // Increment nomor urut
        }

        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
         // Redirect pengguna kembali ke halaman utama setelah proses download selesai
    
    }

}
