<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	private $_title = "Jurusan";
    private $_title_page = '<i class="fa-fw fa fa-user"></i> Jurusan ';
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page = "jurusan-";
    // private $_js_path = "assets/js/pages/Fakultas/";
    private $_view_folder = "jurusan/";
    private $_view_folder_js = "jurusan/javascript/";

	public function __construct() {
        parent::__construct();

    }

    //////////////////////////////// VIEWS //////////////////////////////////////
    /**
     * List 
     */
    public function index() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Jurusan</span>',
            "active_page"   => $this->_active_page."list",
            "breadcrumb"    => $this->_breadcrumb . '<li>Jurusan</li>',
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
     * Create an admin
     */
    public function create () {
        $this->_breadcrumb .= '<li><a href="user">Jurusan</a></li>';

        $this->load->model('Dynamic_model');

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Create Jurusan</span>',
            "active_page"   => $this->_active_page."create",
            "breadcrumb"    => $this->_breadcrumb . '<li>Create Jurusan</li>',
        );


        $footer = array(
            "view_js_nav" => $this->_view_folder_js . "create_js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create');
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Edit an admin
     */
    public function edit ($id = null) {
        $this->_breadcrumb .= '<li><a href="'.site_url('user').'">Jurusan</a></li>';

        //load the model.
		$this->load->model('Dynamic_model');
        //initials
        $data['datas'] = null;
        
        $data['datas'] = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->get_all_data(
        	array( 
        		"conditions" => array("JurusanId" => $id),
        		"row_array"  => true
        	)
        )['datas'];
        // pr($data['datas']);exit();
        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Edit Jurusan</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>Edit Jurusan</li>',
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
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
		$sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
		$limit = sanitize_str_input($this->input->get("length"), "numeric");
		$start = sanitize_str_input($this->input->get("start"), "numeric");
		$search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

		$select = array(
           'JurusanId',
           'JurusanCode',
           'JurusanName',
           'IF(JurusanIsActive=1,"Active","Nonactive") as IsActive'
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
                    case 'kode':
                        if ($value != "") {
                            $data_filters['lower(JurusanCode)'] = $value;
                        }
                        break;

                    case 'nama':
                        if ($value != "") {
                            $data_filters['lower(JurusanName)'] = $value;
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->get_all_data(array(
			'select' => $select,
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
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
		$message['error_msg'] = "";
        $message['redirect_to'] = "";

        $id             = $this->input->post('id');
        $name           = $this->input->post('kode');
        $desc           = $this->input->post('desc');

        $this->form_validation->set_rules("kode","Kode Fakultas","required");
        $this->form_validation->set_rules("desc","Nama Fakultas","required");

        //checking.
        if ($this->form_validation->run() == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();

        } else {

            //begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $_save_data = array(
                "JurusanCode" => $name,
                "JurusanName" => $desc
            );

            //insert or update?
            if ($id == "") {
                // $_save_data[''] = date('Y-m-d H:i:s');
                //insert to DB.
                $result = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->insert($_save_data);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $message['is_error'] = false;

                    $message['notif_title']     = "Good!";
                    $message['notif_message']   = "New Jurusan has been added.";
                    $message['redirect_to']     = site_url("fakultas");
                }

            } else {
                //update.

                // $_save_data['FakultasUpdatedDate'] = date("Y-m-d H:i:s");
                //condition for update.
                
                $condition = array("JurusanId" => $id);
                $result = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->update($_save_data,$condition);

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
                    $message['notif_message'] = "Jurusan has been updated.";
                    $message['redirect_to'] = site_url("jurusan");
                }
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an admin.
     */
    public function delete() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //no data is found with that ID.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("JurusanId" => $id);
            $delete = $this->Dynamic_model->set_model("mst_jurusan","mj","JurusanId")->delete($condition);

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
                $message['notif_message'] = "Jurusan has been delete.";
                $message['redirect_to'] = "";
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}

/* End of file Jurusan.php */
/* Location: ./application/modules/jurusan/controllers/Jurusan.php */