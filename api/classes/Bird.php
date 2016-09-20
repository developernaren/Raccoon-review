<?php

/**
 * Created by PhpStorm.
 * User: narendra
 * Date: 9/12/16
 * Time: 10:46 PM
 */
class Bird extends Db
{

    public $name;
    public $imageUrl;
    public $id;
    public $reviews;
    public $total;
    protected $table = "birds";


    function __construct( $id = '',$name = '', $imageUrl = '')
    {
        $this->setId( $id );
        $this->setName( $name );
        $this->setImageUrl( $imageUrl );
    }

    public function getTotalRe()
    {
        return $this->total;
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

    function getAllBirds()
    {
        $result = $this->getAll();
        $resultArr = [];
        while( $row = $result->fetch_assoc() ) {
            $bird = new self( $row['id'],$row['name'], $row['image_url']);
            $resultArr[] = $bird;
        }
        return $resultArr;

    }


    function sortByAsc()
    {
        $result = $this->getBySortAsc();
        
        while($row = $result->fetch_assoc()) {
            $bird = new self( $row['id'], $row['name'], $row['image_url']);
            $resultArr[] = $bird;
        }
        return $resultArr;
    }

    function sortByDesc()
    {
        $result = $this->getBySortDesc();
        while($row = $result->fetch_assoc()) {
            $bird = new self( $row['id'], $row['name'], $row['image_url']);
            $resultArr[] = $bird;
        }
        return $resultArr;
    }

    function getByRateHighs()
    {
        $result = $this->getByRateHigh();
        while($row = $result->fetch_assoc()) {
            $bird = new self( $row['id'], $row['name'], $row['image_url']);
            $resultArr[] = $bird;
        }
        return $resultArr;
    }

    function getByRateLows()
    {
        $result = $this->getByRateLow();
        while($row = $result->fetch_assoc()) {
            $bird = new self( $row['id'], $row['name'], $row['image_url']);
            $resultArr[] = $bird;
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
    function getTotalReview( $id ){
        $review = $this->total_review( $id );
        $result = $review->fetch_assoc();
        return $result;
    }

    function getOne( $id ) {

        $result = $this->getById( $id );
        $bird = new self();
        if( $result->num_rows > 0 ) {
            $row = $result->fetch_assoc();
            $bird = new self( $row['id'], $row['name'], $row['image_url']);
            $bird->getReviews();
            $bird->getTotal();
        }

        return json_encode( $bird );

    }

    function setReviews( $reviews ) {

        $this->reviews = $reviews;
    }

    function getReviews() {

        $result = $this->getRelated('bird_review', 'birds_id', $this->getId() );
        $reviewsArr = [];
        if( $result->num_rows > 0 ) {
            while ( $row = $result->fetch_assoc() ) {
                $review = new Review();
                $review->setKey( $row['viewer_key']);
                $review->setId( $row['id']);
                $review->setName($row['reviewer_name']);
                $review->setReviewText( $row['review']);
                $review->setBirdId( $row['birds_id']);
                $review->setRating( $row['rating']);
                $reviewsArr[] = $review;
            }
        }

        $this->setReviews( $reviewsArr );
        return $reviewsArr;
    }
}