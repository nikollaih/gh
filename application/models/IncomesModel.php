<?php
class IncomesModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// Create a new income
	function create($data){
		$this->db->insert("incomes", $data);
		return $this->db->insert_id();
	}

	// Update the income information
  	public function update($data){
    	$this->db->where("id_income", $data["id_income"]);
		return $this->db->update("incomes", $data);
  	}

	// Get a income by id
	public function find($id){
		$this->db->from("incomes e");
        $this->db->join("categories_income_expense cie", "cie.id_category =  e.id_category");
		$this->db->where("id_income", $id);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : false;
	}

	// Get the incomes listing
	public function getAll(){
		$this->db->select("e.*, cie.category");
		$this->db->from("incomes e");
        $this->db->join("categories_income_expense cie", "cie.id_category =  e.id_category");
		$this->db->order_by("e.date", "desc");
		$this->db->order_by("e.id_income", "desc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}

	// Delete a income
	public function delete($idMovement){
		$this->db->where("id_income", $idMovement);
		return $this->db->delete("incomes");
	}
}
