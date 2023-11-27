<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

class GetPostBySearchTag
{
    private string $word;
    private int $start;
    private int $postCount;

    public function __construct(string $word, int $start)
    {
        $this->word = $word;
        $this->postCount = 6;
        $this->start = $start;
    }

    public function getPostBySearchTag(): PDOStatement
    {
        $con = new Connect();

        $word = $this->word;

        $word = $this->url2string($word);
        $word = $this->bMatch($word);
        $word = $this->pMatch($word);

        $sql = "SELECT * FROM article WHERE tag LIKE :tag ORDER BY created DESC LIMIT :num, :postCount";
        $items = $con->SQL($sql, array([':tag', $word, PDO::PARAM_STR], [':num', $this->start, PDO::PARAM_INT], [':postCount', $this->postCount, PDO::PARAM_INT]));
        return $items;
    }

    private function url2string(string $word): string
    {
        return urldecode($word);
    }
    private function bMatch(string $word): string
    {
        return $word . '%';
    }
    private function pMatch(string $word): string
    {
        return '%' . $word;
    }

    //All
    public function getPostBySearchTagAllCount(): int
    {
        $con = new Connect();

        $word = $this->word;
        $word = $this->url2string($word);
        $word = $this->bMatch($word);
        $word = $this->pMatch($word);
        $sql = "SELECT COUNT(*) AS cnt FROM article WHERE tag LIKE :tag";
        $items = $con->SQL($sql, array([':tag', $word, PDO::PARAM_STR]));
        $count = $items->fetch();
        return $count['cnt'];
    }
}
