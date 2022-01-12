<?php
include "db/dbconnect.php";

class GetPosts
{
    private $start;

    public function __construct(int $start)
    {
        $this->stat = $start;
    }

    public function getPosts()
    {
        $con = new connect();
        $start = $this->stat;
        $sql = "SELECT * FROM article ORDER BY created DESC LIMIT :num,6";

        $items = $con->FSQL($sql, array(['key' => ':num', 'data' => $start, 'type' => PDO::PARAM_INT]));

        return $items;
    }
}
