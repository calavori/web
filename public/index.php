<?php

define('ROOTDIR', realpath(dirname(__DIR__)).DIRECTORY_SEPARATOR);
define('APPNAME', 'Me And The Boys Fitness');

// Turn off error display in production
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ROOTDIR.'vendor/autoload.php';
require_once ROOTDIR.'db.php';

session_start();

use \App\Router;

if (! ob_get_level()) {
    ob_start();
}

// Auth routes
Router::post('/logout', '\App\Controllers\Auth\LoginController@logout');
Router::get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('/register', '\\App\Controllers\Auth\RegisterController@register');
Router::get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
Router::post('/login', '\App\Controllers\Auth\LoginController@login');

// Home routes
Router::get('/', '\App\Controllers\HomeController@index');

// Manage route
Router::post('/add', '\App\Controllers\HomeController@add');
Router::get('/edit/(:num)', '\App\Controllers\HomeController@edit');
Router::post('/update/(:num)', '\App\Controllers\HomeController@update');
Router::post('/delete/(:num)', '\App\Controllers\HomeController@delete');

// Error routes
Router::error('\App\Controllers\Controller@notFound');

Router::dispatch();

ob_end_flush();
