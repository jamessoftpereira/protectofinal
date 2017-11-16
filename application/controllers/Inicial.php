<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {

	
	public function index()
	{
		$this->load->view('layout/entrada');
		$this->load->view('layout/view_inicio');
	}
}
