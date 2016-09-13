<?php

require_once 'classes/Db.php';
require_once 'classes/Review.php';

$requestUri = $_SERVER['REQUEST_URI'];



if( $requestUri == "/review/api/insert" ) {
    
//    $review = new Review();
//    $review->setKey(1);
//    $review->setName("Narendra");
//    $review->setReviewText("this is aweoine");
//    $review->setRacoonId('1');
//    $review->save();
//    print_r( $review );

    $review = new Review();

    $data['data'] = $review->getAllReviews();
    die( json_encode( $data ) );
    die;
    
}

function returnJson($data){
    return(json_encode($data));
}