<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class payments_bonuses extends MX_Controller {
	public $tb_payments;
	public $tb_payments_bonuses;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_payments               = PAYMENTS_METHOD;
		$this->tb_payments_bonuses       = PAYMENTS_BONUSES;
		$this->columns = array(
			"method"           => lang("method"),
			"bonus"            => lang("bonus_percentage"),
			"from"             => lang("bonus_from"),
			"status"           => lang("Status"),
		);
	}

	public function index(){
		$payments_bonuses = $this->model->fetch('*', $this->tb_payments_bonuses);
		$data = array(
			"module"              => get_class($this),
			"columns"             => $this->columns,
			"payments_bonuses"    => $payments_bonuses,
		);
		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$payments_bonus    = $this->model->get("*", $this->tb_payments_bonuses, ['ids' => $ids]);
		$data = array(
			"module"   		 => get_class($this),
			"payments_bonus" => $payments_bonus,
			"payments"       => $this->model->fetch('id, name', $this->tb_payments),
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		if (!get_role('admin')) _validation('error', "Permission Denied!");
		$params                = post('editbonus');
		if (!$params['method'] || !$params['percentage']) {
			_validation('error', 'Please fill in required fields');
		}

		$payment              = $this->model->get("id", $this->tb_payments, ['id' => $params['method']]);
		if (!$payment) {
			_validation('error', 'Please fill in required fields');
		} 

		if ((int)$params['bonus_from'] < 0) {
			_validation('error', 'Bonus From is less than 0');
		} 	

		if ((int)$params['percentage'] < 0) {
			_validation('error', 'Bonus Percentage is less than 0');
		} 		

		$data_bonus = array(
			"percentage"      => (int)$params['percentage'],
			"bonus_from"      => (int)$params['bonus_from'],
			"status"          => (int)$params['status'],
		);

		$item  = $this->model->get("id", $this->tb_payments_bonuses, ['ids' => $ids, 'status' => 1]);
		if ($item) {
			$this->db->update($this->tb_payments_bonuses, $data_bonus, ['ids' => $ids]);
		}else{
			$data_bonus['ids']        = ids();
			$data_bonus['payment_id'] = $payment->id;
			$this->db->insert($this->tb_payments_bonuses, $data_bonus);
		}
		_validation('success', lang("Update_successfully"));

	}
	
	public function ajax_toggle_item_status($id = ""){
		if (!get_role('admin')) _validation('error', "Permission Denied!");
		$status  = post('status');
		$item  = $this->model->get("id", $this->tb_payments_bonuses, ['id' => $id]);
		if ($item ) {
			$this->db->update($this->tb_payments_bonuses, ['status' => (int)$status], ['id' => $id]);
			_validation('success', lang("Update_successfully"));
		}
	}
	
	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_payments, $ids, true);
	}

}