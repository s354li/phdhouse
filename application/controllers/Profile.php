<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function view($page = 'profile') {
		if (!file_exists(APPPATH.'views/'.$page.'.php')) {
			show_404();
		}
		$userID = 2;
		$data['title'] = ucfirst($page);
		$data['page_title'] = '个人中心';
		$data['activemenu'] = '';
		$this->load->helper('url');
		$this->load->model('user_info');
		$this->load->model('vm_articles');

		$data['userInfo'] = $this->user_info->get_user_info($userID);
		$data['userArticles'] = $this->vm_articles->get_all_articles_by_authorID($userID);
		$data['userCollectedArticles'] = $this->vm_articles->get_all_collected_articles_by_userID($userID);
		$data['userLikedArticles'] = $this->vm_articles->get_all_liked_articles_by_userID($userID);

		$this->load->view('partial/header', $data);
		$this->load->view($page, $data);
		$this->load->view('partial/footer');
	}
	public function edit($page = 'edit') {
		if (!file_exists(APPPATH.'views/'.$page.'.php')) {
			show_404();
		}
		$userID = 2;
		$data['title'] = ucfirst($page);
		$data['page_title'] = '修改个人资料';
		$data['page_identifier'] = 'main';
		$data['activemenu'] = '';
		$this->load->helper('url');
		$this->load->model('user_info');

		if (isset($_POST) && isset($_POST["save"])) {
			$this->user_info->save_user_info($userID, $_POST);
		}
		$data['userInfo'] = $this->user_info->get_user_info($userID);
		$data['usermetaInfo'] = $this->user_info->get_usermeta_info($userID);
		

		$this->load->view('partial/header', $data);
		$this->load->view($page, $data);
		$this->load->view('partial/footer');
	}
}