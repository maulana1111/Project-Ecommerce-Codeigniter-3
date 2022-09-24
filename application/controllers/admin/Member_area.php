<?php 

	class Member_area extends Backend_Controller{

		public function index(){
			$data['member'] = $this->member_m->get_member();

			$data['page'] = 'admin/pages/member_area';
			$this->load->view('admin/tamplate_admin', $data);
		}

	}