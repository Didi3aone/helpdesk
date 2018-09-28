<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	function run($module = '', $group = '') {
		(is_object($module)) AND $this->CI =& $module;
		return parent::run($group);
	}

	//function to validate if string is match with the regex.
	//"cannot contain the characters in the regex".
	function have_special_char($str) {
		if (preg_match(SPECIAL_CHARACTER, $str)) {
			   $this->set_message('have_special_char', '{field} cannot use any special characters ('.SPECIAL_CHARACTER_INFO.').');
		   return false;
		} else {
		   return true;
		}
    }

}