<?php
class connect
{
    //定数の宣言
    const DB_NAME = 'blog';
    const HOST = '127.0.0.1';
    const UTF = 'utf8';
    const USER = 'root';
    const PASS = '';
    //データベースに接続する関数
    public function pdo()
    {
        /*phpのバージョンが5.3.6よりも古い場合はcharset=".self::UTFが必要無くなり、array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF')が必要になり、5.3.6以上の場合は必要ないがcharset=".self::UTFは必要になる。*/
        $dsn = "mysql:dbname=" . self::DB_NAME . ";host=" . self::HOST . ";charset=" . self::UTF;
        $user = self::USER;
        $pass = self::PASS;
        try {
            $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . SELF::UTF));
        } catch (Exception $e) {
            echo 'error' . $e->getMesseage;
            die();
        }
        //エラーを表示してくれる。
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
    public function SQL(string $sql, array $param)
    {
        $obj = $this->pdo();
        $stmt = $obj->prepare($sql);
        $stmt->execute($param);
        return $stmt;
    }
}
