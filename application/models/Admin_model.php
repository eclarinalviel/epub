<?php

class Admin_Model extends CI_Model
{

	public $tbl;

    public function __construct()
    {
        parent::__construct();

        $this->config->load('authme');
        $this->tbl = $this->config->item('db_tbl_users');
    }

	public function _new_school($data){
        $this -> db -> insert('tbl_schools',$data);
    }

    public function _get_all_schools(){
        $this -> db -> select('*');
        $this -> db -> from('tbl_schools');
        $this -> db -> order_by('id','desc');

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }
    
    public function _get_school_details($school_id){
        $this -> db -> select('*');
        $this -> db -> from('tbl_schools');
        $this -> db -> where('id', $school_id);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }


    public function _get_school_users($school_id){
        $this -> db -> select('
            tbl_users.id AS user_id,
            tbl_users.email AS email,
            tbl_users_data.fname AS firstname,
            tbl_users_data.lname AS lastname,
            tbl_users.sc_id AS school_id,
            tbl_schools.name AS school
            ');
        $this -> db -> from($this->tbl);
        $this-> db -> join('tbl_users_data', 'tbl_users.id = tbl_users_data.user_id');
        $this-> db -> join('tbl_schools', 'tbl_users.sc_id = tbl_schools.id');

        $array = array('tbl_users.sc_id' => $school_id, 'tbl_users.role' => 3);
        //, 'tbl_users.status' => 1
        $this -> db -> where($array);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

    public function _get_all_users_data(){
        $this -> db -> select('
        	tbl_users.id AS user_id,
                tbl_users.password AS password,
                tbl_users.email AS email,
        	tbl_users_data.fname AS firstname,
        	tbl_users_data.lname AS lastname,
                tbl_users.sc_id AS school_id,
        	tbl_schools.name AS school
        	');
        $this -> db -> from($this->tbl);
        $this-> db -> join('tbl_users_data', 'tbl_users.id = tbl_users_data.user_id');
        $this-> db -> join('tbl_schools', 'tbl_users.sc_id = tbl_schools.id');

        $array = array('tbl_users.role' => 3, 'tbl_users.status' => 1);
        $this -> db -> where($array);
        // $this -> db -> where('tbl_users.role', 3);
        $this -> db -> order_by('user_id','desc');

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

     public function  _get_user_details($user_id){
        $this -> db -> select('tbl_users.id AS user_id, tbl_users.email AS email,
         tbl_users_data.fname AS fname,
         tbl_users_data.lname AS lname,
         tbl_roles.role_name AS role_name,
         tbl_roles.role_id AS roles_id,
         tbl_schools.name AS school_name');
        $this -> db -> from($this->tbl);
        $this -> db -> join('tbl_users_data', 'tbl_users.id = tbl_users_data.user_id');
        $this -> db -> join('tbl_roles', 'tbl_users.role = tbl_roles.role_id');
        $this -> db -> join('tbl_schools', 'tbl_users.sc_id = tbl_schools.id');
        $this -> db -> where('user_id', $user_id);
        $query = $this -> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

     public function  _get_users_by_school($school_id){
        $this -> db -> select('tbl_users.id AS user_id, tbl_users.email AS email,
         tbl_users_data.fname AS fname,
         tbl_users_data.lname AS lname,
         tbl_roles.role_name AS role_name,
         tbl_roles.role_id AS roles_id,
         tbl_schools.name AS school_name');
        $this -> db -> from($this->tbl);
        $this -> db -> join('tbl_users_data', 'tbl_users.id = tbl_users_data.user_id');
        $this -> db -> join('tbl_roles', 'tbl_users.role = tbl_roles.role_id');
        $this -> db -> join('tbl_schools', 'tbl_users.sc_id = tbl_schools.id');
        $this -> db -> where('sc_id', $school_id);
        $query = $this -> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

    public function _delete_user($user_id){
        $this -> db -> delete('tbl_users', array('id' => $user_id));
        $this -> db -> delete('tbl_users_data', array('user_id' => $user_id));

        // $data = array(
        //     'status' => 0 //zero for inactive
        //     );
        // $this-> db ->where('id', $user_id);
        // $this-> db ->update('tbl_users',$data);
    }

    public function _add_epub( $data = null ) {
      $this-> db ->insert('tbl_epub',$data);
    }

    public function _update_epub( $epub_id = null, $data = null ) {
        $this-> db ->where('id', $epub_id);
        $this-> db ->update('tbl_epub',$data);
    }

    public function _get_all_epubs() {
        $this -> db -> select('*');
        $this -> db -> from('tbl_epub');

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

    public function _get_epubs_by_school($school_id) {
        $this -> db -> select('*');
        $this -> db -> from('tbl_epub_access');
        $this -> db -> join('tbl_epub', 'tbl_epub_access.book_id = tbl_epub.id');
        $this -> db -> join('tbl_schools', 'tbl_epub_access.school_id = tbl_schools.id');
        $this -> db -> where('school_id', $school_id);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }
    
    public function _delete_epub($epub_id){
        $this -> db -> delete('tbl_epub', array('id' => $epub_id));
    }

    public function _delete_school($school_id){
        $this -> db -> delete('tbl_schools', array('id' => $school_id));
    }

    public function validate_school_code( $code = null ) {
        $this -> db -> select('id');
        $this -> db -> from('tbl_schools');
        $this -> db -> where('code', $code);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }

    public function validate_grade_level_code( $code = null ) {
        $this -> db -> select('*');
        $this -> db -> from('tbl_grade_level_code');
        $this -> db -> where('code', $code);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }


    // public function _search_by_school( $school_name = null ) {
    //     $this-> db -> select('*');
    //     $this-> db -> from('tbl_schools');
    //     $this-> db ->like('name', $school_name);
        
    //     $query = $this-> db -> get();
    //     return $query->result();
    // }

    // public function _search_by_epub( $title = null ) {
    //     $this-> db -> select('*');
    //     $this-> db -> from('tbl_epub');
    //     $this-> db ->like('title', $title);
        
    //     $query = $this-> db -> get();
    //     return $query->result();
    // }

    public function _get_all_grade_levels () {
        $this -> db -> select('*');
        $this -> db -> from('tbl_grade_level');

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

    public function _count_students_per_grade_level( $grade_level ) {
        $this -> db -> select('*');
        $this -> db -> from('tbl_users');
        // $this -> db -> where('grade_level', $grade_level);
        $array = array('grade_level' => $grade_level, 'status' => 1);
        $this -> db -> where($array);


        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function _get_students_per_grade_level( $grade_level ) {
        $this -> db -> select('tbl_users.id AS user_id, 
            tbl_users.email AS email,
            tbl_users_data.fname AS fname,
            tbl_users_data.lname AS lname');

        $this -> db -> from('tbl_users');
        $this -> db -> join('tbl_users_data', 'tbl_users.id = tbl_users_data.user_id');
        // $this -> db -> where('grade_level', $grade_level);
        $array = array('tbl_users.grade_level' => $grade_level, 'tbl_users.status' => 1);
        $this -> db -> where($array);


        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }

    public function _generate_gl_code( $data = null ) {
        $this -> db -> insert('tbl_grade_level_code',$data);
    }

    public function _add_epub_access( $data = null ) {
        $this -> db -> insert('tbl_epub_access',$data);
    }

    public function _terminate_user( $user_id = null ) {
        $data = array(
            'status' => 0 //zero for inactive
            );
        $this-> db ->where('id', $user_id);
        $this-> db ->update('tbl_users',$data);
    }

    // CODE (school admin)
    public function _get_gl_code_per_level( $grade_level, $school_id ) {
        $this -> db -> select('code');
        $this -> db -> from('tbl_grade_level_code');
        $array = array('grade_level' => $grade_level, 'school_id' => $school_id);
        $this -> db -> where($array);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }

    public function _check_existing_code( $grade_level, $school_id ) {
        $this -> db -> select('id');
        $this -> db -> from('tbl_grade_level_code');
        $array = array('grade_level' => $grade_level, 'school_id' => $school_id);
        $this -> db -> where($array);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }

    public function _delete_existing_code( $gl_code ) {
        $this -> db -> delete('tbl_grade_level_code', array('id' => $gl_code));
    }

    // BOOK (admin)
    public function _check_existing_book_access( $book_id, $school_id, $grade_level ) {
        $this -> db -> select('id');
        $this -> db -> from('tbl_epub_access');
        $array = array('grade_level' => $grade_level, 'school_id' => $school_id, 'book_id' => $book_id);
        $this -> db -> where($array);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> row() : false;
    }

    public function _delete_existing_book_access( $access_id ) {
         $this -> db -> delete('tbl_epub_access', array('id' => $access_id));
    }

}