<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller
{

    public $user_id = '';
    public $role_id = '';
    public $section_id = '';
    public $school_id = '';

    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        $this->user_id = user('id');
        $this->role_id = user('role');
        $this->school_id = user('sc_id');
    }

    public function index()
    {
        if (!logged_in()) {
            redirect('auth/signin', 'refresh');
        } else {
            switch ($this->role_id) {
                case 1:
                    $this->_admin();
                    break;
                case 2:
                    $this->_coordinator();
                    break;
                case 3:
                    $this->_guest();
                    break;   
            }
        }
    }

    public function _admin()
    {
        redirect('admin/dashboard', 'refresh');
    }

    public function _coordinator()
    {
        $obj = array(
            'page_title' => 'Teacher&#39s Dashboard',
            'courses' => $this->courses_model->_get_courses_by_user($this->user_id),
            'posts' => $this->posts_model->_get_posts_by_user($this->user_id, $this->school_id),
            'leaderboard' => $this->leaderboard_model->_get_leaderboard_score(),
            //'button' => $this->active_button()
        );

        $this->load->view('header', $obj);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
    
    public function _guest()
    {
        // var_dump($this->Ebook_model->_get_all_books_per_level(user('grade_level'))); exit;
        $obj = array(
            'page_title' => 'Guest',
            'books' => $this->Ebook_model->_get_all_books_per_level(user('grade_level'), user('sc_id'))
        );

        $this->load->view('header', $obj);
        $this->load->view('main');
        $this->load->view('footer');
    }

    public function active_button()
    {
        return ($this->role_id == 1 || $this->role_id == 2) ? true : false;
    }

    
    
}

/* End of file dashboard.php */
/* Location: ./tfi_lms_application/controllers/dashboard.php */