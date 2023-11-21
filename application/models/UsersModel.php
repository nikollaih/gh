<?php
class UsersModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// Search for the user by username and password to validate the login
  	public function login($username, $password){
    	$this->db->from("users u");
		$this->db->where("u.username", $username);
		$this->db->where("u.password", md5($password));
		$this->db->where("u.is_active", 1);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : false;
  	}  
	
	// Create a new user
	function create($data){
		$this->db->insert("users", $data);
		return $this->db->insert_id();
	}

	// Update the user information
  	public function update($data){
    	$this->db->where("id_user", $data["id_user"]);
		return $this->db->update("users", $data);
  	}

	// Get a user by id
	public function find($id){
		$this->db->from("users");
		$this->db->where("id_user", $id);
		$this->db->where("is_active", 1);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : false;
	}

	// Get the users listing by user type
	public function getByType($type){
		$this->db->from("users u");
		$this->db->join("user_types ut", "u.id_user_type = ut.id_user_types");
		$this->db->where("user_type", $type);
		$this->db->where("u.is_active", 1);
		$this->db->order_by("u.fullname", "asc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}
}
