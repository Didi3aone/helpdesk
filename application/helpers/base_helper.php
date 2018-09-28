<?php

// Function to get the client IP address.
function get_client_ip() {
    $ipaddress = null;
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = null;
    return $ipaddress;
}

// function to validate response token from google recaptcha v2.
function validate_google_recaptcha($responseToken = null) {
	if ($responseToken == null) return false;

	$clientIP = get_client_ip();
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=".GOOGLE_RECAPTCHA_SECRET_KEY."&response=".$responseToken."&remoteip=".$clientIP;
	$res = json_decode(file_get_contents($url), true);

	if ($res) {
		if (!$res['success']) {
			//failed.
			return false;
		} else {
			//success.
			return true;
		}
	} else {
		return false;
	}
}

//convert Bytes to KB or MB
function convert_bytes_to_kb_or_mb ($totalByte) {
    $bytes = $totalByte;
    $kb = $bytes / 1024;
    $mb = $kb / 1024;

    if ($mb < 1) {
        return round($kb,2) . " KB";
    } else {
        return round($mb,2) . " MB";
    }
}

/**
 * check special char
 */
function have_special_char ($string) {
    if (preg_match(SPECIAL_CHARACTER, $string)) {
        // one or more of the 'special characters' found in $string
        return TRUE;
    }

    return FALSE;
}

/**
 * check null, space
 */
function check_null_space ($string) {
    if (trim($string) == null || trim($string) == "") {
        return TRUE;
    }

    return FALSE;
}

/**
 * PRINT_R HELPER FUNCTION.
 */
function pr($something) {
	echo "<pre>";print_r($something);echo "</pre>";
}

/**
 * PRINT_R HELPER FUNCTION TO PRINT QUERY BEFORE EXECUTING.
 * PASS $THIS->DB to the PARAM.
 */
function pq($db) {
    echo "<pre>";print_r($db->get_compiled_select());echo "</pre>";
}

/**
 * array merge function.
 * will merge or "+" between $array1 with $array2.
 * default is to merge the array using array_merge.
 */
function am($array1, $array2, $should_merge = true) {
    if ($should_merge) {
        return array_merge($array1, $array2);
    } else {
        return $array1 + $array2;
    }
}

/**
 * FUNCTION TO CONVERT STRTOTIME value to DATETIME using PHP DATE FORMAT.
 */
function dateformat($datetime) {
	return ($datetime) ? date('d F Y H:i:s',strtotime($datetime)) : "-";
}

/**
 * FUNCTION TO CONVERT date value to DATE using PHP DATE FORMAT.
 */
function dateformatonly($date) {
	return (strtotime($date) != "" && strtotime($date) != -62170010400) ? date('F d,Y',$date) : "-";
}

/**
 * helper function to change date format from database output into something else.
 * the default "date" format from database is Y-m-d.
 * ONLY FOR DATE, not DATETIME.
 * reff: http://php.net/manual/en/function.date.php
 */
function dateformatforview($date, $format = "d/m/Y") {

    if ($date == "0000-00-00" || $date == null) return null;

    $date1 = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    $date2 = DateTime::createFromFormat('Y-m-d', $date);

    if ($date1 && is_a($date1, "Datetime")) {
        return $date1->format($format);
    }
    if ($date2 && is_a($date2, "Datetime")) {
        return $date2->format($format);
    }

    return date("d/m/Y");   //jadi hari ini kalau dr sumbernya null / error.
}

/**
 * FUNCTION TO VALIDATE DATE FORMAT TO INSERT or UPDATE to database.
 */
function validate_date_input($date) {
    //do some conversion from d/m/Y format to strtotime compatible.
    $date = DateTime::createFromFormat('d/m/Y', $date);
    if ($date) {
        $date = $date->format("d-m-Y");
    	return (strtotime($date) != "" && date('Y-m-d',strtotime($date)) != "1900-01-01") ? date("Y-m-d", strtotime($date)) : null;
    } else {
        return null;
    }
}

/**
 * FUNCTION TO VALIDATE Null
 */
function validate_null($string) {
	return ($string != "") ? $string : "";
}

/**
 * FUNCTION TO PARSE A DATE RANGE FROM A SINGLE STRING.
 * format is must like this: dd/mm/yyyy ~ dd/mm/yyyy
 * will return null if not valid.
 * and will return array [start] and [end] in yyyy-mm-dd format (used in mysql).
 */
function parse_date_range($date_range = null) {
    //validate.
    if ($date_range == null) return null;

    //split the range.
    $splitted = explode(' ~ ', $date_range);

    //if not start ~ end.
    if (count($splitted) != 2) return null;

    //parse it.
    $a = DateTime::createFromFormat('d/m/Y', $splitted[0]);
    $b = DateTime::createFromFormat('d/m/Y', $splitted[1]);

    //if failed to parse.
    if ($a === FALSE || $b === FALSE) return null;

    //revalidate and re-format.
    $return['start'] = validate_date_input($a->format('d/m/Y'));
    $return['end'] = validate_date_input($b->format('d/m/Y'));

    return $return;
}

/**
 * Function to sanitize form input, ajax input, or else.
 * used mainly for string input, at default will replace anything except:
 * a-z A-Z 0-9 - _ . , space / ~ : @ ? ( )'
 * become empty string ""
 * TYPE :
 * numeric, string, date, daterange, array, [1 => val, 2 => val, 3 => val], "1,2",
 */
