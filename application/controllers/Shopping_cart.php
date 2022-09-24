<?php 


	class Shopping_Cart extends Frontend_Controller{

		public function index(){
			
			$data['page'] = 'pages/shopping_cart';
			//$data['page'] = 'pages/checkout_ringkasan';
			$data['items'] = $this->cart->contents();
			$this->load->view('tamplate', $data);

		}

		public function add(){

			$qty = $this->input->post('qty');
			$id = $this->input->post('id');	
			$color = $this->input->post('color');

			$product = $this->product_m->get_product_by_id($id);

			$data = array(

				'id' => $id,
				'name' => $product->product_name,
				'price' => $product->price,
				'qty' => $qty,
				'options' => array('color' => $color, 'weight' => ($product->weight * $qty))

			); 

			$this->cart->insert($data);

			//update shipping cost
				if($this->session->userdata('shipping_checked_cost')){

					$origin = $this->session->userdata('shipping_origin');
					$destination = $this->session->userdata('shipping_destination');
					$weight = $this->get_total_weight();
					$courier = $this->session->userdata('shipping_courier');
					$shipping_cost = $this->get_cost($origin, $destination, $weight, $courier);

					$this->session->set_userdata(array(
						'shipping_weight' => $weight,
						'shipping_cost' => $shipping_cost
					));

				}


			redirect('home');

		}

		public function delete($rowid){

			$data = array(

				'rowid' => $rowid,
				'qty' => 0

			);

			$this->cart->update($data);

			$this->session->set_flashdata('success', 'data berhasil dihapus');
			redirect('shopping_cart');

		}

		public function update(){
			
			$qty = $this->input->post('qty');
			$rowid = $this->input->post('rowid');	
			$color = $this->input->post('color');
			$id = $this->input->post('id');

			// print_r($qty);
			// print_r($rowid);
			// print_r($color); die();
			for( $i = 0; $i <= count($this->cart->contents()); $i++){
					$weight = $this->db->get_where('product', array('id' => $id[$i]))->row('weight');
					$data = array(
						'rowid' => $rowid[$i],
						'qty' => $qty[$i],
						'options' => array('color' => $color[$i] , 'weight' => $weight * $qty[$i])
				); 
					//print_r($data);die();
				$this->cart->update($data);

			}

			//update shipping cost
				if($this->session->userdata('shipping_checked_cost')){

					$origin = $this->session->userdata('shipping_origin');
					$destination = $this->session->userdata('shipping_destination');
					$weight = $this->get_total_weight();
					$courier = $this->session->userdata('shipping_courier');
					$shipping_cost = $this->get_cost($origin, $destination, $weight, $courier);

					$this->session->set_userdata(array(
						'shipping_weight' => $weight,
						'shipping_cost' => $shipping_cost
					));

				}

			$this->session->set_flashdata('success', 'keranjang berhasil diupdate');
			redirect('shopping-cart');

		}

	}