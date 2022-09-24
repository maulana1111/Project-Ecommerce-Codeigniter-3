<?php 

	class Home extends Frontend_Controller{

		public function index(){

			print_r(password_hash("12345", PASSWORD_DEFAULT));

			$config['base_url'] = site_url('home/index');
			$config['total_rows'] = $this->product_m->get_product_total();
			$config['per_page'] = 6;

			$this->pagination->initialize($config);

			$offset = $this->uri->segment(3);
			$limit = 6;

			$data['pagination_link'] = $this->pagination->create_links();

			$data['products'] = $this->product_m->get_all_product($limit,$offset);
			$data['page'] = 'pages/home';
			$this->load->view('tamplate', $data);
		}

		public function do_logout(){

			$this->logout();

		}
	}