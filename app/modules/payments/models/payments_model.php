<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payments_model extends MY_Model {
	public $tb_payments;
	
	public function __construct(){
		$this->tb_payments       = PAYMENTS_METHOD;
		parent::__construct();
	}

	public function get_paymnets_lists(){
		$this->db->select("*");
		$this->db->from($this->tb_api_providers);
		$this->db->order_by("id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function get_payments_list_for_new_user(){
		$result = [];
		$payments_defaut = $this->model->fetch('id, new_users, type, name, status', $this->tb_payments, ['status' => 1]);
		if ($payments_defaut) {
			foreach ($payments_defaut as $key => $row) {
				$result[$row->type] = $row->new_users;
			}
		}
		return $result;
	}

}
