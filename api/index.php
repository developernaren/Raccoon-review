<?php

require_once 'classes/Db.php';
require_once 'classes/Review.php';
require_once 'classes/Route.php';
require_once 'classes/Racoon.php';
require_once 'classes/Response.php';

Route::get('raccoons', 'Racoon@getAllRaccoons');
Route::get('', 'Racoon@getAllRaccoons');
Route::get('home', 'Racoon@getAllRaccoons');
Route::get('review', 'Review@getAllReviews');


$server = $_SERVER;
$route = new Route( $server);
$result = $route->execute();
$response = new Response( $result );
$response->toJson();