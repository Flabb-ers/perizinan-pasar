<?php
use Dompdf\Dompdf;

class Dompdf_gen {
    
    public function __construct() {
        require_once APPPATH . '../vendor/autoload.php';

        $this->dompdf = new Dompdf();

        $CI =& get_instance();
        $CI->dompdf = $this->dompdf;
    }
}
