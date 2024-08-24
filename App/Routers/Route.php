<?php

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('\App\Controllers');

// page d'accueil
$router->get('/', 'HomeController@index');

$router->get('/home', 'HomeController@index');


//=======Routes liées à l'utilisateur======

//Inscription
$router->post('/user/register','UserController@userSignUp');

//Connexion
$router->post('/user/login','UserController@userLogin');

// Déconnexion
$router->get('/user/(\d+)/logout','UserController@userLogout');


//Vérification pour que l'utilisateur accede que à son profil
$router->before('GET', '/user/(\d+)/get', function($id) {
    $userSession = $_SESSION['userSession'];
    $sessionUserId = $userSession['id_user'] ?? null;
    if (!$sessionUserId || $sessionUserId != $id) {
        header("location: ../../home");
        exit();
    }
});

//Acces profil
$router->get('/user/(\d+)/get', 'UserController@index');

//Modification de profil
$router->get('/user/(\d+)/update', 'UserController@userUpdate');

// Suppression de compte
$router->post('/user/(\d+)/delete','UserController@userDelete');

//Admin
$router->get('/admin', 'UserController@admin');


//===============Routes liées aux voitures============
$router->get('/car/id/get', 'CarController@carGet');
$router ->get('/cars/get', 'Controller@carsGet');
$router ->post('/car/add', 'CarController@carAdd');



//============Routes liées aux villes=============

//Ajout de Ville
$router->post('/city/add', 'CityController@cityAdd');

//Restitutons des villes
$router->get('/cities/find', 'CityController@cityFind');


//Routes liées aux locations
$router->post('/location/add', 'LocationController@locationAdd');

//Restitutions des locations
$router ->get('/locations/find', 'LocationController@locationFindBy');


//==========Routes liées aux trajets ============
// page trajet
$router->get('/journey/(\d+)/get', 'JourneyController@index' );

//Ajour de trajet
$router ->post('/journey/add', 'JourneyController@journeyAdd');



$router->run();