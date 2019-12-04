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

  public function edituser () {
    $id = $this->uri->segment(3);
    $data = array (
      'user' => $this->Usersmodel->getUser($id),
    );

    $this->load->view('edituser', $data);

  }

  public function editUserProcess ($id) {
    $statusProses = $this->Usersmodel->editProcess($id);
    if ($statusProses) {
      $this->session->set_flashdata('notif', 'Successfully Edited');
      redirect('Main','refresh');
    } else {
       $this->session->set_flashdata('notif', 'Error Edited');
      redirect('Main','refresh');
    }
  }


}