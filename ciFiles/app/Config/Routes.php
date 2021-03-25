<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PageLoader');
$routes->setDefaultMethod('dashboard');
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
$routes->get('/', 'PageLoader::dashboard');
$routes->get('login', 'PageLoader::login');

$routes->post('login-exe', 'Authentication::login');
$routes->get('logout-exe', 'Authentication::logout');

$routes->get("daily-horoscopes","PageLoader::daily_horoscopes");
$routes->get("add-new-horoscope","PageLoader::add_new_horoscope");

$routes->post("create-horoscope-exe","DailyHoroscopes::add");
$routes->post("delete-horoscope-exe","DailyHoroscopes::delete");

$routes->post("daily-horoscope-api","DailyHoroscopes::daily_horoscope");

$routes->get("subscribers-mgt","PageLoader::manage_subscribers");
$routes->get("add-new-subscriber","PageLoader::add_new_subscriber");

$routes->post("create-subscriber-exe","Subscribers::create_new");
$routes->post("deactivate-subscriber-exe","Subscribers::deactivate");

$routes->post("subscriber-login-api","Authentication::subscriber_login");
$routes->post("subscriber-register-api","Authentication::subscriber_register");

$routes->post("lead-gen-contact-form-api","Contact::save_contact_message");
$routes->get("contact-form-messages","PageLoader::contact_form_messages");

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