function sanitize_str_input($str = NULL, $type = "string", $regex = "/[^a-zA-Z0-9\/~\-_.():@,?\'\s]+/") {
    switch ($type) {
        case 'string':
            $str = trim($str);
            return preg_replace($regex, "", $str);
            break;

        case 'numeric':
            if (is_numeric($str) === FALSE) return null;
            return $str;
            break;

        case 'date':
            return validate_date_input($str);
            break;

        case 'daterange':
            return parse_date_range($str);
            break;

        case 'array':
            if (is_array($str) === FALSE) return null;
            return $str;
            break;

        default:
            if (is_array($type)) {
                if (array_key_exists($str, $type)) {
                    return $str;
                } else {
                    return null;
                }
            } else if (count(explode(",",$type)) > 0) {
                $data = explode(",",$type);
                if (array_search($str, $data) === FALSE) {
                    return null;
                } else {
                    return $str;
                }
            }
            break;
    }

    return preg_replace($regex, "", $str);
}


/**
 * Check API KEY if it is valid (exists in DB) or not.
 */
function check_api_key($api_key) {
    $ci = & get_instance();
	$ci->load->model('user/User_model');
    $check_apikey = $ci->User_model->get_all_data(array("conditions" => array("api_key" => $api_key), "row_array" => true));

    if ($check_apikey):
        return $check_apikey;
    else :
        return false;
    endif;
}


/**
 * Send Email
 * @param array $params (from,to, bcc, cc, subject, message, attachment)
 * @param BOOLEAN $html FALSE / TRUE
 * from => array("email" => "aaa", "name" => "bbb");
 * to => array("email@email.com","email2@email.com");
   //bcc can be null or not sent
   bcc => array("email@email.com","email2@email.com");
   //cc can be null or not sent
   cc => array("email@email.com","email2@email.com");
   //reply_to can be null or not sent
   reply_to => array("email" => "aaa", "name" => "bbb");
   subject => string
   message => string
   //attachment can be null or not sent
   attachment => array("file1.pdf","file2.pdf");
 */
function sendmail($params,$html = false) {
	$ci = & get_instance();
	$ci->load->library('email');

	if ($html == true) {
		$config['mailtype'] = 'html';
		$ci->email->initialize($config);
	}

	if (!isset($params['from']['email'])) $params['from']['email'] = DEFAULT_EMAIL_FROM;
	if (!isset($params['from']['name'])) $params['from']['name'] = DEFAULT_EMAIL_FROM_NAME;
	if (!isset($params['from']['return_path'])) $params['from']['return_path'] = DEFAULT_EMAIL_RETURN_PATH;

	if (isset($params['from'])) {
		$ci->email->from($params['from']['email'], $params['from']['name'], $params['from']['return_path']);
	}

	if (isset($params['reply_to'])) {
		$ci->email->reply_to($params['reply_to']['email'], $params['reply_to']['name']);
	}

	if (isset($params['to'])) {
		$ci->email->to($params['to']);
	}

	if (isset($params['cc'])) {
		$ci->email->cc($params['cc']);
	}

	if (isset($params['bcc'])) {
		$ci->email->bcc($params['bcc']);
	}

	if (isset($params['subject'])) {
		$ci->email->subject($params['subject']);
	}

	if (isset($params['message'])) {
		$ci->email->message($params['message']);
	}

	if (isset($params['attachment'])) {
		$ci->email->attach($params['attachment']);
	}

	if ( ! $ci->email->send()) {
		// Generate error
		return [
			"is_error" => true,
			"error_message" => "Email not send."
		];
	} else {
		return [
			"is_error" => false,
			"error_message" => "Email sent."
		];
	}
}

function searchForId($id, $array, $string) {
	   foreach ($array as $key => $val) {
		   if ($val[$string] === $id) {
			   return $key;
		   }
	   }
	   return null;
}

function searchForIdInt($id, $array, $string) {
	   foreach ($array as $key => $val) {
		   if ($val[$string] == $id) {
			   return $key;
		   }
	   }
	   return null;
}

function dash_punctuation($string) {
    $s = strtolower($string);
    # to keep letters & numbers
    $s = preg_replace('/[^a-z0-9]+/i', '-', $s); # or...
    $s = preg_replace('/[^a-z\d]+/i', '-', $s);

    return $s;
}

function trimstr($string, $length=25, $method='WORDS', $pattern='...') {
    if (!is_numeric($length)) {
            $length = 25;
        }

    if (strlen($string) < $length) $pattern = "";

    if (strlen($string) <= $length) {
            return rtrim($string) . $pattern;
        }

    $truncate = substr($string, 0, $length);

    if ($method != 'WORDS') {
            return rtrim($truncate) . $pattern;
        }

    if ($truncate[$length-1] == ' ') {
            return rtrim($truncate) . $pattern;
        }
        // we got ' ' right where we want it

    $pos = strrpos($truncate, ' ');
        // lets find nearest right ' ' in the truncated string

    if (!$pos) { return $pattern; }
        // no ' ' (one word) or it resides at the very begining
        // of the string so the whole string goes to the toilet



    return rtrim(substr($truncate, 0, $pos)) . $pattern;
        // profit
}

function oneSentence ($string) {
	//get first of .
	$key = strpos($string,".");
	return substr($string,0,$key+1);
}

/**
 * Function to sanitize DB input.
 * (if you don't use query builder or cannot use its automatic sanitazion).
 * @param $is_like if you need to use as "like '%...%'" for example.
 */
function x($str = NULL, $is_like = false) {
    if ($str == NULL || empty($str)) return NULL;
    $ci = & get_instance();
    if ($is_like) {
        return $ci->db->escape_like_str($str);
    } else {
        return $ci->db->escape($str);
    }
}



/****************************************************
 * ONLY THIS PROJECT HELPERS
 *****************************************************/