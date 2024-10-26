<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ContactController::index', ['as' => 'contact.index']);
$routes->get('contacts/create', 'ContactController::create', ['as' => 'contact.create']);
$routes->post('contacts/store', 'ContactController::store', ['as' => 'contact.store']);
$routes->get('contacts/edit/(:num)', 'ContactController::edit/$1', ['as' => 'contact.edit']);
$routes->put('contacts/update/(:num)', 'ContactController::update/$1', ['as' => 'contact.update']);
$routes->delete('contacts/delete/(:num)', 'ContactController::delete/$1', ['as' => 'contact.delete']);