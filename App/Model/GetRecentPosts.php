<?php
include "db/Connect.php";

class GetRecentPosts
{
    private int $postCount;

    public function __construct()
    {
        $this->postCount = 3;
    }

    public function getRecentPosts(): PDOStatement
    {
        $con = new Connect();

        $sql = "SELECT * FROM article ORDER BY created DESC LIMIT 0,".$this->postCount;
        $items = $con->SQL($sql);
        return $items;
    }
}
