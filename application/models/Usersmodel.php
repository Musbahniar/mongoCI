<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmodel extends CI_Model {

	function viewUsers() {
		return $this->mongo_db->get('users');
	}

	function insertusers () {
		$data =array (
			'username' => $this->input->post('username'),
			'phone' => $this->input->post('phone'),
			'unik' => $this->input->post('unik')
		);

		$this->mongo_db->insert('users', $data);
		return true;
	}

	function getUser ($id) {
		return $this->mongo_db->where(array('_id' => new mongoId($id)))->get('users');
	}

	function editProcess($id) {
		$data = array(
				'username' 	=> $this->input->post('username'), 
				'phone' 	=> $this->input->post('phone'),
				'unik'		=> $this->input->post('unik') 
			);		
		return $this->mongo_db->where(array('_id'=>new mongoId($id)))->set($data)->update('users');
	} 
}
