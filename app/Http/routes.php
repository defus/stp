<?php

// Accueil
get('/', 'Home\HomeController@index');
post('/contact', 'Home\HomeController@contactUs');

// Authentication
get('/auth/register', 'Auth\AuthController@getRegister');
post('/auth/register', 'Auth\AuthController@postRegister');
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');
get('/auth/confirmation/{confirmationCode}', 'Auth\AuthController@confirm');

// Admin area
get('admin', function () {
    return redirect('/admin/chargement');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/help', 'HelpController');
    
    get('admin/chargement/deleteall', 'ChargementController@deleteAll');
    get('admin/chargement/archive', 'ChargementController@archive');
    get('admin/chargement/{id}/accepter/{reponseId}', 'ChargementController@accepter');
    resource('admin/chargement', 'ChargementController');
    get('admin/chargement/upload', 'ChargementController@upload');
    get('admin/chargement/{id}/repondre', 'ChargementController@repondre');
    get('admin/chargement/{id}/archive', 'ChargementController@doArchive');
    post('admin/chargement/{id}/repondre', 'ChargementController@doRepondre');
    
    get('admin/user/profile', 'UserController@profile');
    get('admin/user/societe', 'UserController@societe');
    post('admin/user/reset-password', 'UserController@resetPassword');
    post('admin/user/reset-email', 'UserController@resetEmail');
    post('admin/user/profile-update', 'UserController@updateProfile');
    post('admin/user/profile-desable', 'UserController@disableProfile');
    post('admin/user/societe-update', 'UserController@updateSociete');
    get('admin/user/donneursordre', 'UserController@donneursordre');
    get('admin/user/transporteurs', 'UserController@transporteurs');
    resource('admin/user', 'UserController');
    
});