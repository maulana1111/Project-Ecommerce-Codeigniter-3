<?php 

	class Category_m extends CI_Model{

		public function get_all_category(){

			return $this->db->get('category')->result();

		}

	}