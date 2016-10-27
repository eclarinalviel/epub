<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller {

    public $user_id;
    public $school_id;

    public function __construct() {
        parent::__construct();
        // $this->load->library('Csvimport');

        $this->user_id = $this->uri->segment(3);
        $this->school_id = $this->uri->segment(3);

        $this->load->library('user_agent');

        $this->output->enable_profiler(false);
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
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
                'epubs' => $this->Admin_model->_get_all_epubs()
            );

            $this->load->view('header', $obj);
            $this->load->view('admin/dashboard');
            $this->load->view('footer');
            
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function users() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Users',
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
                'grade_levels' => $this->Admin_model->_get_all_grade_levels()
                //'users' => $this->Admin_model->_get_school_users($this->uri->segment(4))
            );

            
            $this->load->view('header', $obj);
            $this->load->view('admin/users');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function user() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'User',
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
                'user_details' => $this->Admin_model->_get_user_details($this->user_id),
            );

            
            $this->load->view('header', $obj);
            $this->load->view('admin/user_details');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function schools() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Users',
                'schools' => $this->Admin_model->_get_all_schools()
            );

            $this->load->view('header', $obj);
            $this->load->view('admin/schools');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    // public function school() {
    //     if (logged_in()) {
    //         $obj = array(
    //             'page_title' => 'School Profile',
    //             'school_details' => $this->Admin_model->_get_school_details($this->school_id),
    //             // 'grade_level_post' => $this->Admin_model->_get_grade_level(),
    //             'users' => $this->Admin_model->_get_school_users($this->school_id)
    //         );
    //         $this->load->view('header', $obj);
    //         $this->load->view('admin/school_details', 'refresh');
    //         $this->load->view('footer');
    //     } else {
    //         redirect('auth/signin', 'refresh');
    //     }
    // }

     public function school() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'School Profile',
                'schools' => $this->Admin_model->_get_school_details($this->school_id),
                'users' => $this->Admin_model->_get_users_by_school($this->school_id),
                'epubs' => $this->Admin_model->_get_epubs_by_school($this->school_id)
            );
            $this->load->view('header', $obj);
            $this->load->view('admin/school_option', 'refresh');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function school_users() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Users',
                'schools' => $this->Admin_model->_get_all_schools(),
                // 'users' => $this->Admin_model->_get_all_users_data()
                'users' => $this->Admin_model->_get_school_users($this->uri->segment(4)),
                'grade_levels' => $this->Admin_model->_get_all_grade_levels()
            );

            
            $this->load->view('header', $obj);
            $this->load->view('admin/users');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function school_info() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'School Information',
                'school_details' => $this->Admin_model->_get_school_details($this->uri->segment(4))
            );

            
            $this->load->view('header', $obj);
            $this->load->view('admin/school_info');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

