<?php 

	class History_order extends Backend_Controller{

		public function index(){

			$data['history_order'] = $this->admin_m->get_history_order();
			$data['page'] = 'admin/pages/history_order';
			$this->load->view('admin/tamplate_admin', $data);

		}

		public function edit_hod($code){
				
				$data['hod'] = $this->admin_m->get_detail_hod($code);
				$data['ho'] = $this->admin_m->get_detail_ho($code);
				$data['sum_ho'] = $this->db->query("SELECT SUM(total_cost) as totals FROM history_order WHERE code = '$code'")->row();
				$data['sum_hs'] = $this->db->query("SELECT SUM(cost) as total FROM history_shipping WHERE order_code = '$code'")->row();
				$data['history_shipping'] = $this->admin_m->get_history_shipping($code);
				$data['page'] = 'admin/pages/history_order_detail';

				$this->form_validation->set_rules('action', 'Action', 'required');

				if($this->form_validation->run() == FALSE){
					$this->load->view('admin/tamplate_admin', $data);
				}else{
					$this->admin_m->edit_status_ho(
						array(
							'status' => $_POST['action']
						), array(
							'code' => $code
						)
					);
					//$this->session->set_flashdata('success', 'Status Telah Dirubah');
					redirect('admin/history_order');
				}
			}

		public function edit_status_history_order(){

			$this->admin_m->edit_status_ho(
				array(
					'status' => 3
				), array(
					'code' => $this->input->post('history_order_id')
				)
			);
			$this->session->set_flashdata('success','Berhasil Konfirmasi');
			redirect('admin/home_admin');

		}
		
	}