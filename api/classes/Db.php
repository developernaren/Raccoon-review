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

    function insert(array $data)
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


    function update( $id, array  $data)
    {
        $query = "update " . $this->table ." set ";
        $queryArr = [];
        foreach ( $data as $key => $d ) {
            $queryArr[] = $key . "='" . $d ."'";
        }

        $query .= implode(',', $queryArr );

        die( $query );

    }

    function getAll()
    {

        $db = $this->getDB();
        $result = $db->query('select * from ' . $this->table);
        $db->close();

        return $result;

    }

    function totalResult()
    {
        $db = $this->getDB();
        $total = $db->query('select count(id) as cnt from tbl_raccoon');
        $db->close();
        return $total;

    }

    function getById($id)
    {
        $db = $this->getDB();
        $query = 'select * from ' . $this->table . ' where id=' . $id;
        $result = $db->query($query);
        $db->close();
        return $result;
    }

    function getBySortAsc()
    {
        $db = $this->getDB();
        $total = $db->query('select * from '.$this->table.' order by name asc');
        $db->close();
        return $total;
    }

    function getBySortDesc()
    {
        $db = $this->getDB();
        $total = $db->query('select * from '.$this->table.' order by name desc');
        $db->close();
        return $total;
    }

    function getRate() 
    {
        $db = $this->getDB();
        $total = $db->query('select * from '.$this->table.' order by name desc');
        $db->close();
        return $total;
    }
    
    function getByRateHigh()
    {
        $db = $this->getDB();
        $result = $db->query('select sum( rating ) as totalRating,b.* from review as a join tbl_raccoon as b on a.raccoon_id = b.id group by raccoon_id order by totalRating desc');
        $db->close();
        return $result;   
    }

    function getByRateLow()
    {
        $db = $this->getDB();
        $result = $db->query('select sum( rating ) as totalRating,b.* from review as a join tbl_raccoon as b on a.raccoon_id = b.id group by raccoon_id order by totalRating asc');
        $db->close();
        return $result;
    }

    function total_review($id)
    {
        $db = $this->getDB();
        $result = $db->query('select * from reviews where raccoon_id = ' . $id);
        $db->close();
        return $result;

    }

    function getRelated($table, $id, $column)
    {

        $db = $this->getDB();
        $result = $db->query('select * from ' . $table . ' where ' . $column . '= ' . $id);
        $db->close();
        return $result;
    }

    function delete( $id ) {

        $db = $this->getDB();
        $result = $db->query('delete from ' . $this->table . ' where id=' . $id);
        $db->close();
        return $result;
    }

    


}