public function school_books() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'Purchased Books',
                'books' => $this->Admin_model->_get_epubs_by_school($this->uri->segment(4)),
                'grade_levels' => $this->Admin_model->_get_all_grade_levels(),
                'epubs' => $this->Admin_model->_get_all_epubs()
            );

            
            $this->load->view('header', $obj);
            $this->load->view('admin/school_books');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }


    public function epubs() {
        if (logged_in()) {
            $obj = array(
                'page_title' => 'ePUBs',
                'schools' => $this->Admin_model->_get_all_schools(),
                'epubs' => $this->Admin_model->_get_all_epubs()
            );
            $this->load->view('header', $obj);
            $this->load->view('admin/epubs');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function add_school() {
        if (logged_in()) {
            $school = $this->input->post('school_name');
            $data = array(
                'name' => $school,
                'city_municipality' => $this->input->post('city_municipality'),
                'region' => $this->input->post('region'),
                'code' => md5($this->input->post('code')),
                'email' => $this->input->post('email')
            );
            $this->Admin_model->_new_school($data);
            // send email
             // $from_email = "vieclarinal@gmail.com"; 
             // $to_email = $this->input->post('email'); 
       
             // $this->email->from($from_email, 'Techfactors Inc.'); 
             // $this->email->to($to_email);
             // $this->email->subject('Account Access'); 
             // $this->email->message('This is to inform you that '.$school.' has been registered to ePUB Website. From: Techfactors Team'); 
       
             // //Send mail 
             // if($this->email->send()) {
             //    $this->session->set_flashdata("email_sent","Email sent successfully."); 
             // }else {
             //     $this->session->set_flashdata("email_sent","Error in sending Email."); 
             //     $this->load->view('email_form');
             // }

            $this->session->set_flashdata('success', 'Successfully Added!');
            $obj = array(
                'page_title' => 'Users',
                'schools' => $this->Admin_model->_get_all_schools()
            );
            redirect('admin/schools', $obj);
        } else {
            redirect('auth/signin', 'refresh');
        }

    }

    public function delete_school() {
        if (logged_in()) {

            $this->Admin_model->_delete_school( $this->school_id );
            $this->session->set_flashdata('success', 'Successfully Deleted!');

            $obj = array(
                'page_title' => 'School Profile',
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_school_users($this->school_id)
            );
            redirect('admin/schools', $obj);

        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function add_user() {
        if (logged_in()) {
            $password = md5($this->input->post('password'));
            $username = $this->input->post('username');
            $school = $this->input->post('school');
            $grade_level = $this->input->post('grade_level');

            $user_id = $this->authme_model->create_user($username, $password, $grade_level, $school);
            $data = array(
                'user_id' => $user_id,
                'fname' => $this->input->post('firstname'),
                'lname' => $this->input->post('lastname')
                // 'email' => $this->input->post('email')
            );
            $this->Account_model->_create_user_data($data);
            $this->session->set_flashdata('success', 'Successfully Added!');
            
            $obj = array(
                'page_title' => 'Users',
                'users' => $this->Authme_model->get_users()
            );
            redirect('admin/users', $obj);
        } else {
            redirect('auth/signin', 'refresh');
        }

    }

    public function update_user() {
        if (logged_in()) {
            $user_id = $this->input->post('user_id');
            
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'sc_id' => $this->input->post('school')
            );            

            $this->Authme_model->update_user($user_id, $data);
            $this->Account_model->_update_user_data($user_id);

            $obj = array(
                'page_title' => 'Users',
                'users' => $this->Authme_model->get_users()
            );
            $this->session->set_flashdata('success', 'Successfully Updated!');
            redirect('admin/users', $obj);
        } else {
            redirect('auth/signin', 'refresh');
        }

    }


    public function delete_user() {
        if (logged_in()) {
            $user_id =  $this->input->post('user_id');
            $this->Admin_model->_delete_user($user_id); 
           
            $this->session->set_flashdata('success', 'Successfully Deleted!');
            $obj = array(
                'page_title' => 'Manage Users',
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
                'error' => 'An Error Occurred'
                );
            $this->load->view('header', $obj);
            $this->load->view('admin/users');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function add_epub() {
        if (logged_in()) {
            $title = $this->input->post('title');
            $file = $this->upload_epub( 'userfile', 'pdf', './assets/documents/', $title );
            $image = $this->upload_epub( 'thumbnail', 'jpg|png', './assets/images/thumbnails/', $title );

            if ( isset($file) && isset($image) ) {

                $file = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'file_path' => $file['upload_data']['file_name'],
                    'thumbnail' => $image['upload_data']['file_name'],
                    'password' => md5($this->input->post('epub_password'))
                );
                
                $this->Admin_model->_add_epub( $file );
            }
             $this->session->set_flashdata('success', 'Successfully Added!');
             $obj = array(
               'page_title' => 'ePUBs',
               'epubs' => $this->Admin_model->_get_all_epubs(),
               'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
            );
            
                
            $this->load->view('header',$obj);
            $this->load->view('admin/epubs');
            $this->load->view('footer');


        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function upload_epub( $field_name = null, $type = null, $path = null, $epub_filename = null ) {
        
        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['max_size']    = 5000000;
        $config['file_name'] = preg_replace('/[^A-Za-z0-9]/', "", $epub_filename);
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        if ( ! $this->upload->do_upload($field_name)) {
            $data['error_msg'] = $this->upload->display_errors();
        }
        else {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data;

    }

    public function update_epub() {
        if (logged_in()) {

            $epub_id = $this->input->post('epub_id');
            $file = $this->upload_epub( 'userfile', 'pdf', './assets/documents/', $epub_id );
            $image = $this->upload_epub( 'thumbnail', 'jpg|png', './assets/images/thumbnails/', $epub_id );

            if ( isset($file) && isset($image) ) {

                $file = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'file_path' => $file['upload_data']['file_name'],
                    'thumbnail' => $image['upload_data']['file_name'],
                    'password' => md5($this->input->post('password'))
                );
                
                $this->Admin_model->_update_epub( $epub_id, $file );
            }

             $this->session->set_flashdata('success', 'Successfully Updated!');
             $obj = array(
               'page_title' => 'ePUBs',
               'epubs' => $this->Admin_model->_get_all_epubs(),
               'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
            );
            
                
            $this->load->view('header',$obj);
            $this->load->view('admin/epubs');
            $this->load->view('footer');


        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function epub_delete(){

        if (logged_in()) {
            $user_id =  $this->input->post('user_id');

            $this->Admin_model->_delete_epub( $this->input->post('epub_id') );
            $this->session->set_flashdata('success', 'Successfully Deleted!');

            $obj = array(
                'page_title' => 'Manage Users',
                'epubs' => $this->Admin_model->_get_all_epubs(),
                'schools' => $this->Admin_model->_get_all_schools(),
                'users' => $this->Admin_model->_get_all_users_data(),
                'error' => 'An Error Occurred'
            );
            $this->load->view('header', $obj);
            $this->load->view('admin/epubs');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    // public function search_school() {
    //     if (logged_in()) {
    //         $keyword =  $this->input->post('keyword');
           
    //         $obj = array(
    //             'page_title' => 'Schools',
    //             'schools' => $this->Admin_model->_search_by_school($keyword),
    //             'error' => 'An Error Occurred'
    //         );
    //         $this->load->view('header', $obj);
    //         $this->load->view('admin/schools');
    //         $this->load->view('footer');
    //     } else {
    //         redirect('auth/signin', 'refresh');
    //     }

    // }

    public function search_epub() {
        if (logged_in()) {
            $keyword =  $this->input->post('keyword');
           
            $obj = array(
                'page_title' => 'Schools',
                'epubs' => $this->Admin_model->_search_by_epub($keyword),
                'error' => 'An Error Occurred'
            );
            $this->load->view('header', $obj);
            $this->load->view('admin/epubs');
            $this->load->view('footer');
        } else {
            redirect('auth/signin', 'refresh');
        }

    }

    public function school_json() {
        $this->datatables
                ->select('tbl_schools.name AS school_name, tbl_schools.id AS school_id,'
                        . 'tbl_schools.city_municipality, tbl_schools.region')
                ->from('tbl_schools');
        echo $this->datatables->generate();
    }

    public function book_access() {
        if (logged_in()) {
            $grade_level = $this->input->post('grade_level');
            $school_id =  $this->input->post('school_id');
            $book_id = $this->input->post('book');
            // check for duplicate entries
            $book_access = $this->Admin_model->_check_existing_book_access($book_id, $school_id, $grade_level);

            if ($book_access) {
                // delete existing
                $this->Admin_model->_delete_existing_book_access($book_access->id);

                // add new
                $this->add_book_access( $book_id, $school_id, $grade_level );
            } else {
                // add new
                $this->add_book_access( $book_id, $school_id, $grade_level );
            }
           

            redirect($this->agent->referrer());

        } else {
            redirect('auth/signin', 'refresh');
        }
    }

    public function add_book_access( $book_id, $school_id, $grade_level ){
        
        $data = array(
            'book_id' => $book_id,
            'school_id' => $school_id,
            'grade_level' => $grade_level
            
        );
        $this->Admin_model->_add_epub_access($data);
    }


}

/* End of file admin.php */
/* Location: ./tfi_lms_application/controllers/admin.php */