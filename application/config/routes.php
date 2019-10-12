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
$route['default_controller'] = 'Index/index';
$route['404_override'] = 'Index/error';
$route['translate_uri_dashes'] = FALSE;

//INDEX
$route['daftar']='Index/daftar';
$route['info-pendaftaran']='Index/info';
$route['berita']='Index/berita';
$route['bantuan']='Index/bantuan';
$route['artikel/(:any)']='Index/page/$1';
$route['kategori/(:any)']='Index/kategori/$1';

$route['login'] = 'Login/index';
$route['login-admin'] = 'Login/index_admin';

$route['login-error'] = 'Login/index_error';
$route['force-login'] = 'Login/force_index';

$route['login-admin-error'] = 'Login/index_admin_error';
$route['force-login-admin'] = 'Login/force_index_admin';

$route['login-admin/(:any)/(:any)'] = 'Login/login_admin/$1/$2';
$route['login-admin/(:any)/(:any)/(:any)'] = 'Login/login_admin_verif/$1/$2/$3';

$route['logout'] = 'Login/logout';
$route['force-logout-admin'] = 'Login/force_logout';
$route['force-logout'] = 'Login/force_logout_siswa';
$route['logout-admin'] = 'Login/logout_admin';
$route['404'] = 'Index/error';

//admin
$route['pendaftar']='Admin/calon';
$route['diterima']='Admin/data';
$route['calon-mahasiswa']='Admin/belum';
$route['registrasi-mahasiswa']='Admin/registrasi';
$route['user-mahasiswa']='Admin/usermahasiswa';
$route['edit-data-mhs']='Admin/tampil_edit';
$route['user-admin']='Admin/useradmin';
$route['edit-admin']='Admin/admin_edit';
$route['edit-artikel']='Admin/artikel_edit';
$route['artikel-tambah']='Admin/artikel_tambah';
$route['artikel-edit']='Admin/artikel_edit';
$route['artikel-kelola']='Admin/artikel_kelola';
$route['laporan']='Admin/laporan';

//siswa
$route['edit-mahasiswa']='User/mahasiswa_edit';
$route['data-registrasi']='User/cek_registrasi';

