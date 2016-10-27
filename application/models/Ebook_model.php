<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ebook_Model extends CI_Model
{
	public $tbl;

    public function __construct()
    {
        parent::__construct();

        $this->config->load('authme');
    }

	public function _get_ebook_by_id ( $book_id = null ) {
		$this->db->select('*');
        $this->db->from('tbl_epub');
        $this->db->where('id', $book_id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : false;
	}

	public function _get_all_books() {
		$this->db->select('*');
        $this->db->from('tbl_epub');

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
	}

    public function _get_all_books_per_level ( $grade_level, $school_id ) {
        $this -> db -> select('*');
        $this -> db -> from('tbl_epub_access');
        $this -> db -> join('tbl_epub', 'tbl_epub_access.book_id = tbl_epub.id');
        $this -> db -> join('tbl_grade_level', 'tbl_epub_access.grade_level = tbl_grade_level.id');
        $this -> db -> join('tbl_schools', 'tbl_schools.id = tbl_epub_access.school_id');
        // $this -> db -> where('tbl_epub_access.grade_level', $grade_level);

        $array = array('tbl_epub_access.grade_level' => $grade_level, 'tbl_epub_access.school_id' => $school_id);
        $this -> db -> where($array);

        $query = $this-> db -> get();
        return ($query -> num_rows() > 0) ? $query -> result() : false;
    }


}