<?php

class Authme_Model extends CI_Model
{

    public $tbl;

    public function __construct()
    {
        parent::__construct();

        $this->config->load('authme');
        $this->tbl = $this->config->item('db_tbl_users');

    }

    public function get_users($order_by = 'id', $order = 'asc', $limit = 0, $offset = 0)
    {
        $this->db->order_by($order_by, $order);
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get($this->tbl);
        return $query->result();
    }

    public function get_user($user_id)
    {
        $query = $this->db->get_where($this->tbl, array('id' => $user_id));
        return ($query->num_rows()) ? $query->row() : false;
    }

//    public function get_user_by_email($email)
//    {
//        $query = $this->db->get_where('tbl_users_data', array('email' => $email));
//        return ($query->num_rows()) ? $query->row() : false;
//    }

    public function get_user_by_username($email, $password)
    {
        $obj = array(
            'email' => $email,
            'password' => $password
        );

        $query = $this->db->get_where($this->tbl, $obj);
        return ($query->num_rows()) ? $query->row() : false;
    }

    public function get_user_access($email, $password)
    {
        $this->db->select('*');
        $this->db->from($this->tbl);
        $this->db->join('tbl_sections', 'tbl_sections.id = tbl_users.section_id', 'left');
        $this->db->where('tbl_users.email', $email);
        $this->db->where('tbl_users.password',$password);

        $query = $this->db->get();

        $result = $query->num_rows();

        if ($result > 0)
        {
            foreach ($query->result() as $row)
            {
                echo $row->role_id.' '.$row->grade_level;
            }
        } else {
            echo 'Login Failed';
        }
    }

    public function get_user_count()
    {
        return $this->db->count_all($this->tbl);
    }

    public function create_user($email, $password, $grade_level, $school)
    {
        $data = array(
            'email' => $email,
            'password' => $password, // Should be hashed
            'sc_id' => $school, // Should be hashed
            'grade_level' => $grade_level,
            'role' => 3, // Default Role for common/student user
            'status' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->tbl, $data);
        return $this->db->insert_id();
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('id', $user_id);
        $this->db->update($this->tbl, $data);
    }

    public function delete_user($user_id)
    {
        $this->db->delete($this->tbl, array('id' => $user_id));
    }

}

/* End of file: Authme_model.php */
/* Location: application/models/Authme_model.php */