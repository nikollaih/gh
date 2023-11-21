<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movements extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'MovementsModel']);
    }

	// Create a new movement
	public function create(){
		is_logged(false, false); 
		$postData = $this->input->post();
		$resultSave = $this->saveMovementData($postData);
		header("Location:".base_url()."Users/movements/".$postData["id_user"]);
	}

	// Save the new movement information
	private function saveMovementData($movement){
        $idMovement = false;
		$existsMovement = $this->MovementsModel->find($movement["id_movement"]);
        $existsClient =  $this->UsersModel->find($movement["id_user"]);

		if($existsMovement){
			$oldMovementPrice = $existsMovement["price"];
			$currentClientBalance = floatval($existsClient["balance"]);
			$currentClientBalance = ($movement["type"] == 0) ? $currentClientBalance + $oldMovementPrice : $currentClientBalance - $oldMovementPrice;
			$movementPrice = floatval($movement["price"]);
			$newClientBalance = ($movement["type"] == 0) ? $currentClientBalance - $movementPrice : $currentClientBalance + $movementPrice;
			$this->MovementsModel->update($movement);
			$this->UsersModel->update(array("id_user" => $movement["id_user"], "balance" => $newClientBalance));
			$idMovement = $movement["id_movement"];
		}
		else {
            if($existsClient){
                $idMovement = $this->MovementsModel->create($movement);
                $currentClientBalance = floatval($existsClient["balance"]);
                $movementPrice = floatval($movement["price"]);
                $newClientBalance = ($movement["type"] == 0) ? $currentClientBalance - $movementPrice : $currentClientBalance + $movementPrice;
                $this->UsersModel->update(array("id_user" => $movement["id_user"], "balance" => $newClientBalance));
            }
        }
		return ($idMovement) ? true : false;
	}

	// Get the movement information
	public function getMovement($idMovement){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsMovement = $this->MovementsModel->find($idMovement);

		if($existsMovement) 
			json_response($existsMovement, true, "Información del movimiento");
		else 
			json_response(null, false, "El movimiento no existe");
	}

	// Delete the movement information
	public function delete($idMovement){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsMovement = $this->MovementsModel->find($idMovement);
		if($existsMovement) {
			$client =  $this->UsersModel->find($existsMovement["id_user"]);
			$deleted = $this->MovementsModel->delete($idMovement);
			if($deleted){
				$currentClientBalance = floatval($client["balance"]);
				$newClientBalance = ($existsMovement["type"] == 0) ? $currentClientBalance + floatval($existsMovement["price"]) : $currentClientBalance - floatval($existsMovement["price"]);
				$this->UsersModel->update(array("id_user" => $existsMovement["id_user"], "balance" => $newClientBalance));
				json_response($deleted, true, "Movimiento eliminado exitosamente");
			}
			else 
				json_response(null, false, "Hubo un error por favor intente de nuevo más tarde");
		}
		else 
			json_response(null, false, "El movimiento no existe");
	}
}
