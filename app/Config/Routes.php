<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// TheAu to Ruoting (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('kb', static function ($routes) {

    // ROUTE LOGIN
    // $routes->get('proses', 'Login::proses');
    // $routes->get('register/', 'Login::register');
    // $routes->get('forgot-password/', 'Login::forgotpassword');

    //HOME
    $routes->get('/', 'Home::index');
    $routes->get('generalarticle', 'Home::generalarticle');
    $routes->get('generalarticle/generalarticledetail', 'Home::generalarticledetail');
    $routes->get('complain', 'Home::complain');
    $routes->get('history', 'Home::history');
    $routes->get('personalarticle', 'Home::personalarticle');
    $routes->get('personalarticle/personalarticledetail', 'Home::personalarticledetail');
});

// ROUTE ADMIN
$routes->group('/kb/administrator', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {

    $routes->get('dashboard', 'Admin::index');

    $routes->get('user', 'User::index');
    $routes->get('user/detailuser', 'User::detail');
    $routes->get('user/new', 'User::new');
    $routes->post('user', 'User::create');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/(:num)', 'User::update/$1');
    $routes->get('user/delete/(:num)', 'User::delete/$1');

    // $routes->resource('user', ['controller' => 'User', 'only' => ['index', 'show', 'new', 'create', 'edit', 'update']]);

    // $routes->post('user/save', 'User::save');
    // $routes->get('user/edituser', 'User::edit');

    $routes->get('category', 'Category::index');
    $routes->get('category/addcategory', 'Category::add');
    $routes->get('category/editcategory', 'Category::edit');
    $routes->get('category/subcategory', 'Category::subcategory');
    $routes->get('category/subcategory/addsubcategory', 'Category::addsub');
    $routes->get('category/subcategory/editsubcategory', 'Category::editsub');

    $routes->get('article', 'Article::index');
    $routes->get('article/addarticle', 'Article::add');
    $routes->get('article/editarticle', 'Article::edit');
    $routes->get('article/detailarticle', 'Article::detail');

    $routes->get('complain', 'Complain::index');
    $routes->get('complain/reply', 'Complain::reply');
});



// ROUTE ERROR
$routes->match(['get', 'post'], '404', 'Custom404::index');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
