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
Route::get('raccoon/{num}', 'Racoon@getOne');
Route::get('raccoon/sortByAsc','Racoon@sortByAsc');
Route::get('raccoon/getBySortByDesc','Racoon@sortByDesc');



$server = $_SERVER;
$route = new Route( $server);
$result = $route->execute();
$response = new Response( $result );
//die($response = $response->toJson());
//
//select SUM(rv.rating) as total,rv.raccoon_id,r.name from tbl_raccoon r, review rv where r.id = rv.raccoon_id GROUP BY rv.raccoon_id 
//


