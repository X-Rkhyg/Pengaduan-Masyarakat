<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 $routes->get('/', 'Home::index');
 $routes->get('/ydwayvdayvdawduvawdauiu', 'Okee::index');

 //Masyarakat
$routes->get('/auth/login', 'AuthMasyarakat::login');
$routes->get('/auth/daftar', 'AuthMasyarakat::daftar');
$routes->post('/auth/valid_login', 'AuthMasyarakat::valid_login');
$routes->post('/authmasyarakat/valid_register', 'AuthMasyarakat::valid_register');
$routes->get('/auth/logout', 'AuthMasyarakat::logout');
$routes->get('/auth/logoutpetugas', 'AuthPetugas::logout');

$routes->get('/masyarakat', 'Masyarakat::index');
$routes->get('/masyarakat/tambah', 'Masyarakat::tambah');
$routes->get('/masyarakat/lihat', 'Masyarakat::lihat');
$routes->get('/masyarakat/setting', 'Masyarakat::setting');
$routes->post('/masyarakat/ganti_password/(:num)', 'Setting::ganti_password_masyarakat/$1');
$routes->post('/masyarakat/save', 'Pengaduan::save');
$routes->get('/download/(:num)', 'Pengaduan::download/$1');
$routes->get('/delete/(:num)', 'Pengaduan::delete/$1');
$routes->get('/pengaduan/edit/(:num)', 'Pengaduan::edit/$1');
$routes->post('/pengaduan/update/(:num)', 'Pengaduan::update/$1');
$routes->get('/pengaduan/lihattanggapan/(:num)', 'Pengaduan::lihattanggapan/$1');
$routes->get('/masyarakat/defaultchange', 'AuthMasyarakat::defaultchange');
$routes->post('/masyarakat/defaultchange/save', 'AuthMasyarakat::defaultchangesave');

//Petugas
$routes->get('/auth/loginpetugas', 'AuthPetugas::login');
$routes->post('/authpetugas/valid_login', 'AuthPetugas::valid_login');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/validasi', 'Petugas::validasi');
$routes->get('/petugas/management', 'Petugas::management');
$routes->get('/petugas/setting', 'Petugas::setting');
$routes->get('/petugas/defaultpass/(:num)', 'Petugas::defaultpass/$1');

$routes->post('/petugas/ganti_password/(:num)', 'Setting::ganti_password_petugas/$1');
$routes->get('/petugas/masyarakat/edit/(:num)', 'Petugas::edit/$1');
$routes->post('/petugas/masyarakat/update/(:num)', 'Petugas::update/$1');
$routes->get('/petugas/masyarakat/delete/(:num)', 'Petugas::delete/$1');

$routes->get('/pengaduanpetugas/validasi/(:num)', 'PengaduanPetugas::validasi/$1');
$routes->get('/pengaduanpetugas/tolak/(:num)', 'PengaduanPetugas::tolak/$1');
$routes->get('/pengaduanpetugas/tanggapan/(:num)', 'PengaduanPetugas::tanggapan/$1');
$routes->post('/pengaduanpetugas/updatetanggapan/(:num)', 'PengaduanPetugas::updatetanggapan/$1');
$routes->get('/petugas/download/(:num)', 'PengaduanPetugas::download/$1');


//Admin
$routes->post('/loginadmin', 'LoginPetugas::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/validasi', 'Admin::validasi');
$routes->get('/admin/management', 'Admin::management');
$routes->get('/admin/managementpetugas', 'Admin::managementpetugas');
$routes->get('/admin/petugas', 'Admin::petugas');
$routes->get('/admin/setting', 'Admin::setting');
$routes->post('/admin/ganti_password/(:num)', 'Setting::ganti_password_admin/$1');

$routes->get('/admin/masyarakat/edit/(:num)', 'Admin::editMasyarakat/$1');
$routes->post('/admin/masyarakat/update/(:num)', 'Admin::updateMasyarakat/$1');
$routes->get('/admin/masyarakat/delete/(:num)', 'Admin::deleteMasyarakat/$1');
$routes->get('/petugas/defaultpasspetugas/(:num)', 'Admin::defaultpassMasyarakat/$1');

$routes->get('/admin/petugas/edit/(:num)', 'Admin::editPetugas/$1');
$routes->post('/admin/petugas/update/(:num)', 'Admin::updatePetugas/$1');
$routes->get('/admin/petugas/delete/(:num)', 'Admin::deletePetugas/$1');
$routes->get('/petugas/defaultpasspetugas/(:num)', 'Admin::defaultpassPetugas/$1');

$routes->get('/pengaduanadmin/validasi/(:num)', 'PengaduanAdmin::validasi/$1');
$routes->get('/pengaduanadmin/tolak/(:num)', 'PengaduanAdmin::tolak/$1');
$routes->get('/pengaduanadmin/tanggapan/(:num)', 'PengaduanAdmin::tanggapan/$1');
$routes->post('/pengaduanadmin/updatetanggapan/(:num)', 'PengaduanAdmin::updatetanggapan/$1');

$routes->get('/admin/download/(:num)', 'PengaduanAdmin::download/$1');

$routes->get('/admin/donglot', 'Admin::donglot');
$routes->get('/generate', 'PdfGenerate::generatePDF');
