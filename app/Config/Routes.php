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
$routes->get('/', 'Web::index');
$routes->get('web/berita/detail_b/$1', 'Web::detail_b/$1');
$routes->get('web/pariwisata', 'Web::obyek_wisata');
$routes->add('filemanager/(:any)', 'Filemanager::run');

$routes->group('', ['filter' => 'role:users'], function ($routes) {
    $routes->get('post-berita', 'Berita::post');
});

$routes->group('', ['filter' => 'role:operator-stunting'], function ($routes) {
    $routes->get('stunting', 'Statistik::index');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login/out
    $routes->get('users', 'Auth::index');
    $routes->get('login', 'Auth::login', ['as' => 'login']);
    $routes->post('log-in', 'Auth::login');
    $routes->get('logout', 'Auth::logout');

    // // Registration
    // $routes->get('register', 'Auth::register', ['as' => 'register']);
    // $routes->post('register', 'Auth::attemptRegister');

    // Activation
    $routes->get('activate-account/$1/$2', 'Auth::activate/$1/$2', [
        'as' => 'activate-account',
    ]);

    // Forgot/Resets
    $routes->get('forgot-password', 'Auth::forgot_password');
    $routes->post('forgot_password', 'Auth::forgot_password');
    $routes->get('reset-password/:num', 'Auth::reset_password/$1', [
        'as' => 'reset-password',
    ]);
    $routes->get('profile', 'Auth::profile');
});
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
