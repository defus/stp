<?php

// Accueil
get('/', 'Home\HomeController@index');

// Authentication
get('/auth/register', 'Auth\AuthController@getRegister');
post('/auth/register', 'Auth\AuthController@postRegister');
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

// Admin area
get('admin', function () {
    return redirect('/admin/chargement');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/chargement', 'ChargementController');
    get('admin/chargement/upload', 'ChargementController@upload');
    get('admin/chargement/{id}/repondre', 'ChargementController@repondre');
});