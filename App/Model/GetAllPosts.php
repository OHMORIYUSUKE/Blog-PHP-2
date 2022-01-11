<?php
include "db/dbconnect.php";

class GetAllPost
{

    function getAllPost()
    {
        $con = new connect();

        $sql = "SELECT * FROM article ORDER BY created DESC";

        $items = $con->NonePramSQL($sql);

        return $items;
    }
}
