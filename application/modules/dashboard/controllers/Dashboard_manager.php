<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller.
 * For Dashboard admin
 */
class Dashboard_manager extends MX_Controller  {
    private $_title = "Dashboard";
    private $_title_page = '<i class="fa-fw fa fa-home"></i> Dashboard ';
    private $_active_page = "dashboard";
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Dashboard</a></li>";
    private $_back = "";
    private $_js = "";
    private $_view_folder = "dashboard/";
    private $_view_folder_js = "dashboard/javascript/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('Dynamic_model');
        if($this->session->userdata(IS_LOGIN_ADMIN) == FALSE) {
            redirect('manager/auth');
        }
    }

    public function index() {

        $data['keuangan'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_KEUANGAN),
            )
        );

        $data['kemahasiswaan'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_KEMAHASISWAAN),
            )
        );

        $data['akademik'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_AKADEMIK),
            )
        );

        $data['sdm'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_SDM),
            )
        );

        $data['alumni'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_ALUMNI),
            )
        );

        $data['umum'] = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
                "count_all_first" => true,
                "conditions"      => array("tc.ComplainToId" => BAGIAN_UMUM),
            )
        );


        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> My Dashboard</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb,
        );

        $footer = array(
            "script" => array(
                "assets/js/plugins/smart-chat-ui/smart.chat.ui.min.js",
                "assets/js/plugins/smart-chat-ui/smart.chat.manager.min.js",
                "assets/js/plugins/chartjs/chart.min.js"
            ),
            "view_js_nav" => $this->_view_folder_js ."chart_js"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER,$header);
        $this->load->view($this->_view_folder . 'index',$data);
        $this->load->view(MANAGER_FOOTER, $footer);
    }

}
