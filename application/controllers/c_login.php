<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
    function index() {
        $this->load->view('v_login');
    }
}
/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */