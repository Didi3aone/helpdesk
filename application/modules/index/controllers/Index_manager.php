<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Index Controller.
 * For Login, Logout, Forgot Password, Reset Password
 */
class Index_manager extends MX_Controller  {

    private $_view_folder = "index/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();
        //get method.
        $method = $this->router->fetch_method();

        if($method == "login" && $this->session->has_userdata(IS_LOGIN_ADMIN)) {
            //redirect to dashboard
            redirect('/dashboard_manager');
        }
    }


    /**
	 * login controller and for login form processing.
	 */
	public function login() {
        //load library and model.
		$this->load->library('form_validation');
        $this->load->model("user/User_model");

        //set validations rules.
        $this->form_validation->set_rules("username", "Username", "trim|required");
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
            $username 	= $this->input->post("username");
            $password	= sha1($this->input->post("password"));

			//check to the model if the username, email and password is correct.
			$result = $this->User_model->check_login($username, $password);

			//validate result.
			if ($result) {
            	// pr($result);exit;
                //set session user (for login).
                $sess_data = array(
                	"IS_LOGIN_ADMIN" => TRUE,
                	"name"	   		 => $result['user_name'],
                	"email"	   		 => $result['user_email'],
                	"password"		 => $result['user_password'],
                	"user_id"		 => $result['user_id'],
                	"level"			 => $result['role_name'],
                	"user_type"		 => $result['type_name']
                );
                // pr($sess_data);exit;
                $this->session->set_userdata($sess_data);
                $this->User_model->update(array(
                    "user_login_time" => date("Y-m-d H:i:s"),
                    "user_is_login"   => STATUS_LOGIN
                ),array("user_id" => $result['user_id']));

                //redirect to library module
                redirect('manager');

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

	public function user_registration ()
	{
		$header = array();
		$footer = array();

		//load the views
        $this->load->view(MANAGER_HEADER_REGIS ,$header);
        $this->load->view($this->_view_folder . 'register');
        $this->load->view(MANAGER_FOOTER_REGIS,$footer);
	}


	/**
	 * Logout function.
	 */
	public function logout() {
        //unset sessions and back to login.
        $this->session->unset_userdata(IS_LOGIN_ADMIN);
		redirect('manager/auth');
	}


	/**
	 * Forgot password (reset password function).
	 * it will send the "reset password" email from here.
	 */
	public function forgot_password() {

		//load library and model.
		$this->load->library('form_validation');
        $this->load->model("admin/User_model");

        //set validations rules.
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");

        $footer = array("script" => '/js/pages/index/login.js');
        $header = array("title" => 'Forgot Password');

		//check for validation.
        if ($this->form_validation->run() == FALSE){

        	//send error message to view.
			$error_message = validation_errors();
			$this->session->set_flashdata('message', $error_message);
			$this->session->set_flashdata('alert', 'danger');

		} else {

            //get the posted values
            $email = $this->input->post("email");

			//check to the model if the email is correct.
			$result = $this->User_model->get_all_data(array(
                "row_array" => TRUE,
                "conditions" => array("email" => $email),
            ))['datas'];

			//validate result.
			if ($result) {
                //send email to reset password.

                //using transaction.
				$this->db->trans_begin();

                //create an url which the user can click to reset their password.
				$forgot_link = $this->User_model->send_forgot_pass($result);

                //end transaction.
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();

                    //error something.
					$this->session->set_flashdata('message', 'There is something wrong. Please retry input your email.');
					$this->session->set_flashdata('alert', 'danger');

				} else {
                    //success and commiting.
					$this->db->trans_commit();

					//send email to user with the reset password link.
                    //get content from view
                    $content = $this->load->view('layout/email/forgot_password', '', true);
                    $content = str_replace('%NAME%',$result['name'],$content);
                    $content = str_replace('%LINK%',$forgot_link,$content);

					$mail = sendmail (array(
						'subject'	=> SUBJECT_RESET_PASSWORD,
						'message'	=> $content,
						'to'		=> array($result['email']),
					), "html");

					//success, info to check user email.
					$this->session->set_flashdata('message', 'Please check your email to reset your password.');
					$this->session->set_flashdata('alert', 'success');
				}

			} else {
				//invalid email.
				$this->session->set_flashdata('message', 'Email is wrong.');
				$this->session->set_flashdata('alert', 'danger');
            }
		}

        //load the views.
		$this->load->view(MANAGER_HEADER_SIGNIN ,$header);
		$this->load->view($this->_view_folder . 'forgot-password');
		$this->load->view(MANAGER_FOOTER_SIGNIN ,$footer);
	}

	/**
	 * function to reset password.
	 * from link in reset password email.
	 */
	public function reset_password($code) {

        //load model.
		$this->load->model('admin/User_model');

        //check code.
		if (!$code) {
			show_404();
		}

		//decode code.
		$code_decoded = base64_decode(urldecode($code));

		//check code if exist.
		$user = $this->User_model->checkCode($code_decoded);
		if (!$user) {
			show_404();
		}

        if ($user['end_forgotpass_time'] < strtotime("now")) {
            show_404();
        }

        //begin transaction.
		$this->db->trans_begin();

		//reset passsword.
		$new_pass = $this->User_model->reset_password($user);

        //end transaction.
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();

            //some kind of DB problem?
			show_404();

		} else {
            //success and commiting.
			$this->db->trans_commit();

			//send email for the newly generated password.
            //get content from view
            $content = $this->load->view('layout/email/reset_password', '', true);
            $content = str_replace('%NAME%',$user['name'],$content);
            $content = str_replace('%NEW_PASS%',$new_pass,$content);

			$mail = sendmail (array(
				'subject'	=> SUBJECT_PASSWORD_INFO,
				'message'	=> $content,
				'to'		=> array($user['email']),
			), "html");

			//close window
			echo "<script>window.close();</script>";
		}
	}

}
