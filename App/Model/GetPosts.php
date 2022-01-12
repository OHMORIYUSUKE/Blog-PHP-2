<?php
include "db/dbconnect.php";

class GetPosts
{
    private $start;

    public function __construct(int $start)
    {
        $this->stat = $start;
    }

    public function getPosts(): PDOStatement
    {
        $con = new connect();
        $start = $this->stat;
        $sql = "SELECT * FROM article ORDER BY created DESC LIMIT :num,6";

        $items = $con->SQL($sql, array([':num', $start, PDO::PARAM_INT]));

        return $items;
    }
}
