<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Complaint Controller.
 *
 */
class Complaint extends MX_Controller {

	private $_title = "Complain";
    private $_title_page = '<i class="fa-fw fa fa-user"></i> Complain ';
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page = "Complain";
    private $_back = "/Complaint";
    private $_view_folder = "complaint/";
    private $_view_folder_js = "complaint/javascript/";
    private $_dm;

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();

        $this->load->model('Dynamic_model');
        $this->_dm = new Dynamic_model();

    }

    /**
    * list complaint
    */
	public function index()
	{
		//set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Complain</span>',
            "active_page"   => "list",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "/js/plugins/datatables/jquery.dataTables.min.js",
                "/js/plugins/datatables/dataTables.bootstrap.min.js",
                "/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $footer);
	}

    /**
     * view an admin
     */
    public function view ($id = null) {
        $this->_breadcrumb .= '<li><a href="">Complain</a></li>';

        //load the model.
        $this->load->model('Dynamic_model');
        $data['item'] = null;

        $params = array("row_array" => true,"conditions" => array("ComplainId" => $id));
        //get the data.
        $data['item'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data($params)['datas'];

        $condition = array("ComplainId" => $id);
        $result = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->update(
            array(
            "ComplainIsRead" => STATUS_READ_COMPLAIN,
            ),$condition
        );

        // pr($result);exit;
        $data['status'] = $this->Dynamic_model->set_model('trs_status_complain','tsc','StatusId')->get_all_data(array("conditions" => array("tsc.StatusId NOT IN(1) " => null)))['datas'];

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> View Complain</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>View Complain</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "script"      => array(
                "assets/js/plugins/tinymce/tinymce.min.js",
                // "assets/js/plugin/summernote/summernote.min.js"
            ),
            "view_js_nav" => $this->_view_folder_js . "update_js"
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'view', $data);
        $this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * view an admin
     */
    public function view_status ($id = null) {
        $this->_breadcrumb .= '<li><a href="">Complain</a></li>';

        //load the model.
        $this->load->model('Dynamic_model');
        $data['item'] = null;

        $params = array("row_array" => true,"conditions" => array("ComplainId" => $id));
        //get the data.
        $data['item'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data($params)['datas'];

        $condition = array("ComplainId" => $id);

        // pr($result);exit;
        $data['status'] = $this->Dynamic_model->set_model('trs_status_complain','tsc','StatusId')->get_all_data(array("conditions" => array("tsc.StatusId NOT IN(1) " => null)))['datas'];

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> View Complain</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>View Complain</li>',
            "back"          => $this->_back,
        );

        $footer = array();

        //load the view.
        $this->load->view(MANAGER_HEADER_MAHASISWA, $header);
        $this->load->view($this->_view_folder . 'view-status', $data);
        $this->load->view(MANAGER_FOOTER_MAHASISWA, $footer);
    }

    /**
    * list complaint
    */
    public function list_all_complain()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Complain keuangan</span>',
            "active_page"   => "list-keuangan",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain Keuangan</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_all_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-all');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_keuangan()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Complain keuangan</span>',
            "active_page"   => "list-keuangan",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain Keuangan</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_keuangan_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-keuangan');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_kemahasiswaan()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Complain Kemahasiswaan</span>',
            "active_page"   => "list-kemahasiswaan",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_kemahasiswaan_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-kemahasiswaan');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_akademik()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Complain Akademik</span>',
            "active_page"   => "list-akademik",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_akademik_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-akademik');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_sdm()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Complain SDM</span>',
            "active_page"   => "list-sdm",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_sdm_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-sdm');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_alumni()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Complain Alumni</span>',
            "active_page"   => "list-alumni",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_alumni_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-alumni');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function list_umum()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Complain UMUM</span>',
            "active_page"   => "list-umum",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_umum_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index-umum');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
    * list complaint
    */
    public function tracking_state()
    {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Tracking Complain</span>',
            "active_page"   => "list-tracking",
            "breadcrumb"    => $this->_breadcrumb . '<li>Complain</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            ),
            "view_js_nav" => $this->_view_folder_js ."list_tracking"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER_MAHASISWA , $header);
        $this->load->view($this->_view_folder . 'tracking-complain');
        $this->load->view(MANAGER_FOOTER_MAHASISWA , $footer);
    }

	/**
     * Create an complaint
     */
    public function create () {
        $this->_breadcrumb .= '<li><a href="/complaint">Complain</a></li>';

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Form Complain</span>',
            "active_page"   => $this->_active_page . "-create",
            "breadcrumb"    => $this->_breadcrumb . '<li>Form Complain</li>',
            "back"          => $this->_back,
        );

        $data['fakultas'] = $this->_dm->set_model("mst_fakultas","mf","FakultasId")->get_all_data()['datas'];
        $data['type']	  = $this->_dm->set_model("tbl_user_type","tut","type_id")->get_all_data(array(
            "conditions" => array("type_id NOT IN(7)" => NULL)
        ))['datas'];
		// pr($data)

        $footer = array(
			"script"   	  => array(
				// "assets/js/plugins/tinymce/tinymce.min.js",
                "assets/js/plugin/summernote/summernote.min.js"
			),
            "view_js_nav" => $this->_view_folder_js . "create_js"
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create',$data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
    * private class server side validation
    */
    private function _set_rule_validation() {
    	$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_rules("title","Title","required");
		$this->form_validation->set_rules("fakultas_id","Fakultas","required");
    }

     /**
     * Function to get list_all_data admin
     */
    public function list_all_data_root() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_KEUANGAN);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_datas() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_KEMAHASISWAAN);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_akademik() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_AKADEMIK);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_sdm() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));
        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_SDM);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_alumni() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead =1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );
        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));
        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_ALUMNI);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_umum() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'mm.user_full_name',
            'mm.user_nim',
            'mf.FakultasName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'IF(tc.ComplainIsRead = 1,"READ","UNREAD") as status',
            'tsc.StatusName'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainToId" => BAGIAN_UMUM);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'joined'            => $joined,
            'left_joined'       => $left_joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

    public function list_all_data_tracking() {
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
            'tc.ComplainId',
            'tc.ComplainName',
            'tut.type_name',
            'tc.ComplainCreatedDate',
            'tsc.StatusName as status'
        );

        $joined = array(
            "tbl_user_type tut" => array("tut.type_id" => "tc.ComplainToId"),
            "tbl_user mm"  => array("mm.user_id" => "tc.ComplainUserId"),
            "mst_fakultas mf"   => array("mf.FakultasId"  => "tc.ComplainFakultasId")
        );

        $left_joined = array("trs_status_complain tsc" => array("tsc.StatusId" => "tc.ComplainStatusId"));

        $column_sort = $select[$sort_col];

        $id_mhs = $this->session->userdata("user_id");
        //initialize.
        $data_filters = array();
        $conditions = array("tc.ComplainUserId" => $id_mhs);
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(mm.user_full_name)'] = $value;
                        }
                        break;

                    case 'nim':
                        if ($value != "") {
                            $data_filters['lower(mm.user_nim)'] = $value;
                        }
                        break;

                    case 'fakultas':
                        if ($value != "") {
                            $data_filters['lower(mf.FakultasName)'] = $value;
                        }
                        break;

                    case 'bagian':
                        if ($value != "") {
                            $data_filters['lower(tut.type_name)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'tanggal':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(tc.ComplainCreatedDate as date) <="] = $date['end'];
                            $conditions["cast(tc.ComplainCreatedDate as date) >="] = $date['start'];

                        }
                        break;
                        
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
            'select'            => $select,
            'left_joined'       => $left_joined,
            'joined'            => $joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            'debug'             => false
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

        //load form validation lib.
        $this->load->library('form_validation');

        //initial.
        $message['is_error'] = true;
		$message['error_msg'] = "";
        $message['redirect_to'] = "";

        //sanitize input (id is primary key, if from edit, it has value).
        $id             = $this->input->post('id');
        $title          = $this->input->post('title');
        $fak_id         = $this->input->post('fakultas_id');
        $to_id          = $this->input->post('to_id');
        $desc           = $this->input->post('desc');
        $note           = $this->input->post('note');
        $StatusId       = $this->input->post('StatusId');
        $now            = date('Y-m-d H:i:s');
        $mahasiswa      = $this->session->userdata('user_id');


        //server side validation.
        $this->_set_rule_validation();

        //checking.
        if ($this->form_validation->run($this) == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();

        } else {

            //begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $_save_data = array(
                "ComplainName" 			=> $title,
                "ComplainFakultasId" 	=> $fak_id,
                "ComplainToId"       	=> $to_id,
                "ComplainDesc"		 	=> $desc,
                "ComplainUserId" 	    => $mahasiswa
            );

            //insert or update?
            if ($id == "") {
                //insert to DB.
				// pr($this->input->post());exit;
                $_save_data['ComplainCreatedDate']  = $now;
                $_save_data["ComplainStatusId"]     = STATUS_SEND_COMPLAIN;
                $_save_data["ComplainRemark"]       = $note;
                $result = $this->_dm->set_model("tbl_complain","tc","ComplainId")->insert($_save_data);

                $this->_dm->set_model("tbl_log_complain","tlc","complain_id")->insert(array(
                    "log_name" => "COMPLAIN",
                    "log_complain_id" => $result,
                    "log_mhs_id"   => $mahasiswa,
                    "log_status_id" => STATUS_SEND_COMPLAIN,
                    "log_date"      => $now
                ));
                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $message['is_error'] = false;

                    //success.
                    //set title notif , message and url redirect
                    $message['notif_title'] 	= "SUCCESS !!!";
                    $message['notif_message'] 	= "Complain has been sent.";
                    $message['redirect_to'] 	= "";
                }
            } else {
                // pr($this->input->post());exit;
                //update.
                $_save_data['ComplainUpdatedDate']  = $now;
                $_save_data["ComplainStatusId"]     = $StatusId;
                $_save_data["ComplainRemark"]       = $note;

                //condition for update.
                $condition = array("ComplainId" => $id);
                $result = $this->_dm->set_model("tbl_complain","tc","ComplainId")->update($arrayToDB, $condition);

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
                    $message['notif_message'] = "Complain has been updated.";

                    //on update, redirect.
                    $message['redirect_to'] = "";
                }
            }
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    public function update_complain()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load form validation lib.
        $this->load->library('form_validation');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";
        
        //sanitize input (id is primary key, if from edit, it has value).
        $id             = $this->input->post('id');
        $title          = $this->input->post('title');
        $fak_id         = $this->input->post('fakultas_id');
        $to_id          = $this->input->post('to_id');
        $desc           = $this->input->post('desc');
        $note           = $this->input->post('note');
        $StatusId       = $this->input->post('StatusId');
        $now            = date('Y-m-d H:i:s');
        $followupid     = $this->session->userdata('user_id');


        //server side validation.
        $this->form_validation->set_rules('note','Note','required');
        $this->form_validation->set_rules('StatusId','Status','required');

        //checking.
        if ($this->form_validation->run() == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();

        } else {
            $_save_data['ComplainUpdatedDate']  = $now;
            $_save_data["ComplainStatusId"]     = $StatusId;
            $_save_data["ComplainRemark"]       = $note;
            $_save_data["ComplainFollowUpId"]   = $followupid;

            $condition = array(
                "ComplainId" => $id
            );
            
            $result = $this->_dm->set_model("tbl_complain","tc","ComplainId")->update($_save_data, $condition);

            if( $result )
            {
                $name = $this->_dm->set_model("tbl_user","tu","user_id")->get_all_data(array(
                    "conditions" => array("user_id" => $followupid),
                    "row_array"  => true
                ));

                $this->_dm->set_model('tbl_log_complain','tlc','log_id')->update(array(
                    // "log_complain_id" => $id,
                    "log_name"              => "COMPLAIN FOLLOW UP BY USER ID (".$name['user_name'].")",
                    "log_status_id"         => $StatusId,
                    "log_complain_aprv_id"  => $followupid
                ),array("log_complain_id" => $id));

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
                    $message['notif_message'] = "Complain has been updated.";

                    //on update, redirect.
                    $message['redirect_to'] = "";
                }
            }

            $message['error_msg'] = 'Invalid ID.';
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
            $condition = array("ComplainId" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->delete($condition);

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
                $message['notif_message'] = "Complain has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}

/* End of file Complaint_manager.php */
/* Location: ./application/modules/complaint/controllers/Complaint_manager.php */
