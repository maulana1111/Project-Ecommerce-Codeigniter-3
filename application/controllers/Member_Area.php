<?php 	

	use Dompdf\Dompdf;

	class Member_Area extends Frontend_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('member_logged_in') == FALSE){
				redirect('home');
			}
		}

		public function index(){

			$data['page'] = 'pages/member_area';
			$this->load->view('tamplate', $data);

		}

		public function my_profile(){
			$data['data_member'] = $this->member_m->get_by_session();
			$data['page'] = 'pages/my_profile';
			$this->load->view('tamplate', $data);
		}

		public function history_order(){

			$data['history_order'] = $this->history_m->get_history_order();
			$data['page'] = 'pages/history_order';
			$this->load->view('tamplate', $data);

		}

		public function history_order_detail($order_code){

			$data['history_order'] = $this->history_m->get_history_order($order_code);
			$data['history_order_detail'] = $this->history_m->get_history_order_detail($order_code);
			$data['history_shipping'] = $this->history_m->get_history_shipping($order_code);
			$data['page'] = 'pages/history_order_detail';
			$this->load->view('tamplate', $data);

		}

		public function payment_billing(){
			$data['payment_bill'] = $this->history_m->get_payment_bill();
			$data['page'] = 'pages/payment_bill';
			$this->load->view('tamplate', $data);
		}

		public function invoice($order_code){

			$data['history_order'] = $this->history_m->get_history_order($order_code);
			$data['history_order_detail'] = $this->history_m->get_history_order_detail($order_code);
			$data['history_shipping'] = $this->history_m->get_history_shipping($order_code);

			$dompdf = new Dompdf();
			$dompdf->loadHtml($this->load->view('pages/invoice', $data, TRUE));

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'landscape');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream();

		}

		public function payment_confirm($order_code){

			$data['order_code'] = $order_code;

			$this->form_validation->set_rules('order_code', 'Order Code', 'required|numeric');
			$this->form_validation->set_rules('no_account', 'No Account', 'required|numeric');
			$this->form_validation->set_rules('payment_date', 'Tanggal Transfer', 'required');

			

			if($this->form_validation->run() == FALSE){
			$data['page'] = 'pages/payment_confirm';
				$this->load->view('tamplate', $data);
			}else{

				// $_data = [
				// 	'order_code' => $this->input->post('order_code'),
				// 		'no_account' => $this->input->post('no_account'),
				// 		'paymen_date' => $date_db_format
				// ];
				// print_r($_data);die();
				$date = $this->input->post('payment_date');
				$date_explode = explode('/', $date);
				$date_db_format = $date_explode['2'].'-'.$date_explode['0'].'-'.$date_explode['1'];

				$query = $this->db->insert('payment_confirm', 
						array(
						'order_code' => $this->input->post('order_code'),
						'no_account' => $this->input->post('no_account'),
						'paymen_date' => $date_db_format
					)
				);
				if($query){
				redirect('member_area');	
					
				}
			}
			

		}

	}
