<?php

/**
 * Created by PhpStorm.
 * User: narendra
 * Date: 9/12/16
 * Time: 10:46 PM
 */
class Racoon extends Db
{

    private $name;
    private $imageUrl;
    private $id;
    protected $table = "racoons";


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
}