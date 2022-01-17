<?php
namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

class GetPostsArchive
{
    public function __construct()
    {
    }

    public function getPostsArchive(): array
    {
        $con = new Connect();

        $sql = "SELECT * FROM article ORDER BY created";
        $items = $con->SQL($sql);
        $uniqueDateTime = $this->getUniqueDateTime($items);
        return $uniqueDateTime;
    }

    private function getUniqueDateTime(PDOStatement $items): array
    {
        $createds = array();
        foreach ($items as $post) :
            $date = new \DateTime($post['created']);
            $created = $date->format('Y-m'); // 2014-08-01 23:01:05 -> Y/m
            $createds[] = $created;
        endforeach;
        $createds = array_unique($createds);
        return $createds;
    }
}
