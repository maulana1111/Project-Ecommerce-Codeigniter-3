<?php 

	class Admin_m extends CI_Model{

		public function get_payment(){

			$this->db->select('payment_confirm.*, member.member_name, history_order.status');
			$this->db->from('payment_confirm');
			$this->db->join('history_order', 'payment_confirm.order_code = history_order.code');
			$this->db->join('member', 'history_order.member_id = member.id');
			return $this->db->get()->result();

		}

		public function edit_status_ho($dataupdate, $where){

			$this->db->update('history_order', $dataupdate, $where);

		}

		public function get_history_order(){

			$this->db->select('history_order.*, member.member_name');
			$this->db->from('history_order');
			$this->db->join('member', 'history_order.member_id = member.id');
			return $this->db->get()->result();

		}

		public function get_detail_hod($code){

			$this->db->select('history_order_detail.*, history_order.status, member.member_name, product.product_name, color.color_name');
			$this->db->from('history_order_detail');
			$this->db->where('order_code', $code);
			$this->db->join('history_order', 'history_order_detail.order_code = history_order.code');
			$this->db->join('product', 'history_order_detail.product_id = product.id');
			$this->db->join('color', 'history_order_detail.color = color.id');
			$this->db->join('member', 'history_order.member_id = member.id');
			return $this->db->get()->result();

		}

		public function get_detail_ho($code){

			return $this->db->get_where('history_order', array('code' => $code))->row();

		}

		public function get_category(){
			return $this->db->get('category')->result();
		}

		public function insert_category_name($datainsert){
			$this->db->insert('category', $datainsert);
		}

		public function get_detail_category($id){
			return $this->db->get_where('category', array('id'=> $id))->row();
		}

		public function update_category($datainsert, $where){
			$this->db->update('category', $datainsert, $where);
		}

		public function delete_category($id){
			$this->db->delete('category', array('id' => $id));
		}

		public function get_product(){

			$this->db->select('product.*, category.category_name');
			$this->db->from('product');
			$this->db->join('category', 'product.category_id = category.id');
			$this->db->order_by('id','desc');
			return $this->db->get()->result();

		}

		public function get_color_for_product(){
			$this->db->select('*');
			$this->db->from('color');
			$this->db->join('product_color', 'color.id = product_color.color_id');
			$this->db->join('product', 'product_color.product_id = product.id');
			return $this->db->get()->result();
		}

		public function get_color(){
			return $this->db->get('color')->result();
		}

		public function insert_product($datainsert){
			$this->db->insert('product', $datainsert);
		}

		public function insert_product_color($datainsert){
			$this->db->insert('product_color', $datainsert);
		}

		public function update_product_color($datainsert, $where){
			$this->db->update('product_color', $datainsert, $where);
		}

		public function get_id_product_color($id, $color_id){
			$this->db->select('*');
			$this->db->from('product_color');
			$this->db->where('product_id', $id);
			$this->db->where('color_id', $color_id);
			return $this->db->get()->row();

		}

		public function get_history_shipping($code){
			$this->db->select('history_shipping.*, history_order.status');
			$this->db->from('history_shipping');
			$this->db->where('order_code', $code);
			$this->db->join('history_order', 'history_shipping.order_code = history_order.code');
			return $this->db->get()->row();
		}

		public function get_product_color($id){

			$this->db->select('*');
			$this->db->from('color');
			$this->db->where('product_color.product_id', $id);
			$this->db->join('product_color', 'color.id = product_color.color_id');
			return $this->db->get()->result();

		}

		public function delete_product_color($id){
			$this->db->delete('product_color', array('id' => $id));
		}

		public function get_detail_product_and_category($id){

			$this->db->select('product.*, category.category_name');
			$this->db->from('product');
			$this->db->where('product.id', $id);
			$this->db->join('category', 'product.category_id = category.id');
			return $this->db->get()->row();

		}

		public function get_sum_ho($code){
			return $this->db->query("SELECT SUM(total_cost) FROM history_order WHERE code = '$code'")->row();
		}

		public function get_sum_hs($code){
			return $this->db->query("SELECT SUM(cost) FROM history_shipping WHERE order_code = '$code'")->row();
			// $this->db->select_sum('total_cost');
			// $this->db->from('history_order');
			// $this->db->where('code', $code);
			// return $this->db->get()->row();
		}

		// public function get_detail_product($id, $color_id){

		// 	$this->db->select('product.*, color.color_name, category.category_name');
		// 	$this->db->from('product');
		// 	$this->db->where('product.id', $id);
		// 	$this->db->join('product_color', 'product_color.product_id = product.id');
		// 	$this->db->join('color', 'product_color.color_id = color.id');
		// 	$this->db->where('product_color.color_id', $color_id);
		// 	$this->db->join('category', 'product.category_id = category.id');
		// 	return $this->db->get()->row();

		// }

		public function get_detail_product($id){
			return $this->db->get_where('product', array('id' => $id))->row();
		}

		// public function get_num_rows_category(){
		// 	return $this->db->get('category')->num_rows();
		// }

		public function update_product($dataupdate, $where, $id_gambar){
			unlink("uploads/products/large/".$id_gambar);
			unlink("uploads/products/small/".$id_gambar);
			$this->db->update('product', $dataupdate, $where);
		}

		public function delete_product($id, $id_gambar){
			unlink("uploads/products/large/".$id_gambar);
			unlink("uploads/products/small/".$id_gambar);
			$this->db->delete('product', array('id' => $id));
		}

		public function delete_product_color_by_product_id($id){
			$this->db->delete('product_color', array('product_id' => $id));
		}

		public function get_detail_color($id){
			return $this->db->get_where('color', array('id' => $id))->row();
		}

		public function insert_color($datainsert){
			$this->db->insert('color', $datainsert);
		}

		public function update_color($dataupdate, $where){
			$this->db->update('color', $dataupdate, $where);
		}

		public function delete_color($id){
			$this->db->delete('color', array('id' => $id));
		}

		public function get_admin(){
			return $this->db->get('admin')->result();
		}

		public function insert_admin($datainsert){
			$this->db->insert('admin', $datainsert);
		}
		
		public function get_admin_by_id($id){
			return $this->db->get_where('admin', array('id' => $id))->row();
		}

		public function get_admin_by_username($username){
			return $this->db->get_where('admin', array('username' => $username))->row();
		}

		public function edit_admin($dataupdate, $where){
			$this->db->update('admin', $dataupdate, $where);
		}

		public function delete_admin($id){
			$this->db->delete('admin', array('id' => $id));
		}
	}