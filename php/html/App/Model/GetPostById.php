<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

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

        $sql = "SELECT * FROM article WHERE id=:id";
        $items = $con->SQL($sql, array([':id', $this->id, PDO::PARAM_INT]));
        return $items;
    }
}
