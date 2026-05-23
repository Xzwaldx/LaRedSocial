<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- RUTAS PÚBLICAS ---
$routes->get('/', 'Home::index');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');
$routes->get('user/register', 'User::register');
$routes->post('user/save', 'User::save');

// --- RUTAS PROTEGIDAS ---
// 1. Muro Global de Publicaciones
$routes->group('publication', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Publication::index');
    $routes->post('add', 'Publication::add');
    $routes->get('edit/(:num)', 'Publication::edit/$1');
    $routes->post('update', 'Publication::update');
    $routes->get('delete/(:num)', 'Publication::delete/$1');
});

// 2. Perfil Personal (Galería de Imágenes)
$routes->group('profile', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Profile::index');
});

// 3.  PANEL DE ADMINISTRACIÓN 
    $routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('delete/(:num)', 'Admin::delete_user/$1');
    $routes->post('update_user', 'Admin::update_user');
});

// 4. Acciones de la Galería (Subir y Borrar fotos desde el perfil)
$routes->group('gallery', ['filter' => 'auth'], function($routes) {
    $routes->post('upload', 'Gallery::upload');
    $routes->get('delete/(:num)', 'Gallery::delete/$1');
});

