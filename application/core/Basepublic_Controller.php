<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Basepublic_Controller extends MX_Controller {

    //protected var for current user login.
    protected $_currentUser;
    protected $_secure;

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
        if ($this->session->has_userdata(USER_SESSION)) {
            $this->_currentUser = $this->session->sess_login_user;
        }

        if (!isset($this->_currentUser)) {
            redirect("/login");
        }
    }


}
