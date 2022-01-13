<?php
include "db/Connect.php";

class GetPostById
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPostById(): PDOStatement
    {
        $con = new Connect();

        $id = $this->id;

        $sql = "SELECT * FROM article WHERE id=:id";
        $items = $con->SQL($sql, array([':id', $id, PDO::PARAM_INT]));
        return $items;
    }
}
