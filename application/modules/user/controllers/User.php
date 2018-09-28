<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Controller.
 *
 */
class User extends MX_Controller  {

    private $_title = "User";
    private $_title_page = '<i class="fa-fw fa fa-user"></i> User ';
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page = "user-";
    private $_back = "/user";
    private $_js_path = "assets/js/pages/user/";
    private $_view_folder = "user/";
    private $_view_folder_js = "user/javascript/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();

    }

    //////////////////////////////// VIEWS //////////////////////////////////////

    /**
     * List Admin
     */
    public function index() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Admin</span>',
            "active_page"   => $this->_active_page."list",
            "breadcrumb"    => $this->_breadcrumb . '<li>Admin</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js . "list_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List Admin
     */
    public function list() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Mahasiswa</span>',
            "active_page"   => $this->_active_page."list",
            "breadcrumb"    => $this->_breadcrumb . '<li>Mahasiswa</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js . "list_js_mhs"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list_mhs');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * Create an admin
     */
    public function create () {
        $this->_breadcrumb .= '<li><a href="user">User</a></li>';
        $this->load->model('Dynamic_model');
        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Create User</span>',
            "active_page"   => $this->_active_page."create",
            "breadcrumb"    => $this->_breadcrumb . '<li>Create User</li>',
            "back"          => $this->_back,
        );

        $data['role'] = $this->Dynamic_model->set_model("tbl_user_role","tur","role_id")->get_all_data()['datas'];

        $data['fakultas'] = $this->Dynamic_model->set_model("mst_fakultas","mu","FakultasId")->get_all_data()['datas'];

        $data['type'] = $this->Dynamic_model->set_model("tbl_user_type","tur","type_id")->get_all_data()['datas'];

        $footer = array(
            "view_js_nav" => $this->_view_folder_js . "create_js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create', $data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Edit an admin
     */
    public function edit ($user_id = null) {
        $this->_breadcrumb .= '<li><a href="'.site_url('user').'">User</a></li>';

        //load the model.
		$this->load->model(array('User_model','Dynamic_model'));
        //initials
        $data['datas'] = null;
        //prepare get data
        $params = array(
            "select" => "tu.*, tur.role_id,tur.role_name, tut.type_id, tut.type_name, mf.FakultasId, mf.FakultasName",
            "joined" => array("tbl_user_role tur" => array("tur.role_id" => "tu.user_role_id")),
            "left_joined" => array(
                "tbl_user_type tut" => array("tut.type_id" => "tu.user_type_id"),
                "mst_fakultas mf" => array("mf.FakultasId" => "FakultasName")
            ),
            "row_array" => true,
            "conditions" => array("user_id" => $user_id)
        );
        //get the data.
        $data['datas'] = $this->User_model->get_all_data($params)['datas'];
        //get role data
        $data['role'] = $this->Dynamic_model->set_model("tbl_user_role","tur","role_id")->get_all_data(array(
            "conditions" => array("role_id NOT IN ('".$data['datas']['role_id']."')" => NULL)
        ))['datas'];
        //get fakultas
        $data['fakultas'] = $this->Dynamic_model->set_model(
            "mst_fakultas",
            "mu","FakultasId"
        )->get_all_data(array(
            "conditions" => array("mf.FakultasId NOT IN('".$data['datas']['FakultasId']."')")
        ))['datas'];
        //get type
        $data['type'] = $this->Dynamic_model->set_model(
            "tbl_user_type",
            "tur",
            "type_id")->get_all_data(array("conditions" => array("tur.type_id NOT IN('".$data['datas']['user_type_id']."')")
        ))['datas'];


        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Edit User</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>Edit User</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "view_js_nav" => $this->_view_folder_js . "create_js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create', $data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * view an admin
     */
    public function view ($user_id = null) {
        $this->_breadcrumb .= '<li><a href="/admin">Admin</a></li>';

        //load the model.
		$this->load->model('User_model');
        $data['item'] = null;

        //validate ID and check for data.
        if ( $user_id === null || !is_numeric($user_id) ) {
            show_404();

        }

        $params = array("row_array" => true,"conditions" => array("user_id" => $user_id));
        //get the data.
        $data['item'] = $this->User_model->get_all_data($params)['datas'];

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> View Admin</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>View Admin</li>',
            "back"          => $this->_back,
        );

        $footer = array();

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'view', $data);
		$this->load->view(MANAGER_FOOTER, $footer);
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
            "script" => $this->_js_path . "change_profile.js",
        );

        $data['item'] = $this->_currentUser;

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
		$this->load->view($this->_view_folder . 'change-profile',$data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }
 
    /**
     * Change Password
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
            "script" => $this->_view_folder_js . "change_pass_js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
		$this->load->view($this->_view_folder . 'change-password');
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    //////////////////////////////// RULES //////////////////////////////////////

    /**
     * Set validation rule for admin create and edit
     */
    private function _set_rule_validation($id) {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('', '');

        //validates.
        $this->form_validation->set_rules("name", "Name", "trim|required");
        //special validations for when editing.
        $this->form_validation->set_rules('username', 'Username', "trim|required|callback_check_username[$id]");
        $this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");
        $this->form_validation->set_rules('role', 'User Role', "trim|required");

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
		$this->form_validation->set_rules('username', 'Username', "trim|required|callback_check_username[$id]");
		$this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");
    }

    /**
     * set rule validation for change password
     */
    private function _set_rule_validation_pass () {
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules("password", "Old Password", "required|min_length[4]|max_length[12]|callback_password_check");
        $this->form_validation->set_rules("new_password", "New Password", "required|min_length[4]|max_length[12]|matches[confirm_password]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|min_length[4]|max_length[12]");
    }

    /**
     * This is a custom form validation rule to check that username is must unique.
     */
    public function check_username($str, $id) {
       
        //flag.
        $isValid = true;
        $params = array("row_array" => true);

		if ($id == "") {
			//from create
			$params['conditions'] = array("lower(user_name)" => strtolower($str));
		} else {
			$params['conditions'] = array("lower(user_name)" => strtolower($str), "user_id !=" => $id);
		}

		$datas = $this->User_model->get_all_data($params)['datas'];

		if ($datas) {
			$isValid = false;
			$this->form_validation->set_message('check_username', '{field} is already taken.');
		}

        return $isValid;
    }

    /**
     * This is a custom form validation rule to check that email is must unique.
     */
	public function check_email($str, $id) {

        //flag.
        $isValid = true;
        $params = array("row_array" => true);

		if ($id == "") {
			//from create
			$params['conditions'] = array("lower(user_email)" => strtolower($str));
		} else {
			$params['conditions'] = array("lower(user_email)" => strtolower($str), "user_id !=" => $id);
		}

		$datas = $this->User_model->get_all_data($params)['datas'];
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

		//check password
		if ($pass = sha1($old_pass)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('password_check', '{field} does not match');
			return FALSE;
		}
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////

    /**
     * Function to get list_all_data admin
     */
    public function list_all_data() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
			exit('No direct script access allowed');
		}

		//load model
        $this->load->model('User_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
		$sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
		$limit = sanitize_str_input($this->input->get("length"), "numeric");
		$start = sanitize_str_input($this->input->get("start"), "numeric");
		$search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

		$select = array(
            'user_id',
            'user_full_name',
            'user_email',
            'role_name as user_role',
            'type_name as user_type',
            'FakultasName',
            'user_login_time',
            'IF(user_is_active = 1,"Active","Nonactive") as status'
        );

        $joined = array();
        $left_joined = array(
            "tbl_user_role tur" => array("tur.role_id" => "tu.user_role_id"),
            "tbl_user_type tut" => array("tut.type_id" => "tu.user_type_id"),
            "mst_fakultas mf" => array("mf.FakultasId" => "tu.user_fakultas_id")
        );

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(user_id)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;

                    case 'username':
                        if ($value != "") {
                            $data_filters['lower(username)'] = $value;
                        }
                        break;

                    case 'email':
                        if ($value != "") {
                            $data_filters['lower(email)'] = $value;
                        }
                        break;

                    case 'admin_type':
                        if ($value != "") {
                            $data_filters['lower(admin_type)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'last_login':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(last_login_time as date) <="] = $date['end'];
                            $conditions["cast(last_login_time as date) >="] = $date['start'];

                        }
                        break;
                    case 'create_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(created_date as date) <="] = $date['end'];
                            $conditions["cast(created_date as date) >="] = $date['start'];

                        }
                        break;
                    case 'update_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(updated_date as date) <="] = $date['end'];
                            $conditions["cast(updated_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->User_model->get_all_data(array(
			'select' => $select,
            'joined' => $joined,
            'left_joined' => $left_joined,
            'order_by' => array($column_sort => $sort_dir),
			'limit' => $limit,
			'start' => $start,
			'conditions' => $conditions,
            'filter' => $data_filters,
            "count_all_first" => true,
            'debug'     => false
		));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
			"draw" => intval($this->input->get("draw")),
			"recordsTotal" => $total_rows,
			"recordsFiltered" => $total_rows,
		);

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

     /**
     * Function to get list_all_data admin
     */
    public function list_all_datas() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('mahasiswa/Mahasiswa_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit = sanitize_str_input($this->input->get("length"), "numeric");
        $start = sanitize_str_input($this->input->get("start"), "numeric");
        $search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

        $select = array(
            'MahasiswaNim',
            'MahasiswaName',
            'mf.FakultasName',
            'mj.JurusanName',
            'MahasiswaEmail'
        );

        $joined = array(
            "mst_fakultas mf" => array("mf.FakultasId" => "mm.MahasiswaFakultasId"),
            "mst_jurusan mj" => array("mj.JurusanId" => "mm.MahasiswaJurusanId")
        );

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(user_id)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;

                    case 'username':
                        if ($value != "") {
                            $data_filters['lower(username)'] = $value;
                        }
                        break;

                    case 'email':
                        if ($value != "") {
                            $data_filters['lower(email)'] = $value;
                        }
                        break;

                    case 'admin_type':
                        if ($value != "") {
                            $data_filters['lower(admin_type)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'last_login':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(last_login_time as date) <="] = $date['end'];
                            $conditions["cast(last_login_time as date) >="] = $date['start'];

                        }
                        break;
                    case 'create_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(created_date as date) <="] = $date['end'];
                            $conditions["cast(created_date as date) >="] = $date['start'];

                        }
                        break;
                    case 'update_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(updated_date as date) <="] = $date['end'];
                            $conditions["cast(updated_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Mahasiswa_model->get_all_data(array(
            'select' => $select,
            'joined' => $joined,
            'order_by' => array($column_sort => $sort_dir),
            'limit' => $limit,
            'start' => $start,
            'conditions' => $conditions,
            'filter' => $data_filters,
            "count_all_first" => true,
            'debug'     => false
        ));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
     * Method to process adding or editing via ajax post.
     */
    public function process_form() {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}

        //set secure to true
        $this->_secure = true;

        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('User_model');

        //initial.
        $message['is_error'] = true;
		$message['error_msg'] = "";
        $message['redirect_to'] = "";

        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $nik            = $this->input->post('nik');
        $username       = $this->input->post('username');
        $role           = $this->input->post('role');
        $email          = $this->input->post('email');
        $password       = $this->input->post('conf_password');
        $new_password   = $this->input->post('new_password');
        $user_type      = $this->input->post('user_type');
        $fak_id         = $this->input->post('fak_id');

        //server side validation.
        $this->_set_rule_validation($id);

        //checking.
        if ($this->form_validation->run($this) == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();

        } else {

            //begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $_save_data = array(
                "user_full_name"    => $name,
                "user_nik"          => $nik,
                "user_name"         => $username,
                "user_email"        => $email,
                "user_type_id"      => $user_type,
                "user_fakultas_id"  => $fak_id
            );

            //insert or update?
            if ($id == "") {
                $_save_data['user_password']     = sha1($password);
                $_save_data['user_created_date'] = date('Y-m-d H:i:s');
                //insert to DB.
                $result = $this->User_model->insert($_save_data);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $message['is_error'] = false;

                    $message['notif_title']     = "Good!";
                    $message['notif_message']   = "New User has been added.";
                    $message['redirect_to']     = site_url("user");
                }

            } else {
                //update.
                if ($new_password != "") {
                    $_save_data['user_password'] = sha1($new_password);
                }
                $_save_data['user_updated_date'] = date("Y-m-d H:i:s");
                //condition for update.
                $condition = array("user_id" => $id);
                $result = $this->User_model->update($_save_data, $condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    //check if admin id equals to current user login
                    //re-set session
                    // if ($this->_currentUser['user_id'] == $id) {
                    //     $params = array("row_array" => true,"conditions" => array("user_id" => $id));
                    //     $data_admin = $this->User_model->get_all_data($params)['datas'];
                    //     $this->session->set_userdata(ADMIN_SESSION, $data_admin);
                    // }

                    $message['is_error'] = false;

                    //success.
                    //growler.
                    $message['notif_title'] = "Excellent!";
                    $message['notif_message'] = "User has been updated.";
                    $message['redirect_to'] = site_url("user");
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
		$this->load->model('User_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
		$message['error_msg'] = "";

		$id         = $this->_currentUser['user_id'];
        $name       = sanitize_str_input($this->input->post('name'));
        $username   = sanitize_str_input($this->input->post('username'));
        $email      = sanitize_str_input($this->input->post('email'));

        $this->_set_rule_validation_profile($id);

        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
			//begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $arrayToDB = array('name'       => $name,
                               'username' 	=> $username,
                               'email'      => $email);

			if (!empty($id)) {
				$condition = array("user_id" => $id);
                $insert = $this->User_model->update($arrayToDB,$condition);
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
                $message['redirect_to'] = "/";


				//re-set the session
				$params = array("row_array" => true,"conditions" => array("user_id" => $id));
                $data_admin = $this->User_model->get_all_data($params)['datas'];
                $this->session->set_userdata(ADMIN_SESSION, $data_admin);
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
		$this->load->model('User_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
		$message['error_msg'] = "";

		$id       = $this->session->userdata('user_id');
		$password = $this->input->post('confirm_password');

        $this->_set_rule_validation_pass();

        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
			//begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $SaveData = array('user_password'   => sha1($password));

			if (!empty($id)) {
				$condition = array("user_id" => $id);
                $insert = $this->User_model->update($SaveData,$condition);
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
                $message['redirect_to'] = site_url("manager");


				//re-set the session
				$params = array("row_array" => true,"conditions" => array("user_id" => $id));
                $data_admin = $this->User_model->get_all_data($params)['datas'];
                $sess_data = array(
                    "IS_LOGIN_ADMIN" => TRUE,
                    "name"           => $data_admin['user_name'],
                    "email"          => $data_admin['user_email'],
                    "password"       => $data_admin['user_password'],
                    "user_id"        => $data_admin['user_id']
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
     * Delete an admin.
     */
    public function delete() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('User_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = sanitize_str_input($this->input->post('id'), "numeric");

        //check first.
        if (!empty($id) && is_numeric($id)) {

            //check if admin id is the current login ?
            if ($this->_currentUser['user_id'] == $id) {
                $message['error_msg'] = 'Cannot delete the Admin account you are currently logged in with.';
                //encoding and returning.
                $this->output->set_content_type('application/json');
                echo json_encode($message);
                exit;
            }

            $total = $this->User_model->get_all_data(array(
                "count_all_first" => TRUE,
                "status" => STATUS_ACTIVE,
            ))['total'];

            //check if this is only the last id in admin
            if ($total == 1) {
                $message['error_msg'] = 'Cannot delete the last Admin account. At least one admin account is needed to access the management site.';
                //encoding and returning.
                $this->output->set_content_type('application/json');
                echo json_encode($message);
                exit;
            }

            //get data admin
            $data = $this->User_model->get_all_data(array(
                "find_by_pk" => array($id),
                "status" => STATUS_ACTIVE,
                "row_array" => TRUE,
            ))['datas'];

            //no data is found with that ID.
            if (empty($data)) {
                $message['error_msg'] = 'Invalid ID.';

            } else {

                //begin transaction
                $this->db->trans_begin();

                //delete the data (deactivate)
                $condition = array("user_id" => $id);
                $delete = $this->User_model->delete($condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();

                    //failed.
                    $message['error_msg'] = 'database operation failed';
                } else {
                    $this->db->trans_commit();
                    //success.
                    $message['is_error'] = false;
                    $message['error_msg'] = '';

                    //growler.
                    $message['notif_title'] = "Done!";
                    $message['notif_message'] = "Admin has been delete.";
                    $message['redirect_to'] = "";
                }
            }

        } else {
            //id is not passed.
            $message['error_msg'] = 'Invalid ID.';
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * Reactivate an admin.
     */
    public function reactivate() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('User_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = sanitize_str_input($this->input->post('id'), "numeric");

        //check first.
        if (!empty($id) && is_numeric($id)) {
            //get data admin
            $data = $this->User_model->get_all_data(array(
                "find_by_pk" => array($id),
                "status" => STATUS_DELETE,
                "row_array" => TRUE,
            ))['datas'];

            //no data is found with that ID.
            if (empty($data)) {
                $message['error_msg'] = 'Invalid ID.';

            } else {

                //begin transaction
                $this->db->trans_begin();

                //delete the data (deactivate)
                $condition = array("user_id" => $id);
                $delete = $this->User_model->update(array("is_active" => STATUS_ACTIVE),$condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();

                    //failed.
                    $message['error_msg'] = 'database operation failed';
                } else {
                    $this->db->trans_commit();
                    //success.
                    $message['is_error'] = false;
                    $message['error_msg'] = '';

                    //growler.
                    $message['notif_title'] = "Done!";
                    $message['notif_message'] = "Admin has been re-activated.";
                    $message['redirect_to'] = "";
                }
            }

        } else {
            //id is not passed.
            $message['error_msg'] = 'Invalid ID.';
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

}
