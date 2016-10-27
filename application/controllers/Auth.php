<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }

    public function index()
    {
        if (!logged_in()) {
            redirect('auth/signin');
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    public function signin()
    {
        if (logged_in()) {
            redirect('dashboard', 'refresh');
        }

        $data['error'] = '';
        $data['page_title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            if ($this->authme->signin(set_value('username'), set_value('password'))) {
                $this->dashboard();
            } else {
                $data['error'] = 'Your username and/or password is incorrect.';
            }
        }
        $this->load->view('header', $data);
        $this->load->view('auth/signin');
        $this->load->view('footer');
    }

    public function dashboard()
    {
        if (user('role') == 1) {
            redirect('admin/dashboard', 'refresh');

        } elseif (user('role') == 4 ){
            redirect('school_admin/dashboard', 'refresh');
            
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    public function signup()
    {
        if (logged_in()) {
            redirect('dashboard', 'refresh');
        }

        $data['error'] = '';
        $data['page_title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[' . $this->config->item('db_tbl_users') . '.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('authme_password_min_length') . ']');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_message('is_unique', 'Username is already taken.');

        if ($this->form_validation->run()) {
            if ($this->authme->signup(set_value('username'), set_value('password'))) {
                $this->authme->signin(set_value('username'), set_value('password'));
                $user_id = user('id');
                $this->accounts_model->_create_user_data($user_id);
                redirect('accounts/manage', 'refresh');
            } else {
                $data['error'] = 'Failed to sign up with the given username and password.';
            }
        }
        $this->load->view('header', $data);
        $this->load->view('auth/signup');
        $this->load->view('footer');
    }

    public function signout()
    {
        if (!logged_in()) {
            redirect('auth/signin');
        } else {
            $this->authme->signout('/');
        }
    }

    public function forgot()
    {
        if (logged_in()) {
            redirect('dashboard', 'refresh');
        }

        $data['success'] = false;
        $data['page_title'] = 'Forgot Password?';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $user = $this->accounts_model->_get_user_data_by_email($email);
            $slug = md5($user->user_id . $user->email . date('Ymd'));
            $this->load->library('email');
            $this->email->from('admin@techfactorsinc.com', 'EnglishTek LMS | TechFactors Inc. '); // Change these details
            $this->email->to($email);
            $this->email->subject('Reset your Password');
            $this->email->message('To reset your password please click the link below and follow the instructions:
            ' . site_url('auth/reset/' . $user->user_id . '/' . $slug) . '
            if you did not request to reset your password then please just ignore this email and no changes will occur. 
            Note: This reset code will expire after ' . date('j M Y') . '.');
            $this->email->send();

            $data['success'] = true;
        }

        $this->load->view('header', $data);
        $this->load->view('auth/forgot_password');
        $this->load->view('footer');
    }

    public function email_exists($email)
    {
        $this->load->model('authme_model');

        if ($this->authme_model->get_user_by_email($email)) {
            return true;
        } else {
            $this->form_validation->set_message('email_exists', 'We couldn\'t find that email address in our system.');
            return false;
        }
    }

    public function reset()
    {
        if (logged_in()) {
            redirect('dashboard', 'refresh');
        }

        $data['success'] = false;

        $user_id = $this->uri->segment(3);

        if (!$user_id) {
            show_error('Invalid reset code.');
        }

        $hash = $this->uri->segment(4);

        if (!$hash) {
            show_error('Invalid reset code.');
        }

        $user = $this->accounts_model->_get_user_data($user_id);

        if (!$user) {
            show_error('Invalid reset code.');
        }

        $slug = md5($user->user_id . $user->email . date('Ymd'));

        if ($hash != $slug) {
            show_error('Invalid reset code.');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('authme_password_min_length') . ']');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run()) {
            $this->authme->reset_password($user->user_id, $this->input->post('password'));
            $data['success'] = true;
        }

        $this->load->view('auth/reset_password', $data);
    }

}

/* End of file auth.php */
/* Location: ./tfi_lms_application/controllers/auth.php */