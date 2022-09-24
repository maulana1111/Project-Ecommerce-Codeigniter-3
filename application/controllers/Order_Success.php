<?php 

	class Order_Success extends Frontend_Controller{

		public function index(){
			$data['page'] = 'pages/order_success';
			$this->load->view('tamplate', $data);
		}

	}