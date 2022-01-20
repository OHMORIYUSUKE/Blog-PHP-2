<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

class GetAllPosts
{
    public function __construct()
    {
    }
    public function getAllPosts(): PDOStatement
    {
        $con = new Connect();
        $sql = "SELECT * FROM article ORDER BY created DESC";
        $items = $con->SQL($sql);
        return $items;
    }
    public function getAllPostsCount(): int
    {
        $con = new Connect();
        $sql = "SELECT COUNT(*) AS cnt FROM article";
        $items = $con->SQL($sql);
        $count = $items->fetch();
        return $count['cnt'];
    }
}
