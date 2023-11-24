<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model(['UsersModel', 'ExpensesModel', 'IncomesModel', 'MovementsModel']);
    }

	public function dashboard(){
		is_logged(false, true);

		$startDate = date("Y-m")."-01";
		$endDate = date("Y-m")."-31";

		$debt = $this->UsersModel->getTotalDebt();
		$params["debt"] = ($debt["debt"]) ? $debt["debt"] : 0;
		$params["slow_payer"] = $this->UsersModel->getSlowPayer();
		$params["clients"] = $this->UsersModel->getByBalance("client");

		$expensesAmount = $this->ExpensesModel->getAllAmount();
		$incomesAmount = $this->IncomesModel->getAllAmount();
		$movementsIncomes = $this->MovementsModel->getMovementsAmountByDate($startDate, $endDate);

		$params["balance"] = floatval($incomesAmount["amount"]) +floatval($movementsIncomes["amount"]) - floatval($expensesAmount["amount"]);
		$params["expenses"] = floatval($expensesAmount["amount"]);
		$params["incomes"] = floatval($incomesAmount["amount"]) + floatval($movementsIncomes["amount"]);

		$this->load->view('dashboard/index', $params);
	}
}
