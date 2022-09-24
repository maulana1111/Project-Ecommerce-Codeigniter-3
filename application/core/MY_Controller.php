<?php 

	class MY_Controller extends CI_Controller{
		public function __construct(){
			parent::__construct();

			//load database
			$this->load->database();
			//load library
			$this->load->library(array('cart', 'form_validation', 'pagination', 'session','cart','upload', 'image_lib', 'email'));
			//load helper
			$this->load->helper(array('url', 'text', 'form', 'string'));
			//load model
			$this->load->model(array('product_m','category_m', 'member_m', 'history_m', 'admin_m'));
		}
	}

	class Frontend_Controller extends MY_Controller{

		private $api_key = '44908468b9ea0d3f1d05ab16c08884b1';

		public function __construct(){
			parent::__construct();
			$data['province'] = $this->get_province();
			$this->load->view('pages/cekout_ongkir_form',$data, TRUE);
			$data['categories'] = $this->category_m->get_all_category();
			$this->load->view('components/sidebar_category',$data , TRUE);
			//echo 'total weight '.$this->get_total_weight();



			if(isset($_POST['login_submit'])){

				$this->login();

				//redirect(base64_encode($this->input->post('current_url')));

				print_r(base64_decode($this->input->post('current_url')));

			}

		}

		public function login(){
			if($_POST){
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$member = $this->member_m->get_member_by_username($username);

				if(password_verify($password, $member->password)){
					$this->session->set_userdata(array(

						'member_id' => $member->id,
						'member_name' => $member->member_name,
						'member_logged_in' => TRUE

					));


				}else{
					die('login failed');
				}
			}
		}

		public function logout(){

			$this->session->unset_userdata(array(

						'member_id',
						'member_name',
						'member_logged_in'

					));

			redirect('home');

		}

		public function get_province(){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/province/",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: $this->api_key"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return json_decode($response);
			}

		}

		public function get_city($province_id){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: $this->api_key"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return json_decode($response);
			}

		}

		public function get_cost($origin, $destination, $weight, $courier){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: $this->api_key"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return json_decode($response);
			}

		}

		public function get_total_weight(){

			$items = $this->cart->contents();
			$weight = 0;

			foreach($items as $item){
				$weight = $weight + $item['options']['weight'];
			}

			return $weight;

		}


	}

	class Backend_Controller extends MY_Controller{
		public function __construct(){
			parent::__construct();
		}

		public function payment_confirm($order_code){

			$this->admin_m->edit_status_ho(
				array(
					'status' => 2
				), array(
					'code' => $order_code
				)
			);
			$this->session->set_flashdata('success','Berhasil Konfirmasi');
			redirect('admin/home_admin');

		}

		public function login(){

			if($_POST){

				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$admin = $this->admin_m->get_admin_by_username($username);

				if(password_verify($password, $admin->password)){
					$this->session->set_userdata(array(

						'admin_id' => $admin->id,
						'admin_name' => $admin->username,
						'admin_logged_in' => TRUE

					));

					redirect('admin/home');
				}else{
					die('login failed');
				}

			}

		}

		public function logout(){

			$this->session->unset_userdata(array(
				'admin_id',
				'admin_name', 
				'admin_logged_in'
			));

			redirect('home');

		}

		// public function konfirmasi_ho($id){
		// 		$confirm = $this->input->post('action');

		// 		$this->admin_m->edit_status_ho(

		// 			array(

		// 				'status' => $confirm

		// 			), array(

		// 				'id' => $id

		// 			)

		// 		);
		// 		$this->session->set_flashdata('success', 'Status Telah Dirubah');
		// 		redirect('admin/history_order');
		// 	}

	}