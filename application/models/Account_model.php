<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account_Model extends CI_Model
{

    public $tbl;

    public function __construct()
    {
        parent::__construct();

        $this->config->load('authme');
        $this->tbl = $this->config->item('db_tbl_users_data');
    }

    public function _get_user_data($user_id)
    {
        $this->db->select('*');
        $this->db->from($this->tbl);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function _get_user_data_by_email($email)
    {
        $this->db->select('*');
        $this->db->from($this->tbl);
        $this->db->where('email', $email);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function _create_user_data($data)
    {
        $this->db->trans_start();
    
        $this->db->insert($this->tbl, $data);
        $this->db->trans_complete();
    }

    public function _update_user_data($user_id)
    {

        $obj = array(
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('lastname'),
            'email' => filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL)
        );

        $this->db->trans_start();
        $this->db->where('user_id', $user_id);
        $this->db->update($this->tbl, $obj);
        $this->db->trans_complete();

        if ($this->db->affected_rows() <= 1) {
            return $this->session->set_flashdata('success', 'Successfully Updated');
        }
    }

     public function _update_school_data($data, $school_id)
    {
    
        $this->db->where('id', $school_id);
        $this->db->update('tbl_schools', $data);

    }

    public function _update_password( $user_id, $new_password ) {

        $obj = array(
            'password' => $new_password
        );
        $this->db->where('id', $user_id);
        $this->db->update('tbl_users', $obj);
    }

}

/* End of file: Account_model.php */
/* Location: application/models/Account_model.php */