<?php
include "db/dbconnect.php";

class GetPostById
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPostById(): PDOStatement
    {
        $con = new connect();

        $id = $this->id;

        $sql = "SELECT * FROM article WHERE id=:id";
        $items = $con->SQL($sql, array([':id', $id, PDO::PARAM_INT]));
        return $items;
    }
}
