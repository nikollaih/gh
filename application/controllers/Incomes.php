<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomes extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'IncomesModel']);
    }

    // Incomes list
	public function index(){
		is_logged(false, true); 
		$params["incomes"] = $this->IncomesModel->getAll();
		$this->load->view("incomes/index", $params);
	}

	// Create a new income
	public function create(){
		is_logged(false, true); 
		$postData = $this->input->post();
		$resultSave = $this->saveIncomeData($postData);
		header("Location:".base_url()."Incomes");
	}

	// Save the new income information
	private function saveIncomeData($income){
        $idIncome = false;
		$existsIncome = $this->IncomesModel->find($income["id_income"]);

		if($existsIncome){
			$this->IncomesModel->update($income);
			$idIncome = $income["id_income"];
		}
		else $idIncome = $this->IncomesModel->create($income);

		return ($idIncome) ? true : false;
	}

	// Get the income information
	public function getIncome($idIncome){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsIncome = $this->IncomesModel->find($idIncome);

		if($existsIncome) 
			json_response($existsIncome, true, "Información del gasto");
		else 
			json_response(null, false, "El gasto no existe");
	}

	// Delete the income information
	public function delete($idIncome){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsIncome = $this->IncomesModel->find($idIncome);

		if($existsIncome) {
			$deleted = $this->IncomesModel->delete($idIncome);
			if($deleted) json_response($deleted, true, "Gasto eliminado exitosamente");
			else json_response(null, false, "Hubo un error por favor intente de nuevo más tarde");
		}
		else 
			json_response(null, false, "El gasto no existe");
	}
}
