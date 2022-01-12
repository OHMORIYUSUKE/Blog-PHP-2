<?php
include "db/dbconnect.php";

class GetAllPost
{
    public function __construct()
    {
    }
    public function getAllPost(): PDOStatement
    {
        $con = new connect();

        $sql = "SELECT * FROM article ORDER BY created DESC";

        $items = $con->SQL($sql);

        return $items;
    }
}
