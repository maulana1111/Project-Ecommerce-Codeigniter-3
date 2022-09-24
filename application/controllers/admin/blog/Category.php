<?php 

    class Category extends Backend_Controller{

        public function index(){

            $data['category_product'] = $this->admin_m->get_category();
            $data['page'] = 'admin/pages/blog/category';
            

            $this->form_validation->set_rules('category_name', 'Category_name', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/tamplate_admin', $data);
            }else{
                $category_name = $this->input->post('category_name');
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name);

                $this->admin_m->insert_category_name(
                    array(
                        'category_name' => $category_name,
                        'slug' => $slug
                    )
                );
                $this->session->set_flashdata('success', 'Berhasil Ditambah');
                redirect('admin/blog/category'); 

            }
        }

            public function edit_category($id){

                $data['category_product'] = $this->admin_m->get_category();
                $data['data'] = $this->admin_m->get_detail_category($id);
                $data['page'] = 'admin/pages/blog/category_update';

                $this->form_validation->set_rules('category_name', 'Category_name', 'required');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('admin/tamplate_admin', $data);
                }else{
                    $category_name = $this->input->post('category_name');
                    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name);
                    $this->admin_m->update_category(
                        array(
                            'category_name' => $category_name,
                            'slug' => $slug
                        ),
                        array(
                            'id' => $this->input->post('post_id')
                        )
                    );
                    $this->session->set_flashdata('success', 'Berhasil DiUpdate');
                    redirect('admin/blog/category'); 

            }
        }

            public function delete_category($id){
                
                $this->admin_m->delete_category($id);
                $this->session->set_flashdata('success', 'Berhasil DiDelete');
                redirect('admin/blog/category'); 

            }

    }