<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['perpusgo'] = 'user/Dashboard/index';
$route['loginuser'] = 'user/Users/index';
$route['userlogin'] = 'user/Users/login';

$route['registrasi'] = 'user/Users/registrasi';
$route['register'] = 'user/Users/register';

$route['loginadmin'] = 'admin/Admin/index';
$route['adminlogin'] = 'admin/Admin/login';

$route['dashboard'] = 'admin/Dashboard/index';
$route['registrasii'] = 'admin/Admin/registrasi';
$route['registerr'] = 'admin/Admin/register';

