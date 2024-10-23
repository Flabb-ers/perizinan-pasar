<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/PhpSpreadsheet/src/Bootstrap.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Spreadsheet_lib {

	public function __construct()
	{
		log_message('Debug', 'Spreadsheet class is loaded. ');
	}

	public function create() {

		return new Spreadsheet();
	}
}