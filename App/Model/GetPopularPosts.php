<?php
include "db/Connect.php";

class GetPopularPosts
{
    private int $postCount;

    public function __construct()
    {
        $this->postCount = 3;
    }
    public function getPopularPosts(): PDOStatement
    {
        $con = new Connect();

        $sql = "SELECT * FROM article ORDER BY count_view DESC LIMIT 0, :postCount";
        $items = $con->SQL($sql, array([':postCount', $this->postCount, PDO::PARAM_INT]));
        return $items;
    }
}
