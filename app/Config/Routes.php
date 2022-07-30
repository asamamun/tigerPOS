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
// $routes->get('/users', 'UsersController::index');
//customers
$routes->get('/customers', 'CustomersController::index');
$routes->get('/customers/create', 'CustomersController::create');
$routes->post('/customers/create', 'CustomersController::store');
$routes->get('/customers/edit/(:num)', 'CustomersController::edit/$1');
$routes->post('/customers/edit/(:num)', 'CustomersController::update/$1');
$routes->post('/customers/delete/(:num)', 'CustomersController::delete/$1');
$routes->get('/customers/download', 'CustomersController::pdf');
$routes->get('/customers/csv', 'CustomersController::csv');

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
$routes->get('/expenses/download', 'ExpensesController::pdf');
$routes->get('/expenses/csv', 'ExpensesController::csv');

//sales
$routes->get('/sales', 'SalesController::index');
$routes->get('/sales/download', 'SalesController::pdf');
// $routes->get('/sales/create', 'SalesController::create');
// $routes->post('/sales/create', 'SalesController::store');
// $routes->get('/sales/edit/(:num)', 'SalesController::edit/$1');
// $routes->post('/sales/edit/(:num)', 'SalesController::update/$1');
// $routes->post('/sales/delete/(:num)', 'SalesController::delete/$1');

//invoice
$routes->get('/invoice', 'InvoiceController::index');
$routes->get('invoice/details/(:num)', 'InvoiceController::details/$1');
$routes->get('/invoice/pdf/(:num)', 'InvoiceController::pdf/$1');
$routes->get('/invoice/download', 'InvoiceController::download');
$routes->get('/invoice/csv', 'InvoiceController::csv');
// $routes->get('/invoice/create', 'InvoiceController::create');
// $routes->post('/invoice/create', 'InvoiceController::store');
// $routes->get('/invoice/edit/(:num)', 'InvoiceController::edit/$1');
// $routes->post('/invoice/edit/(:num)', 'InvoiceController::update/$1');


//invoice
$routes->get('/invoicedetails', 'InvoiceDetailController::index');
$routes->get('/invoicedetails/pdf/(:num)', 'InvoiceDetailController::pdf/$1');
$routes->get('/invoicedetails/csv', 'InvoiceDetailController::csv');
$routes->get('/invoicedetails/download', 'InvoiceDetailController::download');
// $routes->get('/invoicedetails/create', 'InvoiceDetailController::create');
// $routes->post('/invoicedetails/create', 'InvoiceDetailController::store');
// $routes->get('/invoicedetails/edit/(:num)', 'InvoiceDetailController::edit/$1');
// $routes->post('/invoicedetails/edit/(:num)', 'InvoiceDetailController::update/$1');
// $routes->post('/invoicedetails/delete/(:num)', 'InvoiceDetailController::delete/$1');

//products
$routes->get('/products', 'ProductsController::index');
$routes->get('/products/create', 'ProductsController::create');
$routes->get('/products/barcode', 'ProductsController::barcode');

$routes->post('/products/create', 'ProductsController::store');
$routes->get('/products/edit/(:num)', 'ProductsController::edit/$1');
$routes->post('/products/edit/(:num)', 'ProductsController::update/$1');
$routes->post('/products/delete/(:num)', 'ProductsController::delete/$1');

//categories
$routes->get('/categories', 'CategoryController::index');
$routes->get('/categories/create', 'CategoryController::create');
$routes->post('/categories/create', 'CategoryController::store');
$routes->get('/categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('/categories/edit/(:num)', 'CategoryController::update/$1');
$routes->post('/categories/delete/(:num)', 'CategoryController::delete/$1');

//accounts
$routes->get('/accounts', 'AccountController::index');
$routes->get('/accounts/create', 'AccountController::create');
$routes->post('/accounts/create', 'AccountController::store');
$routes->get('/accounts/edit/(:num)', 'AccountController::edit/$1');
$routes->post('/accounts/edit/(:num)', 'AccountController::update/$1');
$routes->post('/accounts/delete/(:num)', 'AccountController::delete/$1');
$routes->get('/accounts/download', 'AccountController::pdf');
$routes->get('/accounts/csv', 'AccountController::csv');

//pos
$routes->get('/pos', 'PosController::index');
$routes->get('/scan', 'PosController::scan');

$routes->get('/search', 'PosController::search');
$routes->post('/addtocart', 'PosController::addtocart');
$routes->get('/customersearch', 'PosController::customersearch');
$routes->post('/customerdetails', 'PosController::customerdetails');
$routes->post('/placeorder', 'PosController::placeorder');

$routes->get('/pos/create', 'PosController::create');
$routes->post('/pos/create', 'PosController::store');
$routes->get('/pos/edit/(:num)', 'PosController::edit/$1');
$routes->post('/pos/edit/(:num)', 'PosController::update/$1');
$routes->post('/pos/delete/(:num)', 'PosController::delete/$1');

//purchase
// $routes->get('/pos', 'PosController::index');
$routes->get('/search', 'PurchaseController::search');
$routes->post('/addcart', 'PurchaseController::addtocart');
$routes->get('/order', 'OrderController::index');
$routes->get('order/details/(:num)', 'OrderController::details/$1');
$routes->get('/suppliersearch', 'PurchaseController::suppliersearch');
// $routes->post('/customerdetails', 'PosController::customerdetails');
$routes->post('/orderplace', 'PurchaseController::placeorder');

// $routes->get('/pos/create', 'PosController::create');
// $routes->post('/pos/create', 'PosController::store');
// $routes->get('/pos/edit/(:num)', 'PosController::edit/$1');
// $routes->post('/pos/edit/(:num)', 'PosController::update/$1');
// $routes->post('/pos/delete/(:num)', 'PosController::delete/$1');

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
// $routes->get('/suppliers', 'SuppliersController::index');
$routes->get('/purchase', 'PurchaseController::index');
// $routes->get('/expenses', 'ExpensesController::index');
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
