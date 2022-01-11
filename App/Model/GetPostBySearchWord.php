<?php
include "db/dbconnect.php";

class GetPostBySearchWord
{
    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function getPostBySearchWord()
    {
        $con = new connect();
        $word = $this->word;

        $word = $this->url2string($word);
        $word = $this->bMatch($word);
        $word = $this->pMatch($word);

        $sql = "SELECT * FROM article WHERE title LIKE :title ORDER BY created DESC";

        $items = $con->SQL($sql, array(':title' => $word));

        return $items;
    }

    private function url2string(string $word)
    {
        return urldecode($word);
    }
    private function bMatch(string $word)
    {
        return $word . '%';
    }
    private function pMatch(string $word)
    {
        return '%' . $word;
    }
}
