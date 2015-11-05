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
    resource('admin/help', 'HelpController');
    
    resource('admin/chargement', 'ChargementController');
    get('admin/chargement/upload', 'ChargementController@upload');
    get('admin/chargement/{id}/repondre', 'ChargementController@repondre');
    
    get('admin/user/profile', 'UserController@profile');
    get('admin/user/societe', 'UserController@societe');
    post('admin/user/reset-password', 'UserController@resetPassword');
    post('admin/user/reset-email', 'UserController@resetEmail');
    post('admin/user/profile-update', 'UserController@updateProfile');
    post('admin/user/profile-desable', 'UserController@desableProfile');
    post('admin/user/societe-update', 'UserController@updateSociete');
});