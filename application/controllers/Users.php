<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
    }

	public function index() {

		if (!logged_in()) {
            redirect('auth/signin', 'refresh');
        } else {

        	$this->_user();


        }
	}

	public function _user() {
		$obj = array(
        	'page_title' => 'Guest'
    	);

        $this->load->view('header', $obj);
        $this->load->view('admin/user_details');
        $this->load->view('footer');
}


}