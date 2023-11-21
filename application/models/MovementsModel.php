<?php
class MovementsModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// Create a new movement
	function create($data){
		$this->db->insert("movements", $data);
		return $this->db->insert_id();
	}

	// Update the movement information
  	public function update($data){
    	$this->db->where("id_movement", $data["id_movement"]);
		return $this->db->update("movements", $data);
  	}

	// Get a movement by id
	public function find($id){
		$this->db->from("movements");
		$this->db->where("id_movement", $id);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : false;
	}

	// Get the users listing by user type
	public function getByUserType($idUser, $type = 1){
		$this->db->select("m.*");
		$this->db->from("movements m");
        $this->db->join("users u", "u.id_user = m.id_user");
        $this->db->where("m.id_user", $idUser);
		if($type != "all")
        	$this->db->where("m.type", $type);
		$this->db->order_by("m.date", "desc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}

	// Delete a movement
	public function delete($idMovement){
		$this->db->where("id_movement", $idMovement);
		return $this->db->delete("movements");
	}
}
