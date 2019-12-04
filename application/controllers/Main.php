<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Usersmodel');
  }

  public function index() {
    $data = array(
      'user' => $this->Usersmodel->viewUsers(),
    );

    $this->load->view('home', $data);
  }

  public function insertUser() {
    $this->load->view('adduser');
  }

  public function insertProcess () {
    $this->Usersmodel->insertusers();
    $this->session->set_flashdata('notif','successfully insert new data');
    redirect('Main','refresh');
  }

  public function deleteUser($id) {  
      $this->mongo_db->where(array('_id' => new mongoId($id)))->delete('users');
      redirect('Main','refresh');
  }



}