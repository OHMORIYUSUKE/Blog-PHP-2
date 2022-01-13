<?php
include "db/Connect.php";

class GetPosts
{
    private int $start;
    private int $postCount;

    public function __construct(int $start)
    {
        $this->stat = $start;
        $this->postCount = 6;
    }

    public function getPosts(): PDOStatement
    {
        $con = new Connect();

        $sql = "SELECT * FROM article ORDER BY created DESC LIMIT :num, :postCount";
        $items = $con->SQL($sql, array([':num', $this->stat, PDO::PARAM_INT], [':postCount', $this->postCount, PDO::PARAM_INT]));
        return $items;
    }
}
