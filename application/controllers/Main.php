<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'ExpensesModel', 'IncomesModel']);
    }

	public function dashboard(){
		is_logged(false, true);

		$debt = $this->UsersModel->getTotalDebt();
		$params["debt"] = ($debt["debt"]) ? $debt["debt"] : 0;
		$params["slow_payer"] = $this->UsersModel->getSlowPayer();
		$params["clients"] = $this->UsersModel->getByBalance("client");

		$expensesAmount = $this->ExpensesModel->getAllAmount();
		$incomesAmount = $this->IncomesModel->getAllAmount();

		$params["balance"] = floatval($incomesAmount["amount"]) - floatval($expensesAmount["amount"]);
		$params["expenses"] = floatval($expensesAmount["amount"]);
		$params["incomes"] = floatval($incomesAmount["amount"]);

		$this->load->view('dashboard/index', $params);
	}
}
