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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'home/index';
$route['admin/login'] = 'home/index';

$route['admin/sign-in'] = 'home/loginNow';
$route['admin/logout']='home/logout';

$route['admin/sliders'] = 'pages/slidersList';
$route['admin/add-slider'] = 'pages/addSlider';
$route['admin/edit-slider/(:any)'] = 'pages/editSlider/$1';
$route['admin/update-slider'] = 'pages/updateSlider';
$route['admin/dashboard'] = 'pages/dashboard';
$route['front/view-f'] = 'pages/viewf';
$route['front/about'] = 'pages/about';
$route['front/portfolio'] = 'pages/portfolio';
$route['front/team'] = 'pages/team';
$route['front/services'] = 'pages/services';
$route['front/contact'] = 'pages/contact';

$route['admin/delete-data'] = 'pages/deleteData';
$route['admin/contentManage'] = 'pages/contentManage';
$route['admin/addContent'] = 'pages/addContent';
$route['admin/edit-content/(:any)'] = 'pages/editCont/$1';
$route['admin/updateConte'] = 'pages/updateConte';
$route['admin/changeabout'] = 'pages/change1';
$route['admin/changehome'] = 'pages/change';
$route['admin/changeservices'] = 'pages/change2';
$route['admin/changeportfolio'] = 'pages/change3';
$route['admin/changeteam'] = 'pages/change4';

