<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==========================
// HALAMAN PUBLIK (tanpa login)
// ==========================
$routes->get('/', 'ProdukController::index');
$routes->get('produk/detail/(:num)', 'ProdukController::detail/$1');

// ==========================
// AUTH ADMIN
// ==========================
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::attemptLogin');
$routes->get('admin/logout', 'Auth::logout');

// ==========================
// HALAMAN ADMIN (dilindungi filter auth)
// ==========================
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('produk', 'Admin\ProdukController::index');
    $routes->get('produk/create', 'Admin\ProdukController::create');
    $routes->post('produk/store', 'Admin\ProdukController::store');
    $routes->get('produk/edit/(:num)', 'Admin\ProdukController::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin\ProdukController::update/$1');
    $routes->get('produk/delete/(:num)', 'Admin\ProdukController::delete/$1');
});
