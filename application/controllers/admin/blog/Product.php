<?php

    class Product extends Backend_Controller{

        public function index(){

            $data1['color'] = $this->admin_m->get_color();
            $data1['category'] = $this->admin_m->get_category();
            $data1['product'] = $this->admin_m->get_product();
            $data1['product_color'] = $this->admin_m->get_color_for_product();
            $data1['page'] = 'admin/pages/blog/product';

            $this->form_validation->set_rules('category_id', 'Category_id', 'required');
            $this->form_validation->set_rules('product_name', 'Product_name', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('description', 'Description', 'required');
           // $this->form_validation->set_rules('file', 'File', 'required');
            $this->form_validation->set_rules('berat', 'Berat', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/tamplate_admin', $data1);
                echo validation_errors();
            }else{
               //upload gambar
				$config['upload_path']          = './uploads/products/large/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['overwrite']            = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/products/large/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 300;
                    $config['height'] = 300;
                    $config['new_image'] = './uploads/products/small/'.$gbr['file_name'];

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                

                    $product_name = $this->input->post('product_name');
                    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name);

                    //upload database
                    $this->admin_m->insert_product(array(
                            'category_id' => $_POST['category_id'],
                            'product_name' => $_POST['product_name'],
                            'slug' => $slug,
                            'price' => $_POST['harga'],
                            'description' => $_POST['description'],
                            'thumbnail' => $gbr['file_name'],
                            'weight' => $_POST['berat'],
                            'datetime' => date('Y-m-d H:i:s')
                        )
                    );
                    $id = $this->db->insert_id();

                    foreach($_POST['check_list'] as $row){
                        $this->admin_m->insert_product_color(
                            array(
                                'product_id' => $id,
                                'color_id' => $row
                            )
                        );
                    }
                    
                    $this->session->set_flashdata('success', 'Data Berhasil di Masukan');
                    redirect('admin/blog/product');    

                }

            }

        }

        public function update_product(){

            $id = $this->uri->segment(5);
            //$data['num_category'] = $this->admin_m->get_num_rows_category();
            $data['color'] = $this->admin_m->get_color();
            $data['category'] = $this->admin_m->get_category();
            $data['product'] = $this->admin_m->get_product();
            $data['data'] = $this->admin_m->get_detail_product($id);
            $data['page'] = 'admin/pages/blog/product_update';

            $this->form_validation->set_rules('category_id', 'Category_id', 'required');
            $this->form_validation->set_rules('product_name', 'Product_name', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('berat', 'Berat', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/tamplate_admin', $data);
                echo validation_errors();
            }else{

                if($_FILES['foto']['error'] == 0){

                    //upload gambar
                    $config['upload_path']          = './uploads/products/large/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['overwrite']            = TRUE;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './uploads/products/large/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 300;
                        $config['height'] = 300;
                        $config['new_image'] = './uploads/products/small/'.$gbr['file_name'];

                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                    $product_name = $this->input->post('product_name');
                    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name);

                    $data_product = $this->admin_m->get_detail_product($id);
                    $id_gambar = $data_product->thumbnail;

                    $this->admin_m->update_product(
                        array(
                            'category_id' => $_POST['category_id'],
                            'product_name' => $_POST['product_name'],
                            'slug' => $slug,
                            'price' => $_POST['harga'],
                            'description' => $_POST['description'],
                            'thumbnail' => $gbr['file_name'],
                            'weight' => $_POST['berat'],
                            'datetime' => date('Y-m-d H:i:s')
                        ),array(
                            'id' => $this->input->post('post_id')
                        ), $id_gambar
                    );

                    $this->admin_m->delete_product_color_by_product_id($id);

                    foreach($_POST['check_list'] as $data){
                        $this->admin_m->insert_product_color(
                            array(
                                'product_id' => $this->input->post('post_id'),
                                'color_id' => $data
                            )
                        );
                    }
                     $this->session->set_flashdata('success', 'Data Berhasil di Update');
                     redirect('admin/blog/product');

                 }

                }else{

                    $product_name = $this->input->post('product_name');
                    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name);

                    $this->admin_m->update_product(
                        array(
                            'category_id' => $_POST['category_id'],
                            'product_name' => $_POST['product_name'],
                            'slug' => $slug,
                            'price' => $_POST['harga'],
                            'description' => $_POST['description'],
                            'weight' => $_POST['berat'],
                            'datetime' => date('Y-m-d H:i:s')
                        ),array(
                            'id' => $this->input->post('post_id')
                        )
                    );

                     $this->admin_m->delete_product_color_by_product_id($id);

                    foreach($_POST['check_list'] as $data){
                        $this->admin_m->insert_product_color(
                            array(
                                'product_id' => $this->input->post('post_id'),
                                'color_id' => $data
                            )
                        );
                    }

                    $this->session->set_flashdata('success', 'Data Berhasil di Update Tanpa Gambar');
                    redirect('admin/blog/product');

                }

            }

        }

        public function delete_product($id){

            $data = $this->admin_m->get_detail_product($id);
            $id_gambar = $data->thumbnail;
            $this->admin_m->delete_product($id, $id_gambar);
            $this->admin_m->delete_product_color_by_product_id($id);
            $this->session->set_flashdata('success', 'Data Berhasil Didelete');
            redirect('admin/blog/product');

        }

        public function product_color($id){

            $data['color'] = $this->admin_m->get_color();
            $data['data1'] = $this->admin_m->get_detail_product_and_category($id);
            $data['data2'] = $this->admin_m->get_product_color($id);
            $data['page'] = 'admin/pages/blog/product_color';
            $this->load->view('admin/tamplate_admin', $data);

        }

        public function insert_product_color(){

            foreach($_POST['check_list'] as $row){
                    $this->admin_m->insert_product_color(
                        array(
                            'product_id' => $this->input->post('product_id'),
                            'color_id' => $row
                        )
                    );
            }
            $this->session->set_flashdata('success', 'Data Berhasil Didelete');
            redirect('admin/blog/product');

        }

        public function update_product_color(){

            $id = $this->uri->segment(5);
            $id_product = $this->uri->segment(6);
            $id_color = $this->uri->segment(7);

            $data['id_color'] = $id_color;
            $data['color'] = $this->admin_m->get_color();
            $data['data1'] = $this->admin_m->get_detail_product_and_category($id);
            $data['data2'] = $this->admin_m->get_product_color($id);
            $data['page'] = 'admin/pages/blog/product_color_update';

            $this->form_validation->set_rules('color', 'Color', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/tamplate_admin', $data);
            }else{

                $this->admin_m->update_product_color(
                    array(
                        'product_id' => $this->input->post('product_id'),
                        'color_id' => $_POST['color']
                    ),array(
                        'id' => $id_product
                    )
                );

                $this->session->set_flashdata('success' ,'Color Berhasil Di Update');
                redirect('admin/blog/product');

            }

        }

        public function delete_product_color(){

            $id = $this->uri->segment(6);
            $this->admin_m->delete_product_color($id);
            $this->session->set_flashdata('success', 'Data Berhasil Didelete');
            redirect('admin/blog/product');

        }

    }