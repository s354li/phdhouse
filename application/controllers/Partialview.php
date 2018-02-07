<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partialview extends CI_Controller {

	/**
	 * the partial view for header, footer, side action and so on...
	 */
	public function CallHeader()
	{
		$this->load->helper('url');
		$data = array(
			"activeMenu" => "menu_article"
			);
		$this->load->view('partial/header.php', $data);
	}

	public function CallFooter(){
		$this->load->helper('url');
		$this->load->view('partial/footer.php');

	}
}
