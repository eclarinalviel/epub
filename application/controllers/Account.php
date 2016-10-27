<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends CI_Controller {

    public $user_id = '';
    public $role_id = '';

    public function __construct() {
        parent::__construct();
        $this->role_id = user('role');
        $this->user_id = user('id');
    }

    public function index() {
        if (!logged_in()) {
            redirect('auth/signin', 'refresh');
        } else {
            switch ($this->role_id) {
                case 1:
                    $this->_admin();
                    break;
                case 2:
                    $this->_teacher();
                    break;
                case 3:
                    $this->_student();
                    break;
                case 4:
                    $this->_school_admin();
                    break;
            }
        }
    }

    public function _admin() {
        redirect('admin/dashboard', 'refresh');
    }

    public function _teacher() {
        $obj = array(
            'page_title' => 'Manage Account',
            'user_data' => $this->manage()
        );
        $this->load->view('header', $obj);
        $this->load->view('account/manage');
        $this->load->view('footer');
    }

    public function _student() {
        $obj = array(
            'page_title' => 'Manage Account',
            'user_data' => $this->manage()
        );
        $this->load->view('header', $obj);
        $this->load->view('account/manage');
        $this->load->view('footer');
    }

    public function _school_admin() {
        $obj = array(
            'page_title' => 'Manage Account',
            'user_data' => $this->manage()
        );
        $this->load->view('header', $obj);
        $this->load->view('account/manage');
        $this->load->view('footer');
    }

    public function manage() {
        $obj = $this->Admin_model->_get_user_details($this->user_id);
        return $obj;
    }

    public function school_profile() {
        $obj = array(
            'page_title' => 'Edit School Profile',
            'school_data' => $this->Admin_model->_get_school_details(user('sc_id'))
            // 'user_data' => $this->Admin_model->_get_user_details(user('id'))
        );
        $this->load->view('header', $obj);
        $this->load->view('account/school_profile');
        $this->load->view('footer');
    }

    public function update() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|regex_match[/^[a-zA-Z\s]+$/]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|regex_match[/^[a-zA-Z\s]+$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        if ($this->form_validation->run()) {
            if (logged_in()) {
                $this->account_model->_update_user_data($this->user_id);
                redirect('account/manage', 'refresh');
            } else {
                redirect('auth/signin', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function update_school() {
            if (logged_in()) {
                $password = $this->input->post('password');
                if ( isset($password) && !empty($password) ) {
                     $this->Account_model->_update_password($this->user_id, md5($password));
                }

                $data = array(
                    'name' => $this->input->post('school_name'),
                    'city_municipality' => $this->input->post('city_municipality'),
                    'region' => $this->input->post('region'),
                    'email' => filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL)
                );

                $this->Account_model->_update_school_data($data, user('sc_id'));
                redirect('account/school_profile', 'refresh');

            } else {
                redirect('auth/signin', 'refresh');
            }
        
    }


    public function register(){
        $email =  $this->input->post('email');
        $password = md5($this->input->post('password'));
        $grade_level = $this->Admin_model->validate_grade_level_code( $this->input->post('school_code') );
        
        if ( isset($grade_level) ) {
            $user_id = $this->authme_model->create_user($email, $password, $grade_level->id, $grade_level->school_id);
            $data = array(
                'user_id' => $user_id,
                'fname' => $this->input->post('firstname'),
                'lname' => $this->input->post('lastname')
            );
            $this->Account_model->_create_user_data($data);
        }

        redirect('auth/signin', 'refresh');
    }

    

}

/* End of file accounts.php */
/* Location: ./et_application/controllers/account.php */