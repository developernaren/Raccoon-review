<?php
//
//
//echo "<pre>";
//
//print_r( $_SERVER );
//die;
require_once 'classes/Db.php';
require_once 'classes/Review.php';
require_once 'classes/Route.php';
require_once 'classes/Racoon.php';


Route::get('raccoons', 'Racoon@getAllRaccoons');
Route::get('', 'Racoon@getAllRaccoons');
Route::get('home', 'Racoon@getAllRaccoons');
Route::get('review', 'Review@getAllReviews');


$server = $_SERVER;
$route = new Route( $server);