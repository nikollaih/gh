<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function dashboard(){
		is_logged(false, false);
		$this->load->view('dashboard/index');
	}
}
