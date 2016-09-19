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

        $review = new Review();
        $review->setName( $_POST['reviewer_name']);
        $review->setKey( $_POST['viewer_key']);
        $review->setReviewText( $_POST['review']);
        $review->setRating( $_POST['rating']);
        $review->setRacoonId( $_POST['raccoon_id']);


        $id = $this->insert( [
            'reviewer_name' => $review->getName(),
            'viewer_key' => $review->getKey(),
            'review' => $review->getReviewText(),
            'rating' => $review->getRating(),
            'raccoon_id' => $review->getRacoonId()
        ]);

        $review->setId( $id );
        return [
            'status' => "success",
            'message' => 'Review successfully saved',
            'id' => $review->getId()
        ];
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

    function delete ( $key ) {

        return parent::delete( $key );

    }

    function updateReview() {

        $putData = [];
        $put = file_get_contents('php://input');
        mb_parse_str( $put,  $putData);

        $review = new Review();
        $review->setName( $putData['update_name']);
        $review->setKey( $putData['update_userkey']);
        $review->setReviewText( $putData['update_text']);
        $review->setRating( $putData['update_rate']);
        $review->setId( $putData['update_review_id'] );

        $review->update(  ['reviewer_name' => $review->getName(),
            'viewer_key' => $review->getKey(),
            'review' => $review->getReviewText(),
            'rating' => $review->getRating(),
            'id' => $review->getId()
        ]);




    }

}