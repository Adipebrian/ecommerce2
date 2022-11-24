<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->add('/user', 'User::index', ['filter' => 'role:user']);
$routes->post('/user/update', 'User::update');
$routes->post('/user/change_akun', 'User::change_akun');
$routes->get('/', 'Home::index');
$routes->get('/user/cart', 'User::cart');
$routes->get('/home/detail/(:any)', 'Home::detail/$1');
$routes->get('/home/cat/(:any)', 'Home::cat/$1');
$routes->get('/home/jns/(:any)', 'Home::jns/$1');
$routes->get('/home/search_product/(:any)/(:any)/(:any)', 'Home::search_product/$1/$2/$3');
$routes->post('/delete_user', 'Admin::delete_user');
$routes->post('/add_barang', 'Stock::add_barang');
$routes->post('/edit_barang', 'Stock::edit_barang');
$routes->post('/delete_barang', 'Stock::delete_barang');
$routes->post('/import_barang', 'Stock::import_barang');
$routes->post('/add_kategori', 'Stock::add_kategori');
$routes->post('/edit_kategori', 'Stock::edit_kategori');
$routes->post('/delete_kategori', 'Stock::delete_kategori');
$routes->post('/import_kategori', 'Stock::import_kategori');
$routes->post('/add_jenis', 'Stock::add_jenis');
$routes->post('/edit_jenis', 'Stock::edit_jenis');
$routes->post('/delete_jenis', 'Stock::delete_jenis');
$routes->post('/import_jenis', 'Stock::import_jenis');
$routes->post('/edit_stock', 'Stock::edit_stock');
$routes->post('/home/produk', 'Home::search');

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('index', 'Admin::index');
    $routes->get('user', 'Admin::user');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}