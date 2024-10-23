<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
	var $data_template = array();

	function set ($name,$value){
 		$this->data_template[$name] = $value;
	}

	function load($template = '', $fileview = '', $dataview = array(), $return = FALSE)
	{
 		$this->CI =& get_instance();
 		$this->set('content', $this->CI->load->view($fileview, $dataview, TRUE));
 		return $this->CI->load->view($template,$this->data_template, $return);
 	}
}
