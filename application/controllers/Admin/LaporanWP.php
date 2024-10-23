<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanWP extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('M_wp');
        $this->load->model('M_pasar');

        if ($this->session->userdata('level')!=='Admin') {
        redirect('Auth/index');
        }
     }
    
    public function laporansemua(){
            $pengajuan = $this->M_wp->read()->result();
            $pasar = $this->M_wp->tampilPasar()->result();
        
            $data = array(
                'datawp'=> $pengajuan,
                'pasar' => $pasar,
                'id_pasar' => '',
             );
        $this->template->load('pages/index','Admin/v_laporan/readWP', $data); 
    }


public function filterPengajuan()
    {
        $id_pasar = $this->input->post('id_pasar');

        if ($id_pasar !== 'Pilih Pasar') {
            $data['pengajuan'] = $this->M_wp->filterByDateDinas($id_pasar);
        }else{
            $data['pengajuan'] = $this->M_wp->filterByDate();
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
            $dataPengajuan = $this->M_wp->filterByDateDinas($id_pasar);
        }else{
            $dataPengajuan = $this->M_wp->filterByDate();
        }

        
        
        // Header untuk menentukan tipe file dan nama file
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Wajib Pajak $id_pasar.xls");

        // Buat tabel HTML untuk data pengajuan
        $output = '<table border="1">';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= '  <th>No</th>
                      <th>NPWRD</th>
                      <th>Nama Wajib Pajak</th>
                      <th>Nama Pasar</th>
                      <th>Alamat</th>
                      <th>NIK</th>
                      <th>No Telp</th>
                      <th>Email</th>
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
            $output .= '<td>' . $pengajuan->nama_pasar . '</td>';
            $output .= '<td>' . $pengajuan->alamat . '</td>';
            $output .= '<td>' . $pengajuan->nik . '</td>';
            $output .= '<td>' . $pengajuan->no_telp . '</td>';
            $output .= '<td>' . $pengajuan->email . '</td>';
            $output .= '</tr>';
            $no++; // Increment nomor urut
        }

        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
         // Redirect pengguna kembali ke halaman utama setelah proses download selesai
    
    }

}
