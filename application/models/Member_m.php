<?php 

	class Member_m extends CI_Model{

		public function get_member(){
			return $this->db->get('member')->result();
		}

		public function get_member_by_username($username){

			return $this->db->get_where('member', array('username' => $username))->row();

		}

		public function get_member_by_id($id){
			return $this->db->get_where('member', array('id' => $id))->row();
		}

		public function register($datainsert){

			$this->db->insert('member', $datainsert);

		}

		public function get_by_session(){
			return $this->db->get_where('member', array('id' => $this->session->userdata('member_id')))->row();
		}

	}