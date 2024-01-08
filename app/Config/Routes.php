<?php

namespace Config;

use App\Controllers\Admin\Category;

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
$routes->post('/', 'Home::create');

$routes->group('kb', static function ($routes) {

    //HOME
    $routes->get('/', 'Home::index');
    $routes->get('generalarticle', 'Home::generalarticle');
    $routes->get('generalarticle/generalarticledetail', 'Home::generalarticledetail');
    $routes->post('generalarticle/generalarticledetail/updateContentviews', 'Home::updateContentviews');
    $routes->post('generalarticle/generalarticledetail/updateReaction', 'Home::updateReaction');
    $routes->get('complain', 'Home::complain');
    $routes->post('complain', 'Home::create');
    $routes->post('feedback', 'Home::addFeedback');
    $routes->get('history', 'Home::history');
    $routes->get('personalarticle', 'Home::personalarticle');
    $routes->post('personalarticle', 'Home::create');
    $routes->get('personalarticle/personalarticledetail', 'Home::personalarticledetail');
    $routes->get('complain/reply', 'Home::reply');
    $routes->post('complain/sendReply', 'Home::sendReply');
    $routes->get('allcomplain', 'Home::allcomplain');
    $routes->get('search', 'Home::searchresult');
    $routes->get('yohan', 'Home::faq');
});


// app/Config/Routes.php

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('faq', 'FaqController::index');
    $routes->get('faq/create', 'FaqController::create');
    $routes->post('faq/store', 'FaqController::store');
    $routes->get('faq/edit/(:num)', 'FaqController::edit/$1');
    $routes->post('faq/update/(:num)', 'FaqController::update/$1');
    $routes->get('dashboard', 'Admin::index');

    // Delete related routes
    $routes->get('faq/delete/(:num)', 'FaqController::delete/$1');
    $routes->post('faq/perform-delete/(:num)', 'FaqController::performDelete/$1');
    $routes->post('faq/hapus/(:num)', 'FaqController::hapus/$1');

    $routes->get('feedback', 'Feedback::index');
    // $routes->get('feedback/edit', 'Feedback::editFeedback');
    // $routes->get('feedback/add', 'Feedback::editFeedback');
    $routes->get('feedback/delete/(:num)', 'Feedback::deleteFeedback/$1');
});


// ROUTE ADMIN
$routes->group('/kb/administrator', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {

    $routes->get('dashboard', 'Admin::index');

    $routes->get('project', 'Project::index');
    $routes->get('project/new', 'Project::new');
    $routes->post('project', 'Project::create');
    $routes->get('project/edit/(:num)', 'Project::edit/$1');
    $routes->post('project/(:num)', 'Project::update/$1');
    $routes->get('project/delete/(:num)', 'Project::delete/$1');
    $routes->post('project/deleteBatch', "Project::deleteBatchProject");

    $routes->get('user', 'User::index');
    $routes->get('user/new', 'User::new');
    $routes->post('user', 'User::create');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/(:num)', 'User::update/$1');
    $routes->get('user/delete/(:num)', 'User::delete/$1');
    $routes->get('user/detail/(:num)', 'User::detail/$1');
    $routes->post('user/deleteBatch', "User::deleteBatchUser");

    $routes->get('category', 'Category::index');
    $routes->get('category/new', 'Category::new');
    $routes->post('category', 'Category::create');
    $routes->get('category/edit/(:num)', 'Category::edit/$1');
    $routes->post('category/(:num)', 'Category::update/$1');
    $routes->get('category/delete/(:num)', 'Category::delete/$1');
    $routes->post('category/deleteBatch', "Category::deleteBatch");

    $routes->get('category/subcategory/(:num)', 'Category::subcategory/$1');
    $routes->get('category/subcategory/addsubcategory', 'Category::addsub');
    $routes->post('category/subcategory/addsubcategory', 'Category::createSubCategory');
    $routes->get('category/subcategory/editsubcategory/(:num)', 'Category::editsub/$1');
    $routes->post('category/subcategory/update/(:num)', 'Category::updateSubCategory/$1');
    $routes->get('category/subcategory/delete/(:num)', 'Category::deleteSubCategory/$1');
    $routes->post('category/subcategory/deleteBatch', "Category::deleteBatchSubCategory");

    $routes->get('article', 'Article::index');
    $routes->get('article/new', 'Article::new');
    $routes->post('article', 'Article::create');
    $routes->get('article/edit/(:num)', 'Article::edit/$1');
    $routes->post('article/(:num)', 'Article::update/$1');
    $routes->get('article/delete/(:num)', 'Article::delete/$1');
    $routes->get('article/detail/(:num)', 'Article::detail/$1');
    $routes->post('article/updateVisibility', 'Article::updateVisibility');
    $routes->post('article/deleteBatchArticle', "Article::deleteBatchArticle");
    $routes->get('article/export', 'Article::exportDataToExcel');

    $routes->get('complain', 'Complain::index');
    $routes->get('complain/reply/(:num)', 'Complain::reply/$1');
    $routes->get('complain/export', 'Complain::exportDataToExcel');
    $routes->post('complain/sendReply', 'Complain::sendReply');
    $routes->post('complain/updateStatus', 'Complain::updateStatus');
    $routes->post('complain/updateVisibility', 'Complain::updateVisibility');
    $routes->post('complain/deleteBatch', "Complain::deleteBatch");
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
