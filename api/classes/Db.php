<?php

class Db
{

    const DB_NAME = "db_reccoon_review";
    const DB_HOST = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    protected $db;
    protected $table;


    function getDB()
    {
        return new mysqli(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
    }

    function insert( array $data)
    {


        $queryString = "insert into "
            . $this->table
            . " ( "
            . implode(',', array_keys($data))
            . " ) values('" . implode("','", array_values($data)) . "')";


        $db = $this->getDB();
        $db->query($queryString);
        $db->close();

    }


    function update($table, $id, array  $data)
    {


    }

    function getAll()
    {

        $db = $this->getDB();
        $result = $db->query('select * from ' . $this->table );
        $db->close();
        return $result;

    }

    function getById( $id )
    {
        $db = $this->getDB();
        $result = $db->query('select * from ' . $this->table.' where id = '.$id );
        $db->close();
        return $result;
    }


    


}