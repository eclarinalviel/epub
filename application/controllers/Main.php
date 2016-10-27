<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('main');
        $this->load->view('footer');
    }

}
