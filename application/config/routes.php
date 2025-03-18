<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['loginuser'] = 'user/Users/index';
$route['userlogin'] = 'user/Users/login';

$route['loginadmin'] = 'admin/Admin/index';
$route['adminlogin'] = 'admin/Admin/login';

$route['registrasi'] = 'user/Users/registrasi';
$route['register'] = 'user/Users/register';

$route['registrasii'] = 'admin/Admin/registrasi';
$route['registerr'] = 'admin/Admin/register';

$route['admin'] = 'admin/Dashboard/admin';
$route['petugas'] = 'admin/Dashboard/petugas';

$route['bukunet'] = 'user/Dashboard/index';
$route['buku'] = 'user/Buku/index';

$route['peminjaman'] = 'user/peminjaman/index';
$route['peminjaman/simpan'] = 'user/peminjaman/simpan';

$route['peminjaman/form/(.+)'] = 'peminjaman/form/$1';
$route['editform/(.+)'] = 'admin/data_peminjaman/edit/$1';
$route['datapeminjaman'] = 'admin/data_peminjaman/admin';
$route['cekjumlah/(.+)'] = 'user/peminjaman/cek_jumlah/$1';

$route['tambah'] = 'user/Koleksi/tambah';
$route['hapus'] = 'user/Koleksi/hapus';
$route['koleksi'] = 'user/Koleksi/index';

$route['tersimpan'] = 'user/Koleksi/toggle';
$route['ulasan/(:num)'] = 'ulasan/index/$1';
$route['ulasan/tambah'] = 'ulasan/tambah';

$route['databuku'] = 'admin/Buku/petugas';
$route['databukuu'] = 'admin/Buku/admin';

$route['datapeminjamen'] = 'admin/data_peminjaman/petugas';
$route['logout'] = 'admin/admin/logout';
