<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'ExpensesModel']);
    }

    // Expenses list
	public function index(){
		is_logged(false, true); 
		$params["expenses"] = $this->ExpensesModel->getAll();
		$this->load->view("expenses/index", $params);
	}

	// Create a new expense
	public function create(){
		is_logged(false, true); 
		$postData = $this->input->post();
		$resultSave = $this->saveExpenseData($postData);
		header("Location:".base_url()."Expenses");
	}

	// Save the new expense information
	private function saveExpenseData($expense){
        $idExpense = false;
		$existsExpense = $this->ExpensesModel->find($expense["id_expense"]);

		if($existsExpense){
			$this->ExpensesModel->update($expense);
			$idExpense = $expense["id_expense"];
		}
		else $idExpense = $this->ExpensesModel->create($expense);

		return ($idExpense) ? true : false;
	}

	// Get the expense information
	public function getExpense($idExpense){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsExpense = $this->ExpensesModel->find($idExpense);

		if($existsExpense) 
			json_response($existsExpense, true, "Información del gasto");
		else 
			json_response(null, false, "El gasto no existe");
	}

	// Delete the expense information
	public function delete($idExpense){
		if (!is_logged(true, false)){
			json_response(null, true, "Error de autenticación");
		}

		$existsExpense = $this->ExpensesModel->find($idExpense);

		if($existsExpense) {
			$deleted = $this->ExpensesModel->delete($idExpense);
			if($deleted) json_response($deleted, true, "Gasto eliminado exitosamente");
			else json_response(null, false, "Hubo un error por favor intente de nuevo más tarde");
		}
		else 
			json_response(null, false, "El gasto no existe");
	}
}
