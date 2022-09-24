<?php 

	class Color extends Backend_Controller{

		public function index(){

			$data['color'] = $this->admin_m->get_color();
			$data['page'] = 'admin/pages/blog/color';

			$this->form_validation->set_rules('color_name', 'Color Name', 'required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/tamplate_admin', $data);
			}else{

				 $this->admin_m->insert_color(
                    array(
                        'color_name' => $this->input->post('color_name')
                    )
                );
                $this->session->set_flashdata('success', 'Berhasil Ditambah');
                redirect('admin/blog/color'); 

			}

		}

		public function edit_color($id){

			$data['color'] = $this->admin_m->get_color();
			$data['data'] = $this->admin_m->get_detail_color($id);
			$data['page'] = 'admin/pages/blog/color_update';

			$this->form_validation->set_rules('color_name', 'Color Name', 'required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/tamplate_admin', $data);
			}else{

				 $this->admin_m->update_color(
                    array(
                        'color_name' => $this->input->post('color_name')
                    ),array(
                    	'id' => $this->input->post('post_id')
                    )
                );
                $this->session->set_flashdata('success', 'Berhasil di Update');
                redirect('admin/blog/color'); 

			}


		}

		public function delete_color($id){

            $this->admin_m->delete_color($id);
            $this->session->set_flashdata('success', 'Data Berhasil Didelete');
            redirect('admin/blog/color');

        }

	}