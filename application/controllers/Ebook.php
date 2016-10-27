<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('main');
        $this->load->view('footer');
    }

    public function download(){
        $password = md5($this->input->post('password'));
        $book_id = $this->input->post('book_id');
        // validate password base on book_id
        $ebook = $this->Ebook_model->_get_ebook_by_id( $book_id );
       
        if ( $password == $ebook->password ) {
            $file = file_get_contents(base_url('assets/documents/'.$ebook->file_path)); // Read the file's contents
            force_download($ebook->file_path, $file);
            $data['success_msg'] = 'Downloaded Successfully!'; 

        } else {
            $data['error_msg'] = 'The password is incorrect!!!'; 
        }

         redirect('dashboard', 'refresh');
    }   

}
