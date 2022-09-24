<?php 

	class Home extends Backend_Controller{

		public function index(){
			$data['payment_confirm'] = $this->admin_m->get_payment();
			$data['data'] = $this->session->userdata();
			$data['page'] = 'admin/pages/home';
			$this->load->view('admin/tamplate_admin', $data);
		}

		public function edit_status($order_code){
			$this->payment_confirm($order_code);
		}
		
	}