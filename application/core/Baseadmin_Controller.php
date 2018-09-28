<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Baseadmin_Controller extends MX_Controller {

    //protected var for current user login.
    protected $_currentUser;
    protected $_secure;

    //this one is for Dynamic_model
    protected $_dm;

	/**
	 * Base controller constructor.
	 * this parent is used for every admin controllers.
	 */
    function __construct() {
        parent::__construct();

        //for securing public access.
        $this->_secure = false;

        //get controller.
        $controller = $this->router->fetch_class();

        //save current user if he is already logged in.
        if ($this->session->has_userdata(ADMIN_SESSION)) {
            $this->_currentUser = $this->session->sess_login_admin;
        }

        if (!isset($this->_currentUser)) {
            $url = uri_string();
            if (empty($url)) {
                redirect("/login");
            } else {
                redirect("/login?goto=".$url);
            }
        }

        //load and prepare Dynamic_model
        $this->load->model('Dynamic_model');
        $this->_dm = new Dynamic_model();
    }


}
