<?php 

class Product_m extends CI_Model{

	public function get_all_product($limit = null, $offset = null){
		if(! $limit && ! $offset){
			$this->db->order_by('id', 'decs');
			return $this->db->get('product')->result();
		}else{
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'decs');
			return $this->db->get('product')->result();
		}
	}

	public function get_product_color($product_id){
		$this->db->select('color.*');
		$this->db->from('color');
		$this->db->join('product_color', 'product_color.color_id = color.id');
		$this->db->where('product_color.product_id', $product_id);
		return $this->db->get()->result();
	}

	public function get_product_by_id($id){

		return $this->db->get_where('product', array('id' => $id))->row();

	}

	public function get_product_total(){
		return $this->db->get('product')->num_rows();
	}
	public function get_product_total_by_category($category_slug){
		$category = $this->db->get_where('category', array('slug' => $category_slug))->row();
		return $this->db->get_where('product', array('category_id' => $category->id))->num_rows();
	}

	public function get_products_by_category($category_slug ,$limit, $offset){
		$category = $this->db->get_where('category', array('slug' => $category_slug))->row();
		$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'decs');
		return $this->db->get_where('product', array('category_id' => $category->id ))->result();

	}
	public function get_product_by_keyword($keyword,$limit, $offset){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('product_name', $keyword);
		$this->db->or_like('slug', $keyword);
		$this->db->or_like('description', $keyword);
		$this->db->limit($limit, $offset);
		return $this->db->get()->result();
	}

	public function get_product_total_by_keyword($keyword){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('product_name', $keyword);
		$this->db->or_like('slug', $keyword);
		$this->db->or_like('description', $keyword);
		return $this->db->get()->num_rows();
	}

	
}