<?php
include "db/dbconnect.php";

class GetAllPost
{

    public function getAllPost()
    {
        $con = new connect();

        $sql = "SELECT * FROM article ORDER BY created DESC";

        $items = $con->SQL($sql, array());

        return $items;
    }
}
