<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| OTHER CONSTANT
|--------------------------------------------------------------------------
|
|
*/
//-- DEFAULT PAGER AND LIMIT
define("PAGER_PAGE_LIMIT", 20);
define("LIMIT_SEARCH", 20);
define('DEFAULT_LINK_VALUE', 'javascript:void(0);');
define("DEFAULT_TITLE_MANAGER", "SYSTEM HELPDESK");

//image type width and height
define("UPLOAD_PATH", "upload");
define("UPLOAD_PATH_TANDA_TANGAN", "upload/tanda_tangan");
define("UPLOAD_PATH_SHAPEFILE", "upload/shapefile");
define("UPLOAD_PATH_ATTACHMENT", "upload/attachment");
define("UPLOAD_PATH_LIBRARY", "upload/library");

//-- FILES UPLOAD
define("FILE_TYPE_UPLOAD", "*");

define("MAX_UPLOAD_IMAGE_SIZE", 10485760);
define("MAX_UPLOAD_IMAGE_SIZE_IN_KB", 10240);
define("WORDS_MAX_UPLOAD_IMAGE_SIZE", "10 MB");

define("MAX_UPLOAD_FILE_SIZE", 104857600);
define("MAX_UPLOAD_FILE_SIZE_IN_KB", 102400);
define("WORDS_MAX_UPLOAD_FILE_SIZE", "100 MB");

define("MAX_IMPORT_FILE_SIZE", 5242880);
define("MAX_IMPORT_FILE_SIZE_IN_KB", 5120);
define("WORDS_MAX_IMPORT_FILE_SIZE", "5 MB");


//-- EMAIL
define("DEFAULT_EMAIL_FROM", "info@digistyles.com");
define("DEFAULT_EMAIL_FROM_NAME", "Info Digistyles");
define("DEFAULT_EMAIL_RETURN_PATH", "info@digistyles.com");

define("SUBJECT_RESET_PASSWORD", "Reset Password Information");
define("SUBJECT_PASSWORD_INFO", "Password Information");
define("SUBJECT_LOGIN_INFO", "Login Information");

//-- session
define("IS_LOGIN_ADMIN","IS_LOGIN_ADMIN");
define("IS_LOGIN_MAHASISWA","IS_LOGIN_MAHASISWA");

//-- Active not active
define("STATUS_ALL",-1);
define("STATUS_DELETE",0);
define("STATUS_ACTIVE",1);
define("STATUS_LOGIN", 1);

//-- Manager breadcrumbs
define("MANAGER_HOME", '/');
define("MANAGER_HEADER", 'layout/manager/headers/header');
define("MANAGER_FOOTER", 'layout/manager/footers/footer');
define("MANAGER_HEADER_SIGNIN", 'layout/login/header');
define("MANAGER_FOOTER_SIGNIN", 'layout/login/footer');
define("MANAGER_FOOTER_REGIS", 'layout/mahasiswa/footers/footer-regis');
define("MANAGER_HEADER_REGIS", 'layout/mahasiswa/headers/header_regis');
define("MANAGER_HEADER_MAHASISWA", 'layout/mahasiswa/headers/header');
define("MANAGER_FOOTER_MAHASISWA", 'layout/mahasiswa/footers/footer');
define("API_KEY_GOOGLE_JS", 'AIzaSyDLPhhxzjGhof2mSVNxumwwsDgd-W-9sjc');

define("STATUS_SEND_COMPLAIN", 1);
define("STATUS_READ_COMPLAIN", 2);
define("BAGIAN_KEUANGAN", 1);
define("BAGIAN_KEMAHASISWAAN", 2);
define("BAGIAN_AKADEMIK", 3);
define("BAGIAN_SDM", 4);
define("BAGIAN_ALUMNI", 5);
define("BAGIAN_UMUM", 6);