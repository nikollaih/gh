<?php
class CategoriesIncomeExpensesModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// Get the expenses listing
	public function getAll($type = 0){
		$this->db->from("categories_income_expense cie");
		$this->db->where("type", $type);
		$this->db->order_by("cie.category", "asc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}
}
