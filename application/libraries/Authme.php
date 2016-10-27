<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authme
{

    private $CI;
    protected $PasswordHash;

    public function __construct()
    {
        if (!file_exists($path = dirname(__FILE__) . '/../vendor/PasswordHash.php')) {
            show_error('The phpass class file was not found.');
        }
        $this->CI = &get_instance();

        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->model('authme_model');
        $this->CI->config->load('authme');

        include($path);
        $this->PasswordHash = new PasswordHash(8, $this->CI->config->item('authme_portable_hashes'));
    }

    public function logged_in()
    {
        return $this->CI->session->userdata('logged_in');
    }

    public function signin($username, $password)
    {
        $user = $this->CI->authme_model->get_user_by_username($username, md5($password));
        if ($user) {
            unset($user->password);
            $this->CI->session->set_userdata(array(
                'logged_in' => true,
                'user' => $user
            ));
            return true;
        }

        return false;
    }

    public function signout($redirect = false)
    {
        $this->CI->session->sess_destroy();
        if ($redirect) {
            $this->CI->load->helper('url');
            redirect($redirect, 'refresh');
        }
    }

    public function signup($username, $password)
    {
        $user = $this->CI->authme_model->get_user_by_username($username);
        if ($user) {
            return false;
        }

        $password = md5($password);
        $this->CI->authme_model->create_user($username, $password);
        return true;
    }

    public function reset_password($user_id, $new_password)
    {
        $new_password = md5($new_password);
        $this->CI->authme_model->update_user($user_id, array(
            'password' => $new_password
        ));
    }

}

/* End of file: authme.php */
/* Location: application/libraries/authme.php */