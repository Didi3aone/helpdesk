<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mahasiswa Controller.
 * For Auth/login Mahasiswa
 */
class Mahasiswa extends MX_Controller  {

    private $_title = "Dashboard";
    private $_title_page = '<i class="fa-fw fa fa-home"></i> Dashboard ';
    private $_active_page = "mahasiswa-";
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Dashboard</a></li>";
    private $_back = "mahasiswa";
    private $_view_folder = "mahasiswa/";
    private $_view_folder_js = "mahasiswa/javascript/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();
    }

    /**
     * login controller and for login form processing.
     */
    public function index() {
        //load library and model.
        $this->load->library('form_validation');
        $this->load->model("Mahasiswa_model");

        //set validations rules.
        $this->form_validation->set_rules("nim", "Username or Email", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        $footer = array("script" => 'assets/js/pages/index/login.js');
        $header = array("title" => 'Login');

        //check for validation.
        if ($this->form_validation->run() == FALSE){

            //send error message to view.
            $error_message = validation_errors();
            $this->session->set_flashdata('message', $error_message);

        } else {

            //get the posted values
            $nim        = $this->input->post("nim");
            $password   = sha1($this->input->post("password"));

            //check to the model if the username, email and password is correct.
            $result = $this->Mahasiswa_model->check_login($nim, $password);

            //validate result.
            if ($result) {
                //set session user (for login).
                $sess_data = array(
                    "IS_LOGIN_MAHASISWA"    => TRUE,
                    "name"                  => $result['MahasiswaName'],
                    "email"                 => $result['MahasiswaEmail'],
                    "nim"                   => $result['MahasiswaNim'],
                    "id_mhs"                => $result['MahasiswaId'],
                    "password"              => $result['MahasiswaPassword']
                );
                // pr($this->input->post());exit;
                $this->session->set_userdata($sess_data);
                $this->Mahasiswa_model->update(array(
                    "MahasiswaLastLogin" => date("Y-m-d H:i:s"),
                    // "user_is_login"   => STATUS_LOGIN
                ),array("MahasiswaId" => $result['MahasiswaId']));

                //redirect to library module
                redirect('mahasiswa');

            } else {
                //invalid password or email | Username.
                $this->session->set_flashdata('message', 'Username or Password is wrong.');
            }
        }

        //load the views
        $this->load->view(MANAGER_HEADER_SIGNIN ,$header);
        $this->load->view($this->_view_folder . 'login');
        $this->load->view(MANAGER_FOOTER_SIGNIN ,$footer);
    }

    /**
     * Change Profile
     */
    public function change_profile () {
        //prepare header title.
        $header = array(
            "title"         => 'Change Profile',
            "title_page"    => '<i class="fa-fw fa fa-user"></i> Change Profile',
            "active_page"   => '',
            "breadcrumb"    => $this->_breadcrumb . '<li>Change Profile</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "view_js_nav" => $this->_view_folder_js . "change_profile_js",
        );

        $session = array(
            "name"  => $this->session->userdata("name"),
            "email" => $this->session->userdata("email"),
            "nim"   => $this->session->userdata("nim")
        );

        $data['item'] = $session;
        // pr($data['item']);exit;

        //load the view.
        $this->load->view(MANAGER_HEADER_MAHASISWA, $header);
        $this->load->view($this->_view_folder . 'change-profile',$data);
        $this->load->view(MANAGER_FOOTER_MAHASISWA, $footer);
    }

    /**
     *  Mahasiswa Change Password
     */
    public function change_password () {
        //prepare header title.
        $header = array(
            "title"         => 'Change Password',
            "title_page"    => '<i class="fa-fw fa fa-user"></i> Change Password',
            "active_page"   => '',
            "breadcrumb"    =>  $this->_breadcrumb . '<li>Change Password</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "view_js_nav" => $this->_view_folder_js . "change_password_js",
        );

        //load the view.
        $this->load->view(MANAGER_HEADER_MAHASISWA, $header);
        $this->load->view($this->_view_folder . 'change-password');
        $this->load->view(MANAGER_FOOTER_MAHASISWA, $footer);
    }

    /**
     * mahasiswa logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }

    /**
    * mahasiswa registration
    */
    public function user_registration ()
    {
        $this->load->model('Dynamic_model');
        $header = array(
            "title_msg" => "User Registration"
        );
        
        $footer = array(
            "view_js_nav" => $this->_view_folder_js. "create_js_nav"
        );

        $data['jurusan'] = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->get_all_data()['datas'];
        $data['fakultas'] = $this->Dynamic_model->set_model("mst_fakultas","mf","FakultasId")->get_all_data()['datas'];

        //load the views
        $this->load->view(MANAGER_HEADER_REGIS ,$header);
        $this->load->view($this->_view_folder . 'register',$data);
        $this->load->view(MANAGER_FOOTER,$footer);
    }

    /**
     * Set validation rule for mahasiswa create and edit
     */
    private function _set_rule_validation($id) {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('', '');
        //validates.
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]|max_length[100]");
        //special validations for when editing.
        $this->form_validation->set_rules('nim', 'Nim', "trim|required|callback_check_nim[$id]");
        $this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");
        //when insert only, check password.
        if (!$id) {
            $this->form_validation->set_rules('password', 'Password', "trim|required|min_length[6]|max_length[20]");
            $this->form_validation->set_rules('conf_password', 'Confirmation Password', "trim|required|min_length[6]|max_length[20]|matches[password]");
        } else {
            $this->form_validation->set_rules('new_password', 'New Password', "trim|min_length[6]|max_length[20]");
            if($this->input->post('new_password') != "") $this->form_validation->set_rules('conf_new_password', 'Confirmation New Password', "trim|required|min_length[6]|max_length[20]|matches[new_password]");
        }
    }

    /**
     * RULE validation for Change Profile
     */
    private function _set_rule_validation_profile($id) {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('', '');

        //validates.
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]|max_length[100]");

        //special validations for when editing.
        $this->form_validation->set_rules('nim', 'nim', "trim|required|callback_check_nim[$id]");
        $this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");
    }

    /**
     * set rule validation for change password
     */
    private function _set_rule_validation_pass () {
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules("password", "Old Password", "required|min_length[6]|max_length[12]|callback_password_check");
        $this->form_validation->set_rules("new_password", "New Password", "required|min_length[6]|max_length[12]|matches[confirm_password]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|min_length[6]|max_length[12]");
    }

    /**
     * This is a custom form validation rule to check that username is must unique.
     */
    public function check_nim($str, $id) {

        //load the model.
        $this->load->model('Mahasiswa_model');

        //flag.
        $isValid = true;
        $params = array("row_array" => true);

        if ($id == "") {
            //from create
            $params['conditions'] = array("lower(MahasiswaNim)" => strtolower($str));
        } else {
            $params['conditions'] = array(
                "lower(MahasiswaNim)" => strtolower($str), 
                "MahasiswaId !=" => $id
            );
        }

        $datas = $this->Mahasiswa_model->get_all_data($params)['datas'];

        if ($datas) {
            $isValid = false;
            $this->form_validation->set_message('check_nim', '{field} is already taken.');
        }

        return $isValid;
    }

    /**
     * This is a custom form validation rule to check that username is must unique.
     */
    public function check_email($str, $id) {

        //load the model.
        $this->load->model('Mahasiswa_model');

        //flag.
        $isValid = true;
        $params = array("row_array" => true);

        if ($id == "") {
            //from create
            $params['conditions'] = array("lower(MahasiswaEmail)" => strtolower($str));
        } else {
            $params['conditions'] = array(
                "lower(MahasiswaEmail)" => strtolower($str), 
                "MahasiswaId !=" => $id
            );
        }

        $datas = $this->Mahasiswa_model->get_all_data($params)['datas'];

        if ($datas) {
            $isValid = false;
            $this->form_validation->set_message('check_email', '{field} is already taken.');
        }

        return $isValid;
    }

    /**
     * check old password same as inputed old password
     */
    public function password_check ($old_pass) {

        $pass = $this->session->userdata('password');
        // pr($pass);exit;
        //check password
        if ($pass == sha1($old_pass)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', '{field} does not match');
            return FALSE;
        }
    }

    /**
     * Method to process adding or editing via ajax post.
     */
    public function process_form() {
        //must ajax and must post. 
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('Mahasiswa_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";

        //sanitize input (id is primary key, if from edit, it has value).
        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $nim            = $this->input->post('nim');
        $email          = $this->input->post('email');
        $jurusan_id     = $this->input->post('jurusan_id');
        $password       = $this->input->post('password');
        $password       = $this->input->post('conf_password');
        $address        = $this->input->post('pob');
        $date_now       = date('Y-m-d H:i:s');

        //server side validation.
        $this->_set_rule_validation($id);
        // pr($this->input->post());exit;
        //checking.
        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
            //begin transaction.
            $this->db->trans_begin();
            //validation success, prepare array to DB.
            $_save_data = array(
                'MahasiswaName'            => $name,
                'MahasiswaNim'             => $nim,
                'MahasiswaEmail'           => $email,
                'MahasiswaJurusanId'      => $jurusan_id,
                'MahasiswaPob'         => $address,
            );

            //insert or update?
            if ($id == "") {
                $_save_data['MahasiswaCreatedDate']    = $date_now;
                $_save_data['MahasiswaRegisterDate']   = $date_now;
                $_save_data['MahasiswaPassword']       = sha1($password);
                //insert to DB.
                $result = $this->Mahasiswa_model->insert($_save_data);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'Internal server error!.';
                } else {
                    $this->db->trans_commit();
                    $message['is_error'] = false;
                    //success.
                    //growler.
                    $message['notif_title']     = "Success!";
                    $message['notif_message']   = "Register success.";

                    //on insert, not redirected.
                    $message['redirect_to'] = site_url("mahasiswa");
                }
            } else {
                //update.
                if ($new_password != "") {
                    $arrayToDB['MahasiswaPassword'] = sha1($new_password);
                }
                $arrayToDB['MahasiswaUpdatedDate'] = $date_now;
                //condition for update.
                $condition = array("MahasiswaId" => $id);
                $result = $this->Admin_model->update($arrayToDB, $condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $message['is_error'] = false;
                    //success.
                    //growler.
                    $message['notif_title'] = "Excellent!";
                    $message['notif_message'] = "Admin has been updated.";

                    //on update, redirect.
                    $message['redirect_to'] = "/admin";
                }
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * Change Profile Process form
     */
    public function change_profile_process(){
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //set secure to true
        $this->_secure = true;

        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('Mahasiswa_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        $id         = $this->session->userdata('id');
        $name       = $this->input->post('name');
        $nim        = $this->input->post('nim');
        $email      = $this->input->post('email');

        $this->_set_rule_validation_profile($id);

        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
            //begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $arrayToDB = array(
                'MahasiswaName'  => $name,
                'MahasiswaNim'   => $nim,
                'MahasiswaEmail' => $email
            );

            if (!empty($id)) {
                $condition = array("MahasiswaId" => $id);
                $insert = $this->Mahasiswa_model->update($arrayToDB,$condition);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'database operation failed.';

            } else {
                $this->db->trans_commit();

                //set is error to false
                $message['is_error'] = false;

                //success.
                //growler.
                $message['notif_title'] = "Good!";
                $message['notif_message'] = "Profile has been updated.";

                //on insert, not redirected.
                $message['redirect_to'] = site_url("mahasiswa");


                //re-set the session
                $params = array("row_array" => true,"conditions" => array("MahasiswaId" => $id));
                $set = $this->Mahasiswa_model->get_all_data($params)['datas'];
                //set session user (for login).
                $sess_data = array(
                    "IS_LOGIN_MAHASISWA"    => TRUE,
                    "name"                  => $set['MahasiswaName'],
                    "email"                 => $set['MahasiswaEmail'],
                    "nim"                   => $set['MahasiswaNim'],
                    "id"                    => $set['MahasiswaId'],
                    "password"              => $set['MahasiswaPassword']
                );

                $this->session->set_userdata($sess_data);
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * Change Password Process form
     */
    public function change_password_process()
    {
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }
        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('Mahasiswa_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        $id       = $this->session->userdata('id');
        $password = $this->input->post('confirm_password');

        $this->_set_rule_validation_pass();
        // pr($this->input->post());exit;
        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
            //begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $SaveData = array('MahasiswaPassword'  => sha1($password));

            if (!empty($id)) {
                $condition = array("MahasiswaId" => $id);
                $insert = $this->Mahasiswa_model->update($SaveData,$condition);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'database operation failed.';

            } else {
                $this->db->trans_commit();

                //set is error to false
                $message['is_error'] = false;

                //success.
                //growler.
                $message['notif_title'] = "Good!";
                $message['notif_message'] = "Password has been updated.";

                //on insert, not redirected.
                $message['redirect_to'] = site_url("mahasiswa");


                //re-set the session
                $params = array("row_array" => true,"conditions" => array("MahasiswaId" => $id));
                $set = $this->Mahasiswa_model->get_all_data($params)['datas'];
                //set session user (for login).
                $sess_data = array(
                    "IS_LOGIN_MAHASISWA"    => TRUE,
                    "name"                  => $set['MahasiswaName'],
                    "email"                 => $set['MahasiswaEmail'],
                    "nim"                   => $set['MahasiswaNim'],
                    "id"                    => $set['MahasiswaId'],
                    "password"              => $set['MahasiswaPassword']
                );

                $this->session->set_userdata($sess_data);
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}