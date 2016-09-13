<?php


class Response
{
    public $data;

    function __construct( $data )
    {
        $this->data = $data;
    }

    function toJson() {

    }

    function toXml() {

    }
}