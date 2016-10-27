<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * Usage: 
 * 1] Load helper in controller or autoload 
 * $this->load->helper('user_email'); 
 * 2] Call the function in view: 
 * <?=email(); ?>
 */

if (!function_exists('email' || 'fname' || 'count_courses' || 'count_sections' || 'is_connected')) {

    function email()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $user_id = user('id');

        $obj = $CI->account_model->_get_user_data($user_id);

        foreach ($obj as $row) {
            return $row->email;
        }
    }

    function fname()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $user_id = user('id');

        $obj = $CI->account_model->_get_user_data($user_id);

        foreach ($obj as $row) {
            return $row->first_name;
        }
    }

    function count_courses($user_id)
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $user_id = user('id');

        $obj = $CI->courses_model->_count_courses($user_id);

        return $obj;
    }

    function count_sections($user_id)
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $user_id = user('id');

        $obj = $CI->sections_model->_count_sections($user_id);

        return $obj;
    }

    function is_connected() {
        $connected = @fsockopen("www.google.com", 80);

        if($connected) {
            $is_conn = TRUE;
            fclose($connected);
        } else {
            $is_conn = FALSE;
        }
        return $is_conn;
    }
}