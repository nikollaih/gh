<?php
class ExpensesModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// Create a new expense
	function create($data){
		$this->db->insert("expenses", $data);
		return $this->db->insert_id();
	}

	// Update the expense information
  	public function update($data){
    	$this->db->where("id_expense", $data["id_expense"]);
		return $this->db->update("expenses", $data);
  	}

	// Get a expense by id
	public function find($id){
		$this->db->from("expenses e");
        $this->db->join("categories_income_expense cie", "cie.id_category =  e.id_category");
		$this->db->where("id_expense", $id);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : false;
	}

	// Get the expenses listing
	public function getAll(){
		$this->db->select("e.*, cie.category");
		$this->db->from("expenses e");
        $this->db->join("categories_income_expense cie", "cie.id_category =  e.id_category");
		$this->db->order_by("e.date", "desc");
		$this->db->order_by("e.id_expense", "desc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}

	// Get the expenses amount
	public function getAllAmount(){
		$this->db->select("SUM(e.price) as amount");
		$this->db->from("expenses e");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : [];
	}

	// Delete a expense
	public function delete($idMovement){
		$this->db->where("id_expense", $idMovement);
		return $this->db->delete("expenses");
	}
}
