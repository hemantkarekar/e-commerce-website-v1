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
$route['api-cart-empty'] = 'Cart/empty';
$route['api-cart-add'] = 'Cart/add';
$route['api-cart-remove'] = 'Cart/remove';
$route['api-cart-edit'] = 'Cart/edit';
$route['api-cart-process'] = 'Cart/process';

$route['api/payment'] = 'Payment/index';

// GET Routes
$route['about-us'] = 'Pages/index';
$route['contact-us'] = 'Pages/index';
$route['services'] = 'Pages/index';

$route['login'] = 'Pages/login';
$route['register'] = 'Pages/register';


$route['(:any)/account'] = 'UserDashboard/index';
$route['(:any)/order-history'] = 'UserDashboard/orders';

$route['logout'] = 'auth/logout';

// $route['search/(:num)'] = 'SearchHandler/index/$1';
$route['search'] = 'SearchHandler/results';

$route['products/(:num)'] = 'Products/index/$1';
$route['products/new'] = 'Products/new';
$route['product/(:any)/dp/(:any)'] = 'Products/details/$1/$2';

$route['cart'] = 'CartHandler/index';
$route['cart/empty'] = 'CartHandler/empty';

$route['cart/checkout'] = 'CheckoutHandler/index';
$route['payment/(:any)'] = "CheckoutHandler/payment_status/$1";

$route['404_override'] = 'ErrorHandler/error_404';
// $route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
