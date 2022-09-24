<?php 

	class Login extends Backend_Controller{

		public function index(){
			// print_r(password_hash("maulana", PASSWORD_DEFAULT));
			$this->load->view('login');
		}

		public function do_login(){
			$this->login();
		}

		public function do_logout(){
			$this->logout();
		}

	}