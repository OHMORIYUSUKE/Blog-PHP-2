<?php
include "db/dbconnect.php";

class GetPostById
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getPostById()
    {
        $con = new connect();
        $id = $this->id;
        $sql = "SELECT * FROM article WHERE id=:id";

        $items = $con->PramSQL($sql, $id);

        return $items;
    }
}
