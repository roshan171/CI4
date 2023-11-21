<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/student', 'StudentController::index');
$routes->get('/student-create', 'StudentController::create');

$routes->post('/add-student', 'StudentController::add_record');
$routes->get('/student-edit/(:num)', 'StudentController::edit/$1');
$routes->put('/student-update/(:num)', 'StudentController::update/$1');
$routes->get('/student-delete/(:num)', 'StudentController::delete/$1');


$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);