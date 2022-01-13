<?php
include "db/Connect.php";

class GetAllPost
{
    public function __construct()
    {
    }
    public function getAllPost(): PDOStatement
    {
        $con = new Connect();
        $sql = "SELECT * FROM article ORDER BY created DESC";
        $items = $con->SQL($sql);
        return $items;
    }
}
