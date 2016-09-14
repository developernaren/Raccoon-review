<?php

/**
 * Created by PhpStorm.
 * User: narendra
 * Date: 9/12/16
 * Time: 10:46 PM
 */
class Racoon extends Db
{

    public $name;
    public $imageUrl;
    public $id;
    public $reviews;
    public $total;
    protected $table = "tbl_raccoon";


    function __construct( $id = '',$name = '', $imageUrl = '')
    {
        $this->setId( $id );
        $this->setName( $name );
        $this->setImageUrl( $imageUrl );
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    function save() {

        $this->insert( ['name' => $this->name, 'image_url' => $this->imageUrl ] );

    }

    function getAllRaccoons()
    {
        $result = $this->getAll();
        $resultArr = [];
        while( $row = $result->fetch_assoc() ) {
            $raccoon = new self( $row['id'], $row['name'], $row['image_url']);
            $resultArr[] = $raccoon;
        }
        return $resultArr;

    }

    function getTotal()
    {
        $total = $this->totalResult();
        $row = $total->fetch_assoc();
        $this->total = $row['cnt'];
        return $total;
            
    }
    function getTotalReview($id){
        $review = $this->total_review($id);
        return $review;
    }

    function getOne( $id ) {

        $result = $this->getById( $id );
        $row = $result->fetch_assoc();
        $raccoon = new self( $row['id'], $row['name'], $row['image_url']);
        $raccoon->getReviews();
        $raccoon->getTotal();
        die( json_encode( $raccoon ) );

    }

    function setReviews( $reviews ) {

        $this->reviews = $reviews;
    }

    function getReviews() {

        $result = $this->getRelated('review', 'raccoon_id', $this->getId() );
        $reviewsArr = [];
        while ( $row = $result->fetch_assoc() ) {
            $review = new Review();
            $review->setKey( $row['viewer_key']);
            $review->setId( $row['id']);
            $review->setName("Narendra");
            $review->setReviewText("this is aweoine");
            $review->setRacoonId('1');
            $reviewsArr[] = $review;
        }
        $this->setReviews( $reviewsArr );
        return $reviewsArr;
    }
}