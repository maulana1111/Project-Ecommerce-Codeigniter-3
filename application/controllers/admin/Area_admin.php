<?php 

	class Area_admin extends Backend_Controller{

		public function index(){
			$data['data'] = $this->admin_m->get_admin();
			$data['page'] = 'admin/pages/area_admin';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|matches[retype_password]');
			$this->form_validation->set_rules('retype_password','Retype password','required|min_length[5]|matches[password]');

			if($this->input->post('password') != $this->input->post('retype_password')){
				$this->session->set_flashdata('failed', 'Password Tidak Sama');
			}

			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/tamplate_admin', $data);
			}else{

				$this->admin_m->insert_admin(
					array(
						'username' => $this->input->post('username'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
					)
				);
				$this->session->set_flashdata('success', 'Data Berhasil Di Masukan');
				redirect('admin/area_admin');

			}
		}

		public function edit_admin($id){

			$data['data_admin'] = $this->admin_m->get_admin_by_id($id);
			$data['data'] = $this->admin_m->get_admin();
			$data['page'] = 'admin/pages/area_admin_edit';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|matches[retype_password]');
			$this->form_validation->set_rules('retype_password','Retype password','required|min_length[5]|matches[password]');

			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/tamplate_admin', $data);
			}else{

				$this->admin_m->edit_admin(
					array(
						'username' => $this->input->post('username'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
					),array(
						'id' => $id
					)
				);
				$this->session->set_flashdata('success', 'Data Berhasil Di Ubah');
				redirect('admin/area_admin');

			}

		}

		public function delete_admin($id){
			$this->admin_m->delete_admin($id);
			$this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
			redirect('admin/area_admin');
		}

	}