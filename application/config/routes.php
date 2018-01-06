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
$route['default_controller'] = 'home';
//$route['login'] = "home/login";
//$route['logout'] = "home/logout";
//$route['forgot-password'] = "home/forgotPassword";

$route['login'] = "auth/login";
$route['logout'] = "auth/logout";
$route['forgot-password'] = "auth/forgot_password";
$route['reset-password/(:any)'] = "auth/reset_password/$1";
$route['profile'] = "auth/edit_profile";

$route['users'] = "auth";
$route['users/(edit)/(:num)'] = "auth/index/$1/$2";
$route['users/(delete)/(:num)'] = "auth/index/$1/$2";

$route['user-menu'] = "home/user_menu";
$route['user-menu/(:num)'] = "home/user_menu/$1";

$route['group'] = "auth/group";
$route['group/(edit)/(:num)'] = "auth/group/$1/$2";
$route['group/(delete)/(:num)'] = "auth/group/$1/$2";
//$route['(:any)/(add)'] = "home/index/$1/$2";
//$route['(:any)/(edit)/(:num)'] = "home/index/$1/$2/$3";
//$route['(:any)/(delete)/(:num)'] = "home/index/$1/$2/$3";

$route['menu'] = "home/menu";
$route['menu/(edit)/(:num)'] = "home/menu/$1/$2";
$route['menu/(delete)/(:num)'] = "home/menu/$1/$2";

$route['sub-menu'] = "home/sub_menu";
$route['sub-menu/(:any)/(:num)'] = "home/sub_menu/$1/$2";

$route['agency'] = "agency/index";
$route['agency/(edit)/(:num)'] = "agency/index/$1/$2";
$route['agency/(delete)/(:num)'] = "agency/index/$1/$2";

$route['agency/(:num)'] = "agency/agency_single/$1";
$route['agency/(:num)/(edit)/(:num)'] = "agency/agency_single/$1/$2/$3";
$route['agency/(:num)/(delete)/(:num)'] = "agency/agency_single/$1/$2/$3";

$route['agency/get-user/(:num)'] = "agency/get_user/$1";


$route['user-list'] = "user";

$route['login/submit-agency'] = "auth/select_agency";


$route['x-profile'] = "profile/index";
$route['x-profile/(edit)/(:num)'] = "profile/index/$1/$2";
$route['x-profile/(delete)/(:num)'] = "profile/index/$1/$2";

$route['x-profile/(:num)'] = "profile/menu/$1";
/*Edit profile group*/
$route['x-profile/(:num)/(edit)/(:num)'] = "profile/profile_action/$1/$2/$3";

$route['x-profile/(:num)/application/(:num)'] = "profile/application/$1/$2";
$route['x-profile/(:num)/application/(:num)/(delete)/(:num)'] = "profile/delete_application/$4";


/*To delete profile group*/
$route['x-profile/(:num)/delete/(:num)'] = "profile/delete_profile_group/$2";



$route['create-user-group'] = "home/user_group";

/*admin -> User login*/
$route['user-dash/(:num)'] = "home/user_login/$1";


//$route['(:any)'] = "home/test/$1";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
