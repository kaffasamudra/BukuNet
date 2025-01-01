<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['bukunet'] = 'user/Dashboard/index';
$route['loginuser'] = 'user/Users/index';
$route['userlogin'] = 'user/Users/login';

$route['registrasi'] = 'user/Users/registrasi';
$route['register'] = 'user/Users/register';

$route['loginadmin'] = 'admin/Admin/index';
$route['adminlogin'] = 'admin/Admin/login';

$route['dashboard'] = 'admin/Dashboard/index';
$route['registrasii'] = 'admin/Admin/registrasi';
$route['registerr'] = 'admin/Admin/register';

$route['buku'] = 'user/Buku/index';
$route['peminjaman'] = 'user/peminjaman/index';

$route['peminjaman/form/(.+)'] = 'peminjaman/form/$1';
$route['peminjaman/simpan'] = 'user/peminjaman/simpan';

$route['editform/(.+)'] = 'admin/data_peminjaman/edit/$1';
$route['datapeminjaman'] = 'admin/data_peminjaman/index';
