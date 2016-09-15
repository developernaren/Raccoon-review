<?php

class Review extends Db
{

    protected $table = 'review';

    public $name;
    public $key;
    public $reviewText;
    public $racoonId;
    public $rating;
    public $id;

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getReviewText()
    {
        return $this->reviewText;
    }

    /**
     * @param mixed $reviewText
     */
    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;
    }

    /**
     * @return mixed
     */
    public function getRacoonId()
    {
        return $this->racoonId;
    }

    /**
     * @param mixed $racoonId
     */
    public function setRacoonId($racoonId)
    {
        $this->racoonId = $racoonId;
    }

    function save() {

        $this->insert( [
            'reviewer_name' => $this->getName(), 
            'viewer_key' => $this->getKey(),
            'review' => $this->getReviewText(),
            'rating' => 1,
            'raccoon_id' => $this->getRacoonId()
        ] );
    }

    function getAllReviews()
    {
       $result = $this->getAll();
        $reviewsArr = [];

        while ( $row = $result->fetch_assoc() ) {

            $review = new self();
            $review->setKey( $row['viewer_key']);
            $review->setId( $row['id']);
            $review->setName("Narendra");
            $review->setReviewText("this is aweoine");
            $review->setRacoonId('1');
            $reviewsArr[] = $review;

        }
        return json_encode( $reviewsArr );
    }





}