<?php
class UsersModel extends CI_Model {
 
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// Search for the user by username and password to validate the login
  	public function login($username, $password){
		$this->db->select("u.id_user, u.id_user_type, u.fullname, u.profile_image");
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
		$this->db->where("ut.user_type", $type);
		$this->db->where("u.is_active", 1);
		$this->db->order_by("u.fullname", "asc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}

	// Get the users listing by balance
	public function getByBalance($type){
		$this->db->from("users u");
		$this->db->join("user_types ut", "u.id_user_type = ut.id_user_types");
		$this->db->where("ut.user_type", $type);
		$this->db->where("u.is_active", 1);
		$this->db->where("u.balance <", 0);
		$this->db->order_by("u.fullname", "asc");
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}

	// Get the total debt among the clients
	public function getTotalDebt($type = 2){
		$this->db->select("SUM(u.balance) as debt");
		$this->db->from("users u");
		$this->db->join("user_types ut", "u.id_user_type = ut.id_user_types");
		$this->db->where("u.id_user_type", $type);
		$this->db->where("u.is_active", 1);
		$this->db->where("u.balance <", 0);
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->row_array() : [];
	}

	// Get the users listing by user type
	public function getSlowPayer(){
		$oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
		$result = $this->db->query("SELECT u.*, m.* FROM users u JOIN movements m ON u.id_user = m.id_user GROUP BY u.id_user HAVING MAX(m.date) < DATE_SUB(NOW(), INTERVAL 1 MONTH)");
		return ($result->num_rows() > 0) ? $result->result_array() : [];
	}
}
