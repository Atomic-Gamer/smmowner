<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payments_bonuses_model extends MY_Model {
	public $tb_payments;
	
	public function __construct(){
		$this->tb_payments       = PAYMENTS_METHOD;
		parent::__construct();
	}

	function get_paymnets_lists(){
		$this->db->select("*");
		$this->db->from($this->tb_api_providers);
		$this->db->order_by("id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}
