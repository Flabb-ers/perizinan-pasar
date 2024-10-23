<?php

class M_notifikasi extends CI_Model 
{

	public function jumlah_notif()
	{
 		$query = $this->db->query( "SELECT COUNT (*) as total FROM tbl_op WHERE 
                                (batas_berlaku = DATE_ADD(CURDATE(), INTERVAL 31 DAY)) OR 
                                (batas_berlaku = DATE_ADD(CURDATE(), INTERVAL 30 DAY)) OR
                                (batas_berlaku = DATE_ADD(CURDATE(), INTERVAL 29 DAY)) OR
                                (batas_berlaku = DATE_ADD(CURDATE(), INTERVAL 28 DAY))");
        return $query->row()->total;
	}

}