<?php 

	class Coba extends MY_Controller{

		public function index(){

			echo '<pre>';
			print_r($this->cart->contents());

		}

		public function insert(){

			$data = array(
				'id' => 1,
				'name' => 'laptop',
				'qty' => 2,
				'price' => 5000000,
				'color' => array('color' => 'red')
			);

			$this->cart->insert($data);
			echo 'berhasi';
			
		}

		public function delete($rowid){

			$data = array(

				'rowid' => $rowid,
				'qty' => 0

			);

			$this->cart->update($data);
			echo 'berhasil dihapus';
			
		}

		public function update($rowid){ 

				$data = array(

					'rowid' => $rowid,
					'name' => 'jam tangan',
					'qty' => 5,
					'price' => 200000,
					'color' => array('color' => 'blue')

				);

			$this->cart->update($data);
			echo 'berhasil diupdate';
			
		}

	}