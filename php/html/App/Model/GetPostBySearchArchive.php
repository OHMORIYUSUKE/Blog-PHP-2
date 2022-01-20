<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;
use \DateTime;
use \Exception;

class GetPostBySearchArchive
{
    private int $start;
    private int $postCount;
    private string $date;

    public function __construct(int $start, string $date)
    {
        $this->start = $start;
        $this->postCount = 6;
        $this->date = $date;
    }

    public function getPostBySearchArchive(): PDOStatement
    {
        $con = new Connect();

        $dateData = $this->getStartDateAndEndDate($this->date);
        $startDate = $dateData['startDate'];
        $endDate = $dateData['endDate'];

        $sql = "SELECT * FROM article WHERE created BETWEEN :startDate AND :endDate ORDER BY created DESC LIMIT :num, :postCount";
        $items = $con->SQL($sql, array([':startDate', $startDate, PDO::PARAM_STR], [':endDate', $endDate, PDO::PARAM_STR], [':num', $this->start, PDO::PARAM_INT], [':postCount', $this->postCount, PDO::PARAM_INT]));
        return $items;
    }

    private function getStartDateAndEndDate(string $date): array
    {
        $first_date = $date . '-01 00:00:00';
        try {
            //月末計算 指定された月のよく月を求める
            //https://qiita.com/re-24/items/c3ed814f2e1ee0f8e811
            $date = new DateTime($first_date);
            $last_date = $date->modify('first day of next months'); //よく月の1日
            $last_date = $last_date->format('Y-m-d H:i:s');
        } catch (Exception $e) {
            print($e);
        }
        $data = array(
            "startDate" => $first_date,
            "endDate" => $last_date,
        );
        return $data;
    }
    
    //All
    public function getPostBySearchArchiveAll(): PDOStatement
    {
        $con = new Connect();

        $dateData = $this->getStartDateAndEndDate($this->date);
        $startDate = $dateData['startDate'];
        $endDate = $dateData['endDate'];

        $sql = "SELECT * FROM article WHERE created BETWEEN :startDate AND :endDate ORDER BY created DESC";
        $items = $con->SQL($sql, array([':startDate', $startDate, PDO::PARAM_STR], [':endDate', $endDate, PDO::PARAM_STR]));
        return $items;
    }

    public function getPostBySearchArchiveAllCount(): int
    {
        $items = $this->getPostBySearchArchiveAll();
        $count = $items->fetchColumn();
        return $count;
    }
}
