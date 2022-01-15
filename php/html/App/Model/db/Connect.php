<?php

namespace App\Model;

use \PDO;
use \PDOStatement;
use \Exception;

class Connect
{
    public function __construct()
    {
        $this->DB_NAME = "blog";
        $this->HOST = "mysql";
        $this->UTF = "utf8";
        $this->USER = "root";
        $this->PASS = "root";
    }
    //データベースに接続する関数
    public function pdo(): PDO
    {
        /*phpのバージョンが5.3.6よりも古い場合はcharset=".$this->UTFが必要無くなり、array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$this->UTF')が必要になり、5.3.6以上の場合は必要ないがcharset=".$this->UTFは必要になる。*/
        $dsn = "mysql:dbname=" . $this->DB_NAME . ";host=" . $this->HOST . ";charset=" . $this->UTF;
        $user = $this->USER;
        $pass = $this->PASS;
        try {
            $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $this->UTF));
        } catch (Exception $e) {
            echo 'error' . $e->getMesseage;
            die();
        }
        //エラーを表示してくれる。
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
    public function SQL(string $sql, array $param = null): PDOStatement
    {
        $obj = $this->pdo();
        $stmt = $obj->prepare($sql);

        $stmt = $param ? $this->doInParamSQL($stmt, $param) : $this->doNoneParamSQL($stmt);

        return $stmt;
    }

    private function doInParamSQL(PDOStatement $stmt, array $param): PDOStatement
    {
        for ($i = 0; $i < count($param); $i++) {
            $stmt->bindValue($param[$i][0], $param[$i][1], $param[$i][2]);
        }
        $stmt->execute();
        return $stmt;
    }
    private function doNoneParamSQL(PDOStatement $stmt): PDOStatement
    {
        $stmt->execute();
        return $stmt;
    }
}
