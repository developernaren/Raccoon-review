<?php

class Db
{

    const DB_NAME = "racoon_review";
    const DB_HOST = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    protected $db;
    protected $table;


    function getDB()
    {
        return new mysqli(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_PASSWORD);
    }

    function insert( array $data)
    {

        $queryString = "insert into "
            . $this->table
            . " ( "
            . implode(',', array_keys($data))
            . " ) values('" . implode("','", array_values($data)) . "')";

        $this->getDB()->query($queryString);

    }


    function update($table, $id, array  $data)
    {


    }

    function getAll($table)
    {

    }


}