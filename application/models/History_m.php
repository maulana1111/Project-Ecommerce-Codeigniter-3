<?php

	class History_m extends CI_Model{

		public function get_history_order($order_code = null){
			if( ! isset($order_code)){
				return $this->db->get_where('history_order', array('member_id' => $this->session->userdata('member_id')))->result();
			}else{
				return $this->db->get_where('history_order', array('code' => $order_code))->row();
			}
		}

		public function get_history_order_detail($order_code){
			$this->db->select('hod.*, p.product_name, c.color_name');
			$this->db->from('history_order_detail hod');
			$this->db->join('product p', 'hod.product_id = p.id');
			$this->db->join('color c', 'hod.color = c.id');
			$this->db->where('order_code', $order_code);

			return $this->db->get()->result();
		}

		public function get_history_shipping($order_code){
			return $this->db->get_where('history_shipping', array('order_code' => $order_code))->result();
		}

		public function get_payment_bill(){
			return $this->db->get_where('history_order', array('member_id' => $this->session->userdata('member_id')))->result();

		}

	}