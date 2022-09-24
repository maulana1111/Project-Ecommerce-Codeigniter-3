<?php 

	class Checkout extends Frontend_Controller {

		public function __construct(){
			parent::__construct();


			// echo "<pre>";
			// print_r($this->session->userdata());
			// echo "</pre>";
			//print_r($this->get_province());
		}

		public function index(){

			$data['shipping_cost'] = $this->session->userdata('shipping_cost');
			$data['data_member'] = $this->member_m->get_member_by_id($this->session->userdata('member_id'));
			$data['items'] = $this->cart->contents();
			$data['page'] = 'pages/checkout';
			$this->load->view('tamplate', $data);

		}

		public function get_city_by_province($province_id = NULL){

			if($province_id){
				//dapatkan kota
				$city = $this->get_city($province_id);
				//render html
				$output = '<option value="">Pilih Kota</option>';

				foreach($city->rajaongkir->results as $cty){
					$output .= '<option value="'.$cty->city_id.'">'.$cty->city_name.'</option>';
				}

			}else{

				$output = '<option value="">Pilih Kota</option>';

			}

			echo $output;

		}

		public function check_shipping_cost(){

			if(isset($_POST['cek_ongkir_submit'])){

				$origin = $this->input->post('origin_city');
				$destination = $this->input->post('destination_city'); 
				$weight = $this->get_total_weight();
				$courier = $this->input->post('courier');
				$shipping_cost = $this->get_cost($origin, $destination, $weight, $courier);

				$this->session->set_userdata(array(
					'shipping_origin' => $origin,
					'shipping_destination' => $destination,
					'shipping_weight' => $weight,
					'shipping_courier' => $courier,
					'shipping_cost' => $shipping_cost,
					'shipping_checked_cost' => TRUE
				));

				redirect('checkout');

			}else{

				redirect('home');

			}

		}

		public function order_submit(){

			//handle jika shooping cart kosong

			if( ! $this->cart->contents()){
				redirect('shooping-cart');
			}

			//jika shipping cost belum dipilih

			if( ! $this->session->userdata('shipping_checked_cost')){
				$this->session->set_flashdata('failed', '<div class="alert alert-danger">Silahkan pilih ongkos kirim</div>');
				redirect('checkout');
			}else{
				//handle jika shipping cost (layanan) tidak tersedia
				$shipping_cost = $this->session->userdata('shipping_cost');
					foreach($shipping_cost->rajaongkir->results as $result){
						if(count($result->costs) == 0){
							$this->session->set_flashdata('failed', '<div class="alert alert-danger">Maaf layanan tidak tersedia, silahkan pilih yang lain</div>');
							redirect('checkout');
						}
					}
			}			//history order 

			$data_histroy_order = array(

				//'code' => ,
				'member_id' => $this->session->userdata('member_id'),
				'total_qty' => $this->cart->total_items(),
				'total_cost' => $this->cart->total()

			);

			$this->db->insert('history_order', $data_histroy_order);

			//insert_id() berfungsi untuk mendapatkan id yang baru saja dimasukan
			$insert_id = $this->db->insert_id();

			//random_string() = adalah helper
			$code = $insert_id + random_string('numeric', 7);

			$data_histroy_order_update = array(

				'code' => $code

			);

			$this->db->update('history_order', $data_histroy_order_update, array('id' => $insert_id));

			//history order detail

			foreach($this->cart->contents() as $items){

				$data_histroy_order_detail = array(

					'order_code' => $code, 
					'product_id' => $items['id'], 
					'qty' => $items['qty'],
					'color' => $items['options']['color'],
					'subtotal' => $items['subtotal']

				);

				$this->db->insert('history_order_detail', $data_histroy_order_detail);

			}

			//history shipping

			$checked_number = $this->input->post('checked_number');

			$data_history_shipping = array(

				'order_code' => $code,
				'courier_name' => $this->input->post('courier_name'),
				'courier_code' => $this->input->post('courier_code'),
				'origin' => $this->input->post('origin'),
				'destination' => $this->input->post('destination'),
				'weight' => $this->input->post('weight'),
				'service' => $this->input->post('service'.$checked_number),
				'description' => $this->input->post('description'.$checked_number),
				'cost' => $this->input->post('cost'.$checked_number),
				'etd' =>$this->input->post('etd'.$checked_number) 

			);

			$this->db->insert('history_shipping', $data_history_shipping);

			redirect('order_success');


		}

	}