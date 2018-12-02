<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix'=>'api/v1'], function($router)
{

// $router->resource('meeting','MeetingController',[
// 	'except'=>['edit','create']
// ]);

// $router->resource('meeting/registration','RegistratiionController',[
// 	'only'=>['store','destroy']

// ]);

$router->post('portfolio',[
	'as'=>'portfolio',
	'uses'=>'PortfolioController@store'
]);

$router->get('portfolio','PortfolioController@index');

$router->delete('portfolio/{id}','PortfolioController@destroy');

$router->get('/testing', function() {
	return "hello lumen";
});

});


	