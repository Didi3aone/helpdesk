<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'dashboard';
// $route['404_override'] = 'errors';
// $route['translate_uri_dashes'] = TRUE;

// $route['login'] = "index/auth/login";
// $route['logout'] = "index/auth/logout";
// $route['forgot-password'] = "index/index/forgot-password";
// $route['reset-password/(:any)'] = "index/index/reset-password/$1";
// $route['user-regis'] = "index/auth/user_registration";


$route['default_controller'] = 'dashboard/dashboard_mahasiswa';
$route['404_override'] = 'error';
$route['translate_uri_dashes'] = TRUE;

$route['mahasiswa'] = "dashboard/dashboard_mahasiswa/index";
$route['Auth'] = "mahasiswa/mahasiswa";
$route['mahasiswa/logout'] = "mahasiswa/mahasiswa/logout";
$route['mahasiswa/forgot-password'] = "index/index/forgot-password";
$route['mahasiswa/reset-password/(:any)'] = "index/index/reset-password/$1";
$route['mahasiswa/registration'] = "mahasiswa/user_registration";

$route['logout'] = "index/index/logout";

$route['manager'] = "dashboard/dashboard_manager/index";
$route['manager/auth'] = "index/index_manager/login";
$route['manager/logout'] = "index/index_manager/logout";
$route['manager/forgot-password'] = "index/index_manager/forgot-password";
$route['manager/reset-password/(:any)'] = "index/index_manager/reset-password/$1";

$route['manager/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)'] = '$1/$2/$3/$4';
$route['manager/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)/(:any)'] = '$1/$2/$3/$4';
$route['manager/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)'] = '$1/$2/$3';
$route['manager/([a-zA-Z_-]+)/(:any)/(:any)'] = '$1/$1/$2/$3';
$route['manager/([a-zA-Z_-]+)/(:any)'] = '$1/$1/$2';
$route['manager/([a-zA-Z_-]+)'] = '$1/$1/index';

// $route['mahasiswa/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)'] = '$1/$2_mahasiswa/$3/$4';
// $route['mahasiswa/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)/(:any)'] = '$1/$2_mahasiswa/$3/$4';
// $route['mahasiswa/([a-zA-Z_-]+)/([a-zA-Z_-]+)/([a-zA-Z_-]+)'] = '$1/$2_mahasiswa/$3';
// $route['mahasiswa/([a-zA-Z_-]+)/(:any)/(:any)'] = '$1/$1_mahasiswa/$2/$3';
// $route['mahasiswa/([a-zA-Z_-]+)/(:any)'] = '$1/$1_mahasiswa/$2';
// $route['mahasiswa/([a-zA-Z_-]+)'] = '$1/$1_mahasiswa/index';