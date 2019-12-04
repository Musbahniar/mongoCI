<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function display($view, $data = null) {
        $data['_content'] = $this->ci->load->view($view, $data, TRUE);
        $this->ci->load->view('master', $data, FALSE);
    }

}
