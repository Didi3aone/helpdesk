<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	private $_title = "Report";
    private $_title_page = '<i class="fa-fw fa fa-user"></i> Report ';
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_view_folder = "report/";

	function __construct() {
		parent::__construct();

		$this->load->model('Dynamic_model');
	}

	public function index()
	{
		//set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Get Report</span>',
            "active_page"   => "GET",
            "breadcrumb"    => $this->_breadcrumb . '<li>Report</li>',
        );

        $data['bagian'] = $this->Dynamic_model->set_model("tbl_user_type","tut","type_id")->get_all_data()['datas'];
		$footer = array(
			"view_js_nav" => $this->_view_folder."rpt_js"
		);
		//load the views.
        $this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder.'index',$data);
        $this->load->view(MANAGER_FOOTER,$footer);
	}

	function show_report()
	{
		$start = $_REQUEST['start_date'];
		$end   = $_REQUEST['end_date'];
		$bagian = $_REQUEST['bagian'];

		$data['keuangan'] = $this->_get_data_keuangan($start, $end, $bagian);
		$data['kemahasiswaan'] = $this->_get_data_kemahasiswaan($start, $end, $bagian);

		if( $bagian == 1 ) {
			$this->load->view($this->_view_folder.'show_report_keuangan',$data);
		} else {
			$this->load->view($this->_view_folder.'show_report_kemahasiswaan',$data);
		}

	}

	function show_excel()
	{	
		$start = $_REQUEST['start_date'];
		$end   = $_REQUEST['end_date'];
		$bagian = $_REQUEST['bagian'];

		$data['keuangan'] = $this->_get_data_keuangan($start, $end, $bagian);
		$data['kemahasiswaan'] = $this->_get_data_kemahasiswaan($start, $end, $bagian);

		if( $bagian == 1 ) {
			$name = ($bagian == 1) ? "Rpt_Keuangan" : "";
			header('Content-Type: application/force-download');
			header('Content-disposition: attachment; filename="'.$name.date('Ymd').'".xlsx');
			// Fix for crappy IE bug in download.
			header("Pragma: ");
			header("Cache-Control: ");
			$this->load->view($this->_view_folder.'show_report_keuangan',$data);
		} else {
			$name = ($bagian == 2) ? "Rpt_Kemahasiswaan" : "";
			header('Content-Type: application/force-download');
			header('Content-disposition: attachment; filename="'.$name.date('Ymd').'".xlsx');
			// Fix for crappy IE bug in download.
			header("Pragma: ");
			header("Cache-Control: ");
			$this->load->view($this->_view_folder.'show_report_kemahasiswaan',$data);
		}

	}

	function _get_data_keuangan($start, $end, $bag)
	{
		$sql = "
			SELECT tc.* ,mf.*,mm.*
			FROM tbl_complain tc
			JOIN mst_fakultas mf ON mf.FakultasId = tc.ComplainFakultasId
			JOIN mst_mahasiswa mm ON mm.MahasiswaId = tc.ComplainMahasiswaId
			WHERE 
				DATE(tc.ComplainCreatedDate) >= '$start' AND DATE(tc.ComplainCreatedDate) <= '$end'
				AND tc.ComplainToId='$bag'
			ORDER BY tc.ComplainId DESC";
		$query = $this->db->query($sql);
		// echo $query;
		return $query;
	}

	function _get_data_kemahasiswaan($start, $end, $bag)
	{
		$sql = "
			SELECT tc.* ,mf.*,mm.*
			FROM tbl_complain tc
			JOIN mst_fakultas mf ON mf.FakultasId = tc.ComplainFakultasId
			JOIN mst_mahasiswa mm ON mm.MahasiswaId = tc.ComplainMahasiswaId
			WHERE 
				DATE(tc.ComplainCreatedDate) >= '$start' AND DATE(tc.ComplainCreatedDate) <= '$end'
				AND tc.ComplainToId= '$bag'
			ORDER BY tc.ComplainId DESC";
	}
}

/* End of file Report.php */
/* Location: ./application/modules/report/controllers/Report.php */