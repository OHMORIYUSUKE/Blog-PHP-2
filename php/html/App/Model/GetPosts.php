<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

class GetPosts
{
    private int $start;
    private int $postCount;

    public function __construct(int $start)
    {
        $this->start = $start;
        $this->postCount = 6;
    }

    public function getPosts(): PDOStatement
    {
        $con = new Connect();

        $sql = "SELECT * FROM article ORDER BY created DESC LIMIT :num, :postCount";
        $items = $con->SQL($sql, array([':num', $this->start, PDO::PARAM_INT], [':postCount', $this->postCount, PDO::PARAM_INT]));
        return $items;
    }
}
