<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'MovementsModel']);
    }

	public function login(){
		is_logged(true, false);
		$this->load->view('users/login');
	}

	// Load the view with all the clients listing
	public function index(){
		$params["clients"] = $this->UsersModel->getByType("client");
		$this->load->view('users/index', $params);
	}

	// Create a new client
	public function create(){
		$postData = $this->input->post();
		$resultSave = $this->saveClientData($postData, $_FILES);
		if($resultSave){
			header("Location:".base_url().$_SERVER["PATH_INFO"]);
		}
	}

	// Show all te user movements
	public function movements($idUser){
		$params["client"] = $this->UsersModel->find($idUser);
		$params["movements"] = $this->MovementsModel->getByUserType($idUser, "all");

		if($params["client"]){
			$this->load->view('users/movements', $params);
		}
		else header("Location:".base_url());
	}

	// Save the new client information
	private function saveClientData($client, $FILES){
		$existsClient = $this->UsersModel->find($client["id_user"]);

		if($existsClient){
			$this->UsersModel->update($client);
			$idUser = $client["id_user"];
		}
		else $idUser = $this->UsersModel->create($client);

		// In case there is a profile image it will be load into the server
		if(isset($FILES["profile-image"]) && $idUser){
            if(isset($FILES["profile-image"]['name'])) {
                if($FILES["profile-image"]['name']){
                    $file_name = md5($idUser).".".get_file_format($_FILES["profile-image"]['name']);
                    $file_tmp =$FILES["profile-image"]['tmp_name'];
                    if (move_uploaded_file($file_tmp,"uploads/users/profile/".$file_name)){
                        $this->UsersModel->update(array("id_user" => $idUser, "profile_image" => $file_name));
                    }
                }
            }
        }

		return ($idUser) ? true : false;
	}

	// Get the user information
	public function getUser($idUser){
		$existsClient = $this->UsersModel->find($idUser);

		if($existsClient) 
			json_response($existsClient, true, "Información del cliente");
		else 
			json_response(null, false, "El cliente no existe");
	}

	// Delete the user information
	public function delete($idUser){
		$existsClient = $this->UsersModel->find($idUser);
		if($existsClient) {
			$deleted = $this->UsersModel->update(array("id_user" => $idUser, "is_active" => 0));
			if($deleted)
				json_response($deleted, true, "Cliente eliminado exitosamente");
			else 
				json_response(null, false, "Hubo un error por favor intente de nuevo más tarde");
		}
		else 
			json_response(null, false, "El cliente no existe");
	}
}
