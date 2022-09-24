<?php 

	class Product extends Frontend_Controller{

		public function index(){

			$config['base_url'] = site_url('product/index');
			$config['total_rows'] = $this->product_m->get_product_total();
			$config['per_page'] = 6;

			$this->pagination->initialize($config);

			$offset = $this->uri->segment(3);
			$limit = 6;

			$data['pagination_link'] = $this->pagination->create_links();

			$data['products'] = $this->product_m->get_all_product($limit, $offset);
			$data['page'] = 'pages/products';

			$this->load->view('tamplate', $data);

		}

		public function category($category_slug){

			$config['base_url'] = site_url('product/category/'.$this->uri->segment(3).'/');
			$config['total_rows'] = $this->product_m->get_product_total_by_category($category_slug);
			$config['per_page'] = 6;

			$this->pagination->initialize($config);

			$offset = $this->uri->segment(3);
			$limit = 6;

			$data['pagination_link'] = $this->pagination->create_links();

			$data['products'] = $this->product_m->get_products_by_category($category_slug, $limit, $offset);
			$data['page'] = 'pages/category';

			$this->load->view('tamplate', $data);

		}

		public function search(){

			//$this->session->set_userdata('keyword', $this->input->post('keyword'))

			$keyword = $this->input->post('keyword');

			$config['base_url'] = site_url('product/search');
			$config['total_rows'] = $this->product_m->get_product_total_by_keyword($keyword);
			$config['per_page'] = 6;

			$this->pagination->initialize($config);

			$offset = $this->uri->segment(3);
			$limit = 6;

			$data['pagination_link'] = $this->pagination->create_links();

			$data['total_result'] = $this->product_m->get_product_total_by_keyword($keyword);
			$data['products'] = $this->product_m->get_product_by_keyword($keyword, $limit, $offset);
			$data['page'] = 'pages/search';
			$this->load->view('tamplate', $data);

		}

	}