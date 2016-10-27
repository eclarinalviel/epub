<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class School_admin extends CI_Controller {

    public $grade_level;

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);

        $this->grade_level = $this->uri->segment(3);
    }

    public function index() {
        if (!logged_in()) {
            redirect('auth/signin', 'refresh');
        } else {
            $this->dashboard();
        }
    }

    public function dashboard() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Dashboard',
                'users' => $this->Admin_model->_get_users_by_school( user('sc_id') ),
                'epubs' => $this->Admin_model->_get_epubs_by_school( user('sc_id') )
            );

            $this->load->view('header', $obj);
            $this->load->view('school_admin/dashboard');
            $this->load->view('footer');
            
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function users() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Users',
                'grade_levels' => $this->Admin_model->_get_all_grade_levels()
                // 'students_per_level' => $this->Admin_model->_get_students_per_grade_level()
            );

            $this->load->view('header', $obj);
            $this->load->view('school_admin/users');
            $this->load->view('footer');
            
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function epubs() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'ePUBs',
                'books' => $this->Admin_model->_get_epubs_by_school(user('sc_id'))
            );

            $this->load->view('header', $obj);
            $this->load->view('school_admin/epubs');
            $this->load->view('footer');
            
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function code() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Generate Codes',
                'grade_levels' => $this->Admin_model->_get_all_grade_levels()
            );

            $this->load->view('header', $obj);
            $this->load->view('school_admin/code');
            $this->load->view('footer');
            
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function users_per_level() {
         if (logged_in()) {    

            $obj = array(
                'page_title' => 'List of Users',
                'users_per_level' => $this->Admin_model->_get_students_per_grade_level( $this->grade_level )
            );
            $this->load->view('header', $obj);
            $this->load->view('school_admin/user_details');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function generate_code() {
        if (logged_in()) {    
            $grade_level =  $this->input->post('grade_level');
            $school_id = user('sc_id');
            $code = $this->input->post('gl_code');

            // check for duplicate entries
            $gl_code_id = $this->Admin_model->_check_existing_code( $grade_level, $school_id );

            if ( isset($gl_code_id) ) {
                //delete the existing
                $this->Admin_model->_delete_existing_code( $gl_code_id->id );

                //add new
                $this->add_grade_level_code( $school_id, $grade_level, $code );
            } else {
                //add new
                $this->add_grade_level_code( $school_id, $grade_level, $code );
            }
           

            $obj = array(
                'page_title' => 'List of Users',
                'users_per_level' => $this->Admin_model->_get_students_per_grade_level( $this->grade_level )
            );
            $this->load->view('header', $obj);
            $this->load->view('school_admin/code');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function add_grade_level_code( $school_id, $grade_level, $code ) {
        
        $data = array(
            'school_id' => $school_id,
            'grade_level' => $grade_level,
            'code' => $code
        );
        $this->Admin_model->_generate_gl_code($data);
    }

    public function remove_user() {

        $user_id = $this->input->post('user_id');
        $this->Admin_model->_terminate_user($user_id);

        $obj = array(
            'page_title' => 'List of Users',
            'users_per_level' => $this->Admin_model->_get_students_per_grade_level( $this->input->post('grade_level_id') )
        );
        $this->load->view('header', $obj);
        $this->load->view('school_admin/user_details');
        $this->load->view('footer');

    }

}