<?php 

	class Daftar_member extends Frontend_Controller{

		public function index(){

			$data['page'] = 'pages/daftar_member';
			

				$this->form_validation->set_rules('member_name','Nama lengkap','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('telp','Nomor telepon','required|numeric');
				$this->form_validation->set_rules('shipping_address','Shipping_address','required');
				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required|min_length[5]|matches[retype_password]');
				$this->form_validation->set_rules('retype_password','Retype password','required|min_length[5]|matches[password]');

				if($this->form_validation->run() == FALSE){
					$this->load->view('tamplate',$data );
				}else{
					$data_member = array(
						'member_name' => $this->input->post('member_name'),
						'email' => $this->input->post('email'),
						'telp' => $this->input->post('telp'),
						'shipping_address' => $this->input->post('shipping_address'),
						'username' => $this->input->post('username'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
					);

					$this->member_m->register($data_member);

					//login
					$member = $this->member_m->get_member_by_username($this->input->post('username'));
					$this->session->set_userdata( array(

						'member_id' => $member->id,
						'member_name' => $member->member_name,
						'member_email' => $member->email,
						'member_logged_in' => TRUE

						)
					);	

						$config = Array(  
						    'protocol' => 'smtp',  
						    'smtp_host' => 'ssl://smtp.googlemail.com',  
						    'smtp_port' => 465,  
						    'smtp_user' => 'lanamaulana001111@gmail.com',   
						    'smtp_pass' => 'maulana321',   
						    'mailtype' => 'html',   
						    'charset' => 'iso-8859-1'  
						   ); 

						$this->email->initialize($config);
						$this->email->set_newline("\r\n");  
						$this->email->from('lanamaulana001111@gmail.com');
						$this->email->to($this->input->post('email'));

						$this->email->subject('Pendaftaran');
						$this->email->message('Akun Sudah Terdaftar');
						if($this->email->send()){
							redirect('home');
						}else{
							 show_error($this->email->print_debugger());
						}
						
			}
			

		}

		// public function send_email(){

		// 	$id = $this->db->insert_id();


		// }

	}