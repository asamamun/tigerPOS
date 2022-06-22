<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::store');
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::check');
$routes->get('/logout', 'LoginController::logout');

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');
$routes->get('/users', 'UsersController::index');
//customers
$routes->get('/customers', 'CustomersController::index');
$routes->get('/customers/create', 'CustomersController::create');
$routes->post('/customers/create', 'CustomersController::store');
$routes->get('/customers/edit/(:num)', 'CustomersController::edit/$1');
$routes->post('/customers/edit/(:num)', 'CustomersController::update/$1');
$routes->post('/customers/delete/(:num)', 'CustomersController::delete/$1');

//suppliers
$routes->get('/suppliers', 'SuppliersController::index');
$routes->get('/suppliers/create', 'SuppliersController::create');
$routes->post('/suppliers/create', 'SuppliersController::store');
$routes->get('/suppliers/edit/(:num)', 'SuppliersController::edit/$1');
$routes->post('/suppliers/edit/(:num)', 'SuppliersController::update/$1');
$routes->post('/suppliers/delete/(:num)', 'SuppliersController::delete/$1');

//users
$routes->get('/users', 'UsersController::index');
$routes->get('/users/create', 'UsersController::create');
$routes->post('/users/create', 'UsersController::store');
$routes->get('/users/edit/(:num)', 'UsersController::edit/$1');
$routes->post('/users/edit/(:num)', 'UsersController::update/$1');
$routes->post('/users/delete/(:num)', 'UsersController::delete/$1');

//expenses
$routes->get('/expenses', 'ExpensesController::index');
$routes->get('/expenses/create', 'ExpensesController::create');
$routes->post('/expenses/create', 'ExpensesController::store');
$routes->get('/expenses/edit/(:num)', 'ExpensesController::edit/$1');
$routes->post('/expenses/edit/(:num)', 'ExpensesController::update/$1');
$routes->post('/expenses/delete/(:num)', 'ExpensesController::delete/$1');

/* 
$routes->get('/customers/delete/(:num)', 'CustomersController::delete');
$routes->post('/customers/delete/(:num)', 'CustomersController::delete');
$routes->get('/customers/view/(:num)', 'CustomersController::view');
$routes->post('/customers/view/(:num)', 'CustomersController::view');
$routes->get('/customers/search', 'CustomersController::search');
$routes->post('/customers/search', 'CustomersController::search');
$routes->get('/customers/export', 'CustomersController::export');
$routes->post('/customers/export', 'CustomersController::export');
$routes->get('/customers/import', 'CustomersController::import');
$routes->post('/customers/import', 'CustomersController::import');
$routes->get('/customers/import_example', 'CustomersController::import_example');
$routes->post('/customers/import_example', 'CustomersController::import_example');
$routes->get('/customers/import_example_download', 'CustomersController::import_example_download');
$routes->post('/customers/import_example_download', 'CustomersController::import_example_download');
$routes->get('/customers/import_example_download_sample', 'CustomersController::import_example_download_sample');
$routes->post('/customers/import_example_download_sample', 'CustomersController::import_example_download_sample');
$routes->get('/customers/import_example_download_sample_csv', 'CustomersController::import_example_download_sample_csv');
$routes->post('/customers/import_example_download_sample_csv', 'CustomersController::import_example_download_sample_csv'); */
//products
$routes->get('/products', 'ProductsController::index');
$routes->get('/suppliers', 'SuppliersController::index');
$routes->get('/purchase', 'PurchaseController::index');
$routes->get('/sales', 'SalesController::index');
$routes->get('/expenses', 'ExpensesController::index');
$routes->get('/accounts', 'AccountsController::index');

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
