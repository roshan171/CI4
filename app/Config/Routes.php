<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// themes setup
$routes->get('/admin', 'Admin::index');
$routes->get('/dashboard', 'Admin::dashboard');



// crud 
$routes->get('/student', 'StudentController::index');
$routes->get('/student-create', 'StudentController::create');
$routes->post('/add-student', 'StudentController::add_record');
$routes->get('/student-edit/(:num)', 'StudentController::edit/$1');
$routes->put('/student-update/(:num)', 'StudentController::update/$1');
$routes->get('/student-delete/(:num)', 'StuSignupControllerdentController::delete/$1');
$routes->get('/student/export-excel', 'StudentController::exportExcel');




// login and register
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);


$routes->get('/blog', 'Blog::index');
$routes->get('blog/create', 'Blog::create');
$routes->post('blog/store', 'Blog::store');
$routes->get('blog/edit/(:num)', 'Blog::edit/$1');
$routes->post('blog/update', 'Blog::update');
$routes->get('blog-delete/(:num)', 'Blog::delete/$1');


$routes->get('payment', 'PaymentController::index');
$routes->post('payment/processPayment', 'PaymentController::processPayment');


// app/Config/Routes.php

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::save');
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('Dashboard', 'Dashboard::index');
$routes->get('logout', 'Logout::index');
