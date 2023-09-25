<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Pages';

// POST Routes
$route['api-auth-register'] = 'Auth/register';
$route['api-auth-login'] = 'Auth/login';

$route['ajx/product/create'] = 'Product/ajx_new';
$route['ajx/product/edit'] = 'Product/ajx_edit';

// GET Routes
$route['about-us'] = 'Pages/about';
$route['login'] = 'Pages/login';
$route['register'] = 'Pages/register';


// /ecm-admin/ routes
$route[''] = 'Pages/index';
$route['logout'] = 'auth/logout';
$route['products'] = 'Products/index';
$route['products/new'] = 'Products/new';
$route['product/(:any)/edit'] = 'Products/edit/$1';
$route['product/(:any)'] = 'Products/details/$1';

$route['payments'] = 'PaymentController/index';
$route['payment/(:any)/edit'] = 'PaymentController/edit/$1';
$route['payment/(:any)'] = 'PaymentController/details/$1';

$route['invoices'] = 'InvoiceController/index';
$route['invoices/new'] = 'InvoiceController/new';
$route['invoice/(:any)/edit'] = 'InvoiceController/edit/$1';
$route['invoice/(:any)'] = 'InvoiceController/details/$1';

$route['currency/all'] = 'CurrencyController/index';
$route['currency/new'] = 'CurrencyController/new';
$route['currency/(:any)/edit'] = 'CurrencyController/edit/$1';

$route['cart'] = 'cart/index';
$route['cart/checkout'] = 'Cart/checkout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